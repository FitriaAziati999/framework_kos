package com.kos.KostKita;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.LoginFilter;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
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

public class ProfileActivity extends AppCompatActivity {
	TextView Nama, Email, Username, Alamat, NoHP,  namaprofil, EmailProfil, Nik, Idpem;
	Button logout, simpan;
	String id = "2";
	RequestQueue requestQueue;
	CircleImageView foto_profil;
	ProgressDialog progressDialog;
	String URL_UPDATE = "http://192.168.43.254/contoh/index.php/profil/update";
	String HttpUrl = "http://192.168.43.254/contoh/index.php/profil/id";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

		EmailProfil = (TextView)findViewById(R.id.emailprofil);
		Nama = (TextView) findViewById(R.id.textnama);
		Email = (TextView) findViewById(R.id.textEmail);
		Username  = (TextView) findViewById(R.id.textUsername);
		Alamat  = (TextView) findViewById(R.id.textAlamat);
		NoHP  = (TextView) findViewById(R.id.textNohp);
		namaprofil =(TextView) findViewById(R.id.profilename);
		Nik =(TextView)findViewById(R.id.textNIK);
		simpan = (Button)findViewById(R.id.simpanprofil);

        logout = (Button)findViewById(R.id.button_logout);
        // Receiving value into activity using intent.
        String TempHolder = getIntent().getStringExtra("emailpemTAG");
        // Setting up received value into TextView.
        EmailProfil.setText(EmailProfil.getText() + TempHolder);
        getUserDetail();


        // Adding click listener to logout button.
        logout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Showing Echo Response Message Coming From Server.
                Toast.makeText(ProfileActivity.this, "Log Out Sukses", Toast.LENGTH_LONG).show();
                // Closing the current activity.
                finish();
                // Redirect to Main Login activity after log out.
                Intent intent = new Intent(ProfileActivity.this, LoginActivity.class);
                startActivity(intent);
            }
        });

        simpan.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Update();
			}
		});
    }

	private void getUserDetail(){
		final ProgressDialog progressDialog = new ProgressDialog(this);
		progressDialog.setMessage("Loading...");
		progressDialog.show();


		StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
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
								String strNama = object.getString("namapem").trim();
								String strAlamat = object.getString("alamatpem").trim();
								String strNoHp = object.getString("nopem").trim();
								String strEmail = object.getString("emailpem").trim();
								String strUsername = object.getString("userpem").trim();
								//Picasso.get().load(strFoto).memoryPolicy(MemoryPolicy.NO_CACHE).networkPolicy(NetworkPolicy.NO_CACHE).into(foto_profil);
								Email.setText(strEmail);
								Nama.setText(strNama);
								Alamat.setText(strAlamat);
								NoHP.setText(strNoHp);
								Username.setText(strUsername);
								namaprofil.setText(strNama);
								EmailProfil.setText(strEmail);


							}
						} else {
							progressDialog.dismiss();
							Toast.makeText(ProfileActivity.this, message, Toast.LENGTH_SHORT).show();
						}
					} catch (JSONException e){
						e.printStackTrace();
						progressDialog.dismiss();
						Toast.makeText(ProfileActivity.this, "Error "+e.toString(), Toast.LENGTH_SHORT).show();
					}
				}
			},
			new Response.ErrorListener() {
				@Override
				public void onErrorResponse(VolleyError error) {
					progressDialog.dismiss();
					Toast.makeText(ProfileActivity.this, "Error "+error.toString(), Toast.LENGTH_SHORT).show();
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
		final String idpem = this.id;
    	final String Nama = this.Nama.getText().toString().trim();
		final String Alamat = this.Email.getText().toString().trim();
		final String NoHP = this.NoHP.getText().toString().trim();
		final String Email = this.Email.getText().toString().trim();
		final String Username = this.Username.getText().toString().trim();
		final String Nik = this.Nik.getText().toString().trim();

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
							Toast.makeText(ProfileActivity.this, message, Toast.LENGTH_SHORT).show();
							/*sessionManager.createSession(id);*/
						} else {
							Toast.makeText(ProfileActivity.this, message, Toast.LENGTH_SHORT).show();
						}
					} catch (JSONException e){
						e.printStackTrace();
						Toast.makeText(ProfileActivity.this, "error "+e.toString(), Toast.LENGTH_SHORT).show();
					}
				}
			},
			new Response.ErrorListener() {
				@Override
				public void onErrorResponse(VolleyError error) {
					progressDialog.dismiss();
					Toast.makeText(ProfileActivity.this, "error "+error.toString(), Toast.LENGTH_SHORT).show();
				}
			})
		{
			@Override
			protected Map<String, String> getParams() {
				Map<String, String> params = new HashMap<>();
				params.put("id_pemilik", idpem);
				params.put("namapem", Nama);
				params.put("emailpem", Email);
				params.put("alamatpem", Alamat);
				params.put("nopem", NoHP);
				params.put("userpem", Username);
				params.put("nikpem", Nik);
				return params;
			}
		};

		RequestQueue requestQueue = Volley.newRequestQueue(this);
		requestQueue.add(stringRequest);
	}
    
}





