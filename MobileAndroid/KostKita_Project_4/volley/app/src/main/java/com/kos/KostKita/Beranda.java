package com.kos.KostKita;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

public class Beranda extends AppCompatActivity {

    Button Mprofil, Mdata, Mtipe, Mlogout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_beranda);

        Mprofil = (Button)findViewById(R.id.tmblProfil);
        Mdata = (Button)findViewById(R.id.tmblDataKos);
        Mtipe = (Button)findViewById(R.id.tmblTipeKamar);
        Mlogout = (Button)findViewById(R.id.tmblLogout);

        Mprofil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent profil = new Intent(getApplicationContext(),ProfileActivity.class);
                startActivity(profil);
                finish();
            }
        });

        Mdata.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent data = new Intent(getApplicationContext(),DetailDataKos.class);
                startActivity(data);
                finish();
            }
        });

        Mtipe.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent tipe = new Intent(getApplicationContext(),TipeKamar.class);
                startActivity(tipe);
                finish();
            }
        });


    }
}
