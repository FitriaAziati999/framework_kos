package com.kos.KostKita;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
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

public class LoginActivity extends AppCompatActivity {
    TextView RegisButton;
    EditText Email, Password;
    Button LoginButton;
    Auth auth;
    ProgressBar PrgsBar;
    ProgressDialog progressDialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        auth = new Auth(this);

        Email = (EditText) findViewById(R.id.editText_Email);
        Password = (EditText) findViewById(R.id.editText_Password);
        LoginButton = (Button) findViewById(R.id.button_login);
        RegisButton = (TextView) findViewById(R.id.TextDaftar);

        progressDialog = new ProgressDialog(this);
        PrgsBar = new ProgressBar(LoginActivity.this);
        PrgsBar.setVisibility(View.GONE);

        LoginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (Email.getText().toString().isEmpty()){
                    Toast.makeText(LoginActivity.this, "Email Tidak Boleh Kosong", Toast.LENGTH_LONG).show();
                    progressDialog.dismiss();
                }else if (Password.getText().toString().isEmpty()){
                    Toast.makeText(LoginActivity.this, "Password Tidak Boleh Kosong", Toast.LENGTH_LONG).show();
                    progressDialog.dismiss();
                }else {
                    login();
                }
            }
        });

        RegisButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a = new Intent(LoginActivity.this, RegisterActivity.class);
                startActivity(a);
            }
        });

        if (auth.isLogin() == true){
            Intent main = new Intent(LoginActivity.this, Beranda.class);
            startActivity(main);
            finish();
        }
    }

    public void login(){
        StringRequest senddata = new StringRequest(Request.Method.POST, ServerApi.URL_LOGIN, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    progressDialog.dismiss();
                    JSONObject res = new JSONObject(response);
                    JSONObject respon = res.getJSONObject("data");
                    Toast.makeText(LoginActivity.this, respon.getString("pesan"), Toast.LENGTH_SHORT).show();
                    JSONObject datalogin = res.getJSONObject("data");
                    Log.e("idpemilik", datalogin.getString("id_pemilik"));
                    auth.setdatauser(
                            datalogin.getString("status"),
                            datalogin.getString("id_pemilik"),
                            datalogin.getString("namapem"),
                            datalogin.getString("fotopem"),
                            datalogin.getString("token")
                    );
                    if (datalogin.getString("status").equals("1")) {
                        Log.e("ser", "sep gan");
                        Intent intent = new Intent(LoginActivity.this, Beranda.class);



                        startActivity(intent);
                    } else {
                        Toast.makeText(LoginActivity.this, "Aplikasi Hanya Untuk Pemilik", Toast.LENGTH_SHORT).show();

                    }
                } catch (JSONException e) {
                    progressDialog.dismiss();
                    Log.e("errorgan", e.getMessage());
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                progressDialog.dismiss();
                Log.e("errornyaa ", "" + error);
                Toast.makeText(LoginActivity.this, "Email atau Password yang anda masukkan salah" , Toast.LENGTH_SHORT).show();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String, String> params = new HashMap<>();
                params.put("emailpem", Email.getText().toString());
                params.put("passpem", Password.getText().toString());

                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(LoginActivity.this);

        requestQueue.add(senddata);
    }
}