package com.kos.KostKita;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.LoginFilter;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.RequestQueue;

import de.hdodenhof.circleimageview.CircleImageView;

public class ProfileActivity extends AppCompatActivity {
	TextView FullName, Email, Username, alamat, NoHP,  namaprofil, textView;
	Button logout, notif;
	RequestQueue requestQueue;
	CircleImageView foto_profil;
	String NameHolder, EmailHolder, UsernameHolder, alamatHolder, NoHPHolder,  NameProfilHolder, EmailProfilHolder;
	ProgressDialog progressDialog;
	String HttpUrl = "http://192.168.1.9/vollay/user.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);


		textView = (TextView)findViewById(R.id.emailprofil);
		FullName = (TextView) findViewById(R.id.textnama);
		Email = (TextView) findViewById(R.id.textEmail);
		Username  = (TextView) findViewById(R.id.textUsername);
		alamat  = (TextView) findViewById(R.id.textAlamat);
		NoHP  = (TextView) findViewById(R.id.textNohp);
		namaprofil =(TextView) findViewById(R.id.profilename);

        logout = (Button)findViewById(R.id.button_logout);
        notif = (Button)findViewById(R.id.button_notif);
        // Receiving value into activity using intent.
        String TempHolder = getIntent().getStringExtra("emailpemTAG");
        // Setting up received value into TextView.
        textView.setText(textView.getText() + TempHolder);


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
    }


    
}
