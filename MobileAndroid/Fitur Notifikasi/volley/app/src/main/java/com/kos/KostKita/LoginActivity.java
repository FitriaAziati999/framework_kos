package com.kos.KostKita;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
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

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {
    TextView RegisButton;
    EditText Email, Password;
    Button LoginButton;
    RequestQueue requestQueue;
    String EmailHolder, PasswordHolder;
    ProgressDialog progressDialog;
    String HttpUrl = "http://192.168.1.19/framework_kos/api_logn/sign_In";
    Boolean CheckEditText;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        Email = (EditText) findViewById(R.id.editText_Email);
        Password = (EditText) findViewById(R.id.editText_Password);
        LoginButton = (Button) findViewById(R.id.button_login);
        RegisButton = (TextView) findViewById(R.id.TextDaftar);

        requestQueue = Volley.newRequestQueue(LoginActivity.this);

        progressDialog = new ProgressDialog(LoginActivity.this);

        LoginButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                CheckEditTextIsEmptyOrNot();

                if (CheckEditText) {
                    UserLogin();
                } else {
                    Toast.makeText(LoginActivity.this, "Data Tidak Boleh Kosong", Toast.LENGTH_LONG).show();
                }
            }
        });
        RegisButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getBaseContext(),RegisterActivity.class));
            }
        });
}
    public void UserLogin() {

        progressDialog.setMessage("Harap Tunggu");
        progressDialog.show();
        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String ServerResponse) {
                        progressDialog.dismiss();

                        if (ServerResponse.equalsIgnoreCase("Login Berhasil")) {

                            Toast.makeText(LoginActivity.this, "Selamat Datang di Kost Kita", Toast.LENGTH_LONG).show();

                            finish();

                            Intent intent = new Intent(LoginActivity.this, ProfileActivity.class);
                            intent.putExtra("emailpemTAG", EmailHolder);
                            startActivity(intent);
                        } else {
                            Toast.makeText(LoginActivity.this, ServerResponse, Toast.LENGTH_LONG).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {
                        progressDialog.dismiss();
                        Toast.makeText(LoginActivity.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();

                params.put("emailpem", EmailHolder);
                params.put("passpem", PasswordHolder);

                return params;
        }
    };
        RequestQueue requestQueue = Volley.newRequestQueue(LoginActivity.this);
        requestQueue.add(stringRequest);
    }
    public void CheckEditTextIsEmptyOrNot() {
        EmailHolder = Email.getText().toString().trim();
        PasswordHolder = Password.getText().toString().trim();

        if (TextUtils.isEmpty(EmailHolder) || TextUtils.isEmpty(PasswordHolder)) {
            CheckEditText = false;

        } else {
            CheckEditText = true;
        }
    }
}