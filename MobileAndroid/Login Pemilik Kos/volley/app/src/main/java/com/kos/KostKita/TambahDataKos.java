package com.kos.KostKita;

import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;
import java.util.Objects;

public class TambahDataKos extends AppCompatActivity {


		private EditText id_kos, id_pemilik, nama_kos, alamat_kos, khusus_kos, fasilitas_kos, lingkungan_kos, peraturan_kos ;
		private Button btn_tambah_data, btn_back;
		private ProgressBar loading;

	public TambahDataKos() {
	}

	@RequiresApi(api = Build.VERSION_CODES.KITKAT)
		@Override
		protected void onCreate(Bundle savedInstanceState) {
			super.onCreate(savedInstanceState);
			setContentView(R.layout.activity_tambah_data_kos);
			Objects.requireNonNull(getSupportActionBar()).setTitle("Data Kos");
			loading = findViewById(R.id.loading);
			nama_kos = findViewById(R.id.txtnamakos);
			alamat_kos = findViewById(R.id.txtalamatkos);
			khusus_kos = findViewById(R.id.txtkhususkos);
			fasilitas_kos = findViewById(R.id.txtfasilitaskos);
			lingkungan_kos = findViewById(R.id.txtlingkungankos);
			peraturan_kos = findViewById(R.id.txtperaturankos);
			btn_tambah_data = findViewById(R.id.btn_tambah_data);
			btn_back = findViewById(R.id.btn_back);

			btn_tambah_data.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {
					AddData();
				}
			});

			btn_back.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {
					Intent intent = new Intent(TambahDataKos.this, DataActivity.class);
					intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
					intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK);
					startActivity(intent);
				}
			});
		}

		private void AddData() {
			final String nama_kos = this.nama_kos.getText().toString().trim();
			final String alamat_kos = this.alamat_kos.getText().toString().trim();
			final String khusus_kos = this.khusus_kos.getText().toString().trim();
			final String fasilitas_kos = this.fasilitas_kos.getText().toString().trim();
			final String lingkungan_kos = this.lingkungan_kos.getText().toString().trim();
			final String peraturan_kos = this.peraturan_kos.getText().toString().trim();

			if (nama_kos.matches("")){
				Toast.makeText(this,"Anda belum mengisi Nama Kos",Toast.LENGTH_SHORT).show();
				return;
			}
			if (alamat_kos.matches("")){
				Toast.makeText(this,"Anda belum mengisi Alamat Kos",Toast.LENGTH_SHORT).show();
				return;
			}
			if (khusus_kos.matches("")){
				Toast.makeText(this,"Anda belum mengisi Khusus Kos",Toast.LENGTH_SHORT).show();
				return;
			}
			if (fasilitas_kos.matches("")){
				Toast.makeText(this,"Anda belum mengisi Fasilitas Kos",Toast.LENGTH_SHORT).show();
				return;
			}
			if (lingkungan_kos.matches("")){
				Toast.makeText(this,"Anda belum mengisi Lingkungan Kos",Toast.LENGTH_SHORT).show();
				return;
			}
			if (peraturan_kos.matches("")){
				Toast.makeText(this,"Anda belum mengisi Peraturan Kos",Toast.LENGTH_SHORT).show();
				return;
			}

			loading.setVisibility(View.VISIBLE);
			btn_tambah_data.setVisibility(View.GONE);

			String URL_REGISTER = "http://idtechdev.com/mahasiswa/mhs/add";
			StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_REGISTER,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						try{
							JSONObject jsonObject = new JSONObject(response);
							String status = jsonObject.getString("status");
							String error = jsonObject.getString("error");
							String message = jsonObject.getString("message");

							if (status.equals("200") && error.equals("false")){
								Toast.makeText(TambahDataKos.this, message, Toast.LENGTH_SHORT).show();
								new Handler().postDelayed(new Runnable() {

									@Override
									public void run() {
										Intent intent = new Intent(TambahDataKos.this, DataActivity.class);
										intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
										intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK);
										startActivity(intent);
									}
								}, 1500);
							} else {
								Toast.makeText(TambahDataKos.this, message, Toast.LENGTH_SHORT).show();
								loading.setVisibility(View.GONE);
								btn_tambah_data.setVisibility(View.VISIBLE);
							}
						} catch (JSONException e){
							e.printStackTrace();
							Toast.makeText(TambahDataKos.this, "Error! " + e.toString(), Toast.LENGTH_SHORT).show();
							loading.setVisibility(View.GONE);
							btn_tambah_data.setVisibility(View.VISIBLE);
						}
					}
				},
				new Response.ErrorListener() {
					@Override
					public void onErrorResponse(VolleyError error) {
						Toast.makeText(TambahDataKos.this, "Error! " + error.toString(), Toast.LENGTH_SHORT).show();
						loading.setVisibility(View.GONE);
						btn_tambah_data.setVisibility(View.VISIBLE);
					}
				})

			{

				@Override
				public String getBodyContentType() {
					return "application/x-www-form-urlencoded; charset=UTF-8";
				}

				@Override
				protected Map<String, String> getParams() {
					Map<String, String> params = new HashMap<>();
					params.put("nama_kos",nama_kos);
					params.put("alamat_kos",alamat_kos);
					params.put("khusus_kos",khusus_kos);
					params.put("fasilitas_kos",fasilitas_kos);
					params.put("lingkungan_kos",lingkungan_kos);
					params.put("peraturan_kos",peraturan_kos);
					params.put("Content-Type","application/x-www-form-urlencoded");
					return params;
				}
			};

			RequestQueue requestQueue = Volley.newRequestQueue(this);
			requestQueue.add(stringRequest);
		}
	}


