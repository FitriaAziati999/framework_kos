package com.kos.KostKita;

import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;

public class NotifUrl extends AppCompatActivity {

    public static final String ROOT_URL = "http://192.168.1.19/framework_kos/api_notif/sewa";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }
}

