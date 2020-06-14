package com.kos.KostKita;

import android.app.Notification;
import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.NotificationCompat;

public class Notifikasi extends AppCompatActivity {

    private Button notif;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        //notif = (Button) findViewById(R.id.button_notif);
        final String message = "Penyewa Atas Nama Indyra Ayu W akan menyewa pada kos anda, Apakah tersedia kamar?";
        final String title = "Notifikasi";
        notif.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
            notifTemplate(title,message);
            }
        });

}

    private void notifTemplate(String title, String message) {

        //final Intent intent = new Intent(Notifikasi.this, DisplayNotifikasi.class);
       // PendingIntent pendingIntent = PendingIntent.getActivity(Notifikasi.this,0,intent,PendingIntent.FLAG_UPDATE_CURRENT);

        NotificationCompat.Builder mBuilder = (NotificationCompat.Builder)
                new NotificationCompat.Builder(Notifikasi.this)
                .setSmallIcon(R.mipmap.ic_launcher)
                .setContentTitle(title)
                .setContentText(message)
                //.setContentIntent(pendingIntent)
                .setAutoCancel(true)
                .setDefaults(Notification.DEFAULT_LIGHTS | Notification.DEFAULT_SOUND | Notification.FLAG_AUTO_CANCEL);

        NotificationManager notificationManager =
                (NotificationManager) Notifikasi.this.getSystemService(Context.NOTIFICATION_SERVICE);
        notificationManager.notify(1, mBuilder.build());

    }

}
