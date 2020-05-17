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

public class RegisterActivity extends AppCompatActivity {
    TextView Akun;
    EditText FullName, Email, Username, alamat, NoHP,  NikKtp, Password, Password2;
    Button Register;
    RequestQueue requestQueue;
    String NameHolder, EmailHolder, UsernameHolder, alamatHolder, NoHPHolder,  NikKtpHolder, PasswordHolder, Password2Holder;
    ProgressDialog progressDialog;
    String HttpUrl = "http://192.168.1.3/vollay/user_registration.php";
    Boolean CheckEditText;

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

        progressDialog = new ProgressDialog(RegisterActivity.this);

        Akun.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(getBaseContext(), LoginActivity.class));
            }
        });
        Register.setOnClickListener((new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                CheckEditTextIsEmptyOrNot();
                if (CheckEditText) {
                    UserRegistration();
                   // finish();
                    //Intent intent = new Intent(MainActivity.this, LoginActivity.class);
                    //startActivity(intent);
                }
                else {
                    Toast.makeText(RegisterActivity.this, "Data tidak boleh kosong", Toast
                    .LENGTH_LONG) .show();
                }
            }
        }));
}

    public void UserRegistration() {
        progressDialog.setMessage("Harap Tunggu");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String ServerResponse) {
                        progressDialog.dismiss();

                        Toast.makeText(RegisterActivity.this, ServerResponse, Toast.LENGTH_LONG).show();
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError volleyError) {

                        progressDialog.dismiss();

                        Toast.makeText(RegisterActivity.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                    }
                }) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();

                params.put("nama_pem", NameHolder);
                params.put("emailpem", EmailHolder);
                params.put("userpem", UsernameHolder);
                params.put("alamatpem", alamatHolder);
                params.put("nopem", NoHPHolder);
                params.put("nikpem", NikKtpHolder);
                params.put("passpem", PasswordHolder);


                return params;
            }
        };
        RequestQueue requestQueue = Volley.newRequestQueue(RegisterActivity.this);
        requestQueue.add(stringRequest);
    }
    public void CheckEditTextIsEmptyOrNot(){
        NameHolder = FullName.getText().toString().trim();
        EmailHolder = Email.getText().toString().trim();
        UsernameHolder = Username.getText().toString().trim();
        alamatHolder = alamat.getText().toString().trim();
        NoHPHolder = NoHP.getText().toString().trim();
        NikKtpHolder = NikKtp.getText().toString().trim();
        PasswordHolder = Password.getText().toString().trim();
        Password2Holder = Password2.getText().toString().trim();



        if(TextUtils.isEmpty(NameHolder) || TextUtils.isEmpty(EmailHolder)  || TextUtils.isEmpty(UsernameHolder) || TextUtils.isEmpty(alamatHolder)|| TextUtils.isEmpty(NoHPHolder) || TextUtils.isEmpty(NikKtpHolder) || TextUtils.isEmpty(PasswordHolder) || TextUtils.isEmpty(Password2Holder))
        {
            CheckEditText = false;
        }
        else {
            CheckEditText = true;
        }
    }}