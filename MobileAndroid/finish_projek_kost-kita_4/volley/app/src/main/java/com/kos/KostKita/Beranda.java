package com.kos.KostKita;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import com.kos.KostKita.config.Auth;
import com.kos.KostKita.model.Data;

public class Beranda extends AppCompatActivity {

    Button Mprofil, Mdata, Mtipe, Mnotif, Mlogout;
    Auth auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_beranda);

        auth = new Auth(this);

        Mprofil = (Button) findViewById(R.id.tmblProfil);
        Mdata = (Button) findViewById(R.id.tmblDataKos);
        Mtipe = (Button) findViewById(R.id.tmblTipeKamar);
        Mnotif = (Button) findViewById(R.id.tmblNotifikasi);
        Mlogout = (Button) findViewById(R.id.tmblLogout);
        Intent i = getIntent();
        final String id_pemilik = i.getStringExtra("id_pemilik");


        Mprofil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent profil = new Intent(getApplicationContext(), ProfileActivity.class);
                startActivity(profil);
            }
        });

        Mdata.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent z = new Intent(getApplicationContext(), DataActivity.class);
                startActivity(z);
                finish();
            }
        });

        Mnotif.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent notif = new Intent(getApplicationContext(), Notif.class);
                startActivity(notif);
                //finish();
            }
        });

        Mtipe.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent tipe = new Intent(getApplicationContext(), TipeKmr.class);
                startActivity(tipe);
                finish();
            }
        });

        Mlogout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                auth.logout();
            }
        });


    }
}
