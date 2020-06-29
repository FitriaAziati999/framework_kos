package com.kos.KostKita;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.LoginFilter;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.kos.KostKita.config.Auth;
import com.squareup.picasso.MemoryPolicy;
import com.squareup.picasso.NetworkPolicy;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;

public class TipeKamar extends AppCompatActivity {
    TextView Ukuran, Stok, Harga, Kapasitas, Fasilitaskamar;
    Button Simpan, Hapus;
    String id = "2";
    RequestQueue requestQueue;
    ImageView Fotokos;
    ProgressDialog progressDialog;
    String URL_UPDATE = "http://192.168.1.21/framework_kos/index.php/tipe/update";
    String URL_TAMPIL = "http://192.168.1.21/framework_kos/index.php/tipe/id";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        Ukuran = (TextView) findViewById(R.id.Ukuran_Kamar);
        Ukuran.setText(Auth.getInstance(this).getUkuran());
        Stok = (TextView) findViewById(R.id.Stok_Kost);
        Stok.setText(Auth.getInstance(this).getStok());
        Harga = (TextView) findViewById(R.id.Harga_Kost);
        Harga.setText(Auth.getInstance(this).getHarga());
        Kapasitas = (TextView) findViewById(R.id.Kapasitas_Kamar);
        Kapasitas.setText(Auth.getInstance(this).getKapasitas());
        Fasilitaskamar = (TextView) findViewById(R.id.Fasilitas_Kamar);
        Fasilitaskamar.setText(Auth.getInstance(this).getFasilitaskamar());

    }
}