package com.kos.KostKita;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.LoginFilter;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.squareup.picasso.MemoryPolicy;
import com.squareup.picasso.NetworkPolicy;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;

public class DetailDataKos extends AppCompatActivity {
	TextView Namakos, Alamatkos, Khususkos, Fasilitaskos, Lingkungankos, Peraturankos;
	Button lanjut, hapus;
	String id = "2";
	RequestQueue requestQueue;
	ImageView fotokost;
	ProgressDialog progressDialog;
	String URL_UPDATE = "http://192.168.100.35/framework_kos/index.php/data/update";
	String URL_TAMPIL = "http://192.168.100.35/framework_kos/index.php/data/id";

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_detail_data_kos);

		Namakos = (TextView)findViewById(R.id.namakost);
		Alamatkos = (TextView) findViewById(R.id.alamatkost);
		Khususkos = (TextView) findViewById(R.id.khususkost);
		Fasilitaskos  = (TextView) findViewById(R.id.fasilitaskost);
		Lingkungankos  = (TextView) findViewById(R.id.lingkungankost);
		Peraturankos  = (TextView) findViewById(R.id.peraturankost);

		lanjut = (Button)findViewById(R.id.lanjut);

		hapus = (Button)findViewById(R.id.hapus);
		// Receiving value into activity using intent.
		String TempHolder = getIntent().getStringExtra("emailpemTAG");
		// Setting up received value into TextView.
		//EmailProfil.setText(EmailProfil.getText() + TempHolder);
		getUserDetail();

		lanjut.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Update();
			}
		});

		lanjut.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Intent TipeKamar = new Intent(getApplicationContext(),TipeKamar.class);
				startActivity(TipeKamar);
			}
		});
	}

	private void getUserDetail(){
		final ProgressDialog progressDialog = new ProgressDialog(this);
		progressDialog.setMessage("Loading...");
		progressDialog.show();


		StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_TAMPIL,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						progressDialog.dismiss();
						try{
							JSONObject jsonObject = new JSONObject(response);
							String message = jsonObject.getString("message");
							if (message.equals("success")){
								JSONArray jsonArray = jsonObject.getJSONArray("data");
								for (int i=0; i < jsonArray.length(); i++){
									JSONObject object = jsonArray.getJSONObject(i);
									String strNamakos = object.getString("namakos").trim();
									String strAlamatkos = object.getString("alamatkos").trim();
									String strKhususkos = object.getString("khususkos").trim();
									String strFasilitaskos = object.getString("fasilitaskos").trim();
									String strLingkungankos = object.getString("lingkungankos").trim();
									String strPeraturankos = object.getString("peraturankos").trim();
									//Picasso.get().load(strFoto).memoryPolicy(MemoryPolicy.NO_CACHE).networkPolicy(NetworkPolicy.NO_CACHE).into(foto_profil);
									Namakos.setText(strNamakos);
									Alamatkos.setText(strAlamatkos);
									Khususkos.setText(strKhususkos);
									Fasilitaskos.setText(strFasilitaskos);
									Lingkungankos.setText(strLingkungankos);
									Peraturankos.setText(strPeraturankos);


								}
							} else {
								progressDialog.dismiss();
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
							}
						} catch (JSONException e){
							e.printStackTrace();
							progressDialog.dismiss();
							Toast.makeText(DetailDataKos.this, "Error "+e.toString(), Toast.LENGTH_SHORT).show();
						}
					}
				},
				new Response.ErrorListener() {
					@Override
					public void onErrorResponse(VolleyError error) {
						progressDialog.dismiss();
						Toast.makeText(DetailDataKos.this, "Error "+error.toString(), Toast.LENGTH_SHORT).show();
					}
				})
		{
			@Override
			protected Map<String, String> getParams() {
				Map<String, String> params = new HashMap<>();
				params.put("id", id);
				params.put("Content-Type","application/x-www-form-urlencoded");
				return params;
			}
		};

		RequestQueue requestQueue = Volley.newRequestQueue(this);
		requestQueue.add(stringRequest);
	}

	private void Update() {
		final String idkos = this.id;
		final String Namakos = this.Namakos.getText().toString().trim();
		final String Alamatkos = this.Alamatkos.getText().toString().trim();
		final String Khususkos = this.Khususkos.getText().toString().trim();
		final String Fasilitaskos = this.Fasilitaskos.getText().toString().trim();
		final String Lingkungankos = this.Lingkungankos.getText().toString().trim();
		final String Peraturankos = this.Peraturankos.getText().toString().trim();


		final ProgressDialog progressDialog = new ProgressDialog(this);
		progressDialog.setMessage("Update...");
		progressDialog.show();

		StringRequest stringRequest = new StringRequest(Request.Method.PUT, URL_UPDATE,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						progressDialog.dismiss();

						try{
							JSONObject jsonObject = new JSONObject(response);
							String status = jsonObject.getString("status");
							String error = jsonObject.getString("error");
							String message = jsonObject.getString("message");

							if (status.equals("200") && error.equals("false")){
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
								/*sessionManager.createSession(id);*/
							} else {
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
							}
						} catch (JSONException e){
							e.printStackTrace();
							Toast.makeText(DetailDataKos.this, "error "+e.toString(), Toast.LENGTH_SHORT).show();
						}
					}
				},
				new Response.ErrorListener() {
					@Override
					public void onErrorResponse(VolleyError error) {
						progressDialog.dismiss();
						Toast.makeText(DetailDataKos.this, "error "+error.toString(), Toast.LENGTH_SHORT).show();
					}
				})
		{
			@Override
			protected Map<String, String> getParams() {
				Map<String, String> params = new HashMap<>();
				params.put("id_kos", idkos);
				params.put("namakos", Namakos);
				params.put("alamatkos", Alamatkos);
				params.put("khususkos", Khususkos);
				params.put("fasilitaskos", Fasilitaskos);
				params.put("lingkungankos", Lingkungankos);
				params.put("peraturankos", Peraturankos);
				return params;
			}
		};

		RequestQueue requestQueue = Volley.newRequestQueue(this);
		requestQueue.add(stringRequest);
	}

}





