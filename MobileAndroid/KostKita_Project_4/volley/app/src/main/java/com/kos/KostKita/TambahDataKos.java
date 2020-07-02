package com.kos.KostKita;

import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.kos.KostKita.config.Auth;
import com.kos.KostKita.config.ServerApi;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;
import java.util.Objects;

public class TambahDataKos extends AppCompatActivity {
	Auth auth;
	private TextView id_pemilik;
	private EditText id_kos, nama_kos, alamat_kos, khusus_kos, fasilitas_kos, lingkungan_kos, peraturan_kos;
	private Button btn_tambah_data, btn_back;
	private ProgressBar loading;
	RequestQueue queue;

	@RequiresApi(api = Build.VERSION_CODES.KITKAT)
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_tambah_data_kos);
		auth = new Auth(this);
		queue = Volley.newRequestQueue(this);
//			id_pemilik = findViewById(R.id.pemilikid);
//			id_pemilik.setText(auth.getKodeUser());
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
					tmbahkos();
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

	private void tmbahkos() {
		final String kosnama = this.nama_kos.getText().toString().trim();
		final String koslamat = this.alamat_kos.getText().toString().trim();
		final String koskus = this.khusus_kos.getText().toString().trim();
		final String kosfas = this.fasilitas_kos.getText().toString().trim();
		final String kosling = this.lingkungan_kos.getText().toString().trim();
		final String kosper = this.peraturan_kos.getText().toString().trim();

		StringRequest TAMBAH = new StringRequest(Request.Method.POST, ServerApi.URL_TAMBAHKOS, new Response.Listener<String>() {
			@Override
			public void onResponse(String response) {
				try {
					JSONObject objecttmbh = new JSONObject(response);
					String status = objecttmbh.getString("status");
					String error = objecttmbh.getString("error");
					String message = objecttmbh.getString("message");

					if (status.equals("200") && error.equals("false")) {
						Toast.makeText(TambahDataKos.this, message, Toast.LENGTH_SHORT).show();
						new Handler().postDelayed(new Runnable() {
							@Override
							public void run() {
								Intent intent2 = new Intent(TambahDataKos.this, DataActivity.class);
								startActivity(intent2);
							}
						}, 1500);
					} else {
						Toast.makeText(TambahDataKos.this, message, Toast.LENGTH_SHORT).show();
					}
				} catch (Exception e) {
					e.printStackTrace();
					Intent intent3 = new Intent(TambahDataKos.this, DataActivity.class);
					startActivity(intent3);
					Toast.makeText(TambahDataKos.this, "Berhasil", Toast.LENGTH_SHORT).show();
				}
			}
		}, new Response.ErrorListener() {
			@Override
			public void onErrorResponse(VolleyError error) {
				Toast.makeText(TambahDataKos.this, error.toString(), Toast.LENGTH_SHORT).show();
			}
		}) {

			protected Map<String, String> getParams() {
				Map<String, String> params = new HashMap<>();
				params.put("id_pemilik", auth.getKodeUser());
				params.put("namakos", kosnama);
				params.put("alamatkos", koslamat);
				params.put("khususkos", koskus);
				params.put("fasilitaskos", kosfas);
				params.put("lingkungankos", kosling);
				params.put("peraturankos", kosper);
				return params;
			}

		};
			queue.add(TAMBAH);
	}

}
