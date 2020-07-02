package com.kos.KostKita;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.kos.KostKita.config.ServerApi;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class RegisterActivity extends AppCompatActivity {
    TextView Akun;
    EditText FullName, Email, Username, alamat, NoHP,  NikKtp, Password, Password2;
    Button Register;
    ProgressDialog progressDialog;
    RequestQueue requestQueue;
    ProgressBar progressBar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        Akun = (TextView) findViewById(R.id.textViewL);
        FullName = (EditText) findViewById(R.id.EditTextFullName);
        Email = (EditText) findViewById(R.id.EditTextEmail);
        Username  = (EditText) findViewById(R.id.EditTextUsername);
        alamat  = (EditText) findViewById(R.id.EditTextalamat);
        NoHP  = (EditText) findViewById(R.id.EditTextNoHp);
        NikKtp      =(EditText) findViewById(R.id.EditTextNikKtp);
        Password = (EditText) findViewById(R.id.EditTextPassword);
        Password2 = (EditText) findViewById(R.id.EditTextPassword2);
        Register = (Button) findViewById(R.id.ButtonRegister);

        requestQueue = Volley.newRequestQueue(RegisterActivity.this);
        progressDialog = new ProgressDialog(this);
        progressBar = new ProgressBar(RegisterActivity.this);

        Akun.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent masuk = new Intent(RegisterActivity.this , LoginActivity.class);
                startActivity(masuk);
            }
        });
        Register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                UserRegistration();
            }
        });
    }

    public void UserRegistration() {
        final String namapem = this.FullName.getText().toString().trim();
        final String emailpem = this.Email.getText().toString().trim();
        final String userpem = this.Username.getText().toString().trim();
        final String alamatpem = this.alamat.getText().toString().trim();
        final String nopem = this.NoHP.getText().toString().trim();
        final String nikpem = this.NikKtp.getText().toString().trim();
        final String passpem = this.Password.getText().toString().trim();

        if (namapem.matches("")){
            Toast.makeText(this, "Masukkan Nama Anda", Toast.LENGTH_SHORT).show();
            return;
        }
        if (emailpem.matches("")){
            Toast.makeText(this, "Masukkan email Anda", Toast.LENGTH_SHORT).show();
            return;
        }
        if (userpem.matches("")){
            Toast.makeText(this, "Masukkan Username Anda", Toast.LENGTH_SHORT).show();
            return;
        }
        if (alamatpem.matches("")){
            Toast.makeText(this, "Masukkan alamat Anda", Toast.LENGTH_SHORT).show();
            return;
        }
        if (nopem.matches("")){
            Toast.makeText(this, "Masukkan nomor Anda", Toast.LENGTH_SHORT).show();
            return;
        }
        if (nikpem.matches("")){
            Toast.makeText(this, "Masukkan NIK Anda", Toast.LENGTH_SHORT).show();
            return;
        }
        if (passpem.matches("")){
            Toast.makeText(this, "Masukkan password Anda", Toast.LENGTH_SHORT).show();
            return;
        }

        progressBar.setVisibility(View.GONE);
        Akun.setVisibility(View.GONE);

        StringRequest stringRequest = new StringRequest(Request.Method.POST, ServerApi.URL_REGIS, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                try {
                    JSONObject jsonObject = new JSONObject(response);
                    String status = jsonObject.getString("status");
                    String error = jsonObject.getString("error");
                    String message = jsonObject.getString("message");

                    if (status.equals("200") && error.equals("false")) {
                        Toast.makeText(RegisterActivity.this, message, Toast.LENGTH_SHORT).show();
                        new Handler().postDelayed(new Runnable() {
                            @Override
                            public void run() {
                                Intent intent2 = new Intent(RegisterActivity.this, LoginActivity.class);
                                startActivity(intent2);
                            }
                        }, 1500);
                    } else {
                        Toast.makeText(RegisterActivity.this, message, Toast.LENGTH_SHORT).show();
                        progressBar.setVisibility(View.GONE);
                        Akun.setVisibility(View.VISIBLE);
                    }
                } catch (JSONException e) {
                    e.printStackTrace();
                    progressBar.setVisibility(View.GONE);
                    Intent intent3 = new Intent(RegisterActivity.this, LoginActivity.class);
                    startActivity(intent3);
                    Toast.makeText(RegisterActivity.this, "Registrasi Berhasil", Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(RegisterActivity.this, "Error! " + error.toString(), Toast.LENGTH_SHORT).show();
                progressBar.setVisibility(View.GONE);
                Akun.setVisibility(View.VISIBLE);
            }
        })
        {
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("namapem", namapem);
                params.put("emailpem", emailpem);
                params.put("userpem", userpem);
                params.put("alamatpem", alamatpem);
                params.put("nopem", nopem);
                params.put("nikpem", nikpem);
                params.put("passpem", passpem);
                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

}