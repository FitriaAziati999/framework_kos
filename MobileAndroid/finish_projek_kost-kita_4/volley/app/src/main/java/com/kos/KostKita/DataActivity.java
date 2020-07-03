package com.kos.KostKita;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.kos.KostKita.adapter.RecyclerViewAdapter;
import com.kos.KostKita.config.Auth;
import com.kos.KostKita.config.ServerApi;
import com.kos.KostKita.model.Data;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Objects;

import okhttp3.internal.Util;

public class DataActivity extends AppCompatActivity {
	RecyclerView recyclerView;
	List<Data> mItems;
	String data;
	Button btnTambah;
	RecyclerViewAdapter mAdapter;
	Auth authdataa;
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_data_kos);
		recyclerView = findViewById(R.id.recycleview_id);
		btnTambah = findViewById(R.id.tambahkos);
		btnTambah.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Intent a = new Intent(DataActivity.this, TambahDataKos.class);
				startActivity(a);
			}
		});
		authdataa = new Auth(this);
		loaddata();
	}

	public void loaddata()
	{
		StringRequest senddata = new StringRequest(Request.Method.GET, ServerApi.URL_DATAKOS
				+authdataa.getKodeUser(), new Response.Listener<String>(){
			@Override
			public void onResponse(String response) {
				JSONObject res = null;
				try {
					JSONObject obj  = new JSONObject(response);

					mItems = new ArrayList<>();
					JSONArray data = obj.getJSONArray("data");
					for (int i = 0; i < data.length(); i++)
					{
						Data playerModel = new Data();
						JSONObject dataobj = data.getJSONObject(i);
						playerModel.setNama_kos(dataobj.getString("namakos"));
						playerModel.setAlamat_kos(dataobj.getString("alamatkos"));
						playerModel.setKhusus_kos(dataobj.getString("khususkos"));

						mItems.add(playerModel);
					}
					setupListView();

				}
				catch (JSONException e)
				{
					e.printStackTrace();
				}
			}
		},
				new Response.ErrorListener()
				{
					@Override
					public void onErrorResponse(VolleyError error) {
						Log.d("volley", "errornya : " + error.getMessage());
					}
				});

		RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
		requestQueue.add(senddata);
	}

	private void setupListView()
	{
		mAdapter = new RecyclerViewAdapter(this, mItems);
		RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(getApplicationContext());
		recyclerView.setLayoutManager(layoutManager);
		recyclerView.setAdapter(mAdapter);

		mAdapter.setListener(new RecyclerViewAdapter.OnHistoryClickListener() {
			@Override
			public void onClick(int position) {
				Data modalRiwayat = mItems.get(position);
				Toast.makeText(getApplicationContext(), modalRiwayat.getId_kos(), Toast.LENGTH_LONG).show();

				Intent detail = new Intent(DataActivity.this, DetailDataKos.class);
				detail.putExtra("id_kos", modalRiwayat.getId_kos());
				startActivity(detail);
			}
		});
	}
}