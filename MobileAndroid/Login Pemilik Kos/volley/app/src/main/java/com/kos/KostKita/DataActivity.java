package com.kos.KostKita;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Toast;

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
import com.kos.KostKita.model.Data;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Objects;

public class DataActivity<SessionManager> extends AppCompatActivity {

	private static final String TAG = DataActivity.class.getSimpleName();
	private List<Data> listData = new ArrayList<>();
	private RecyclerView recyclerView;
	SessionManager sessionManager;

	@RequiresApi(api = Build.VERSION_CODES.KITKAT)
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_data_kos);
		Objects.requireNonNull(getSupportActionBar()).setTitle("Data Kos");
		sessionManager = new SessionManager(this);
		sessionManager.checkLogin();
		recyclerView = findViewById(R.id.recycleview_id);
		getListData();

		FloatingActionButton addAction = findViewById(R.id.btn_add);
		addAction.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Intent intent = new Intent(DataActivity.this, TambahDataKos.class);
                /*intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK);*/
				startActivity(intent);
			}
		});
	}

	private void getListData() {
		final ProgressDialog progressDialog = new ProgressDialog(this);
		progressDialog.setMessage("Loading...");
		progressDialog.show();

		String URL_MHS_READ = "http://idtechdev.com/mahasiswa/mhs";
		StringRequest stringRequest = new StringRequest(Request.Method.GET, URL_MHS_READ,
			new Response.Listener<String>() {
				@Override
				public void onResponse(String response) {
					progressDialog.dismiss();
					Log.i(TAG,response);
					try{
						JSONObject jsonObject = new JSONObject(response);
						String status = jsonObject.getString("status");
						String error = jsonObject.getString("error");
						if (status.equals("200") && error.equals("false")){
							JSONArray jsonArray = jsonObject.getJSONArray("Data");
							for (int i=0; i < jsonArray.length(); i++){
								JSONObject object = jsonArray.getJSONObject(i);
								String strId_kos = object.getString("id_kos").trim();
								String strId_pemilik = object.getString("id_pemilik").trim();
								String strNama_kos = object.getString("nama_kos").trim();
								String strAlamat_kos = object.getString("alamat_kos").trim();
								String strKhusus_kos = object.getString("khusus_kos").trim();
								String strFasilitas_kos = object.getString("fasilitas_kos").trim();
								String strLingkungan_kos = object.getString("Lingkungan_kos").trim();
								String strPeraturan_kos = object.getString("Peraturan_kos").trim();
								Data data = new Data();
								data.setId_kos(strId_kos);
								data.setId_pemilik(strId_pemilik);
								data.setNama_kos(strNama_kos);
								data.setAlamat_kos(strAlamat_kos);
								data.setKhusus_kos(strKhusus_kos);
								data.setFasilitas_kos(strFasilitas_kos);
								data.setLingkungan_kos(strLingkungan_kos);
								data.setPeraturan_kos(strPeraturan_kos);
								listData.add(data);
								//Toast.makeText(MhsActivity.this, strNim+"\n"+strNama+"\n"+strFoto+"\n\n", Toast.LENGTH_SHORT).show();
							}
							//Toast.makeText(MhsActivity.this,"Size of Liste "+String.valueOf(listMhs.size()),Toast.LENGTH_SHORT).show();
							//Toast.makeText(MhsActivity.this,listMhs.get(1).toString(),Toast.LENGTH_SHORT).show();
							setuprecyclerview(listData);
						} else {
							Toast.makeText(DataActivity.this, "Tidak dapat memuat data", Toast.LENGTH_SHORT).show();
						}
						//setuprecyclerview(listMhs);
					} catch (JSONException e){
						e.printStackTrace();
						Toast.makeText(DataActivity.this, "Error "+e.toString(), Toast.LENGTH_SHORT).show();
					}

				}
			},
			new Response.ErrorListener() {
				@Override
				public void onErrorResponse(VolleyError error) {
					progressDialog.dismiss();
					Toast.makeText(DataActivity.this, "Error "+error.toString(), Toast.LENGTH_SHORT).show();
				}
			})
		{
			@Override
			protected Map<String, String> getParams() {
				Map<String, String> params = new HashMap<>();
				params.put("Content-Type","application/x-www-form-urlencoded");
				return params;
			}
		};

		RequestQueue requestQueue = Volley.newRequestQueue(this);
		requestQueue.add(stringRequest);
	}

	public void setuprecyclerview(List<Data> listData){
		RecyclerViewAdapter myAdapter = new RecyclerViewAdapter(this, listData);
		recyclerView.setLayoutManager(new LinearLayoutManager(this));
		recyclerView.setAdapter(myAdapter);
	}
}
