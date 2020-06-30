package com.kos.KostKita;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
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
import com.squareup.picasso.MemoryPolicy;
import com.squareup.picasso.NetworkPolicy;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;

public class TipeKmr extends AppCompatActivity {
    TextView Ukuran, Stok, Harga, Penghuni, Fasilitaskamar;
    Button lanjut, hapus, beranda, btn_foto;
    String id = "8";
    ImageView fotokamar;
    private Bitmap bitmap;
    String URL_UPDATE = "http://192.168.100.37/framework_kos/index.php/tipe/update";
    String URL_TAMPIL = "http://192.168.100.37/framework_kos/index.php/tipe/id";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tipe_kmr);

        Ukuran = (TextView)findViewById(R.id.ukurankos);
        Stok = (TextView) findViewById(R.id.stokkos);
        Harga = (TextView) findViewById(R.id.hargakos);
        Penghuni  = (TextView) findViewById(R.id.kapasitas);
        Fasilitaskamar  = (TextView) findViewById(R.id.fasilitaskamar);
        beranda = (Button)findViewById(R.id.beranda);
        lanjut = (Button)findViewById(R.id.lanjut);
        fotokamar = (ImageView)findViewById(R.id.fotokamar);
        btn_foto = (Button)findViewById(R.id.btn_foto);

        hapus = (Button)findViewById(R.id.hapus);
        // Receiving value into activity using intent.
//		String TempHolder = getIntent().getStringExtra("emailpemTAG");
        // Setting up received value into TextView.

        getUserDetail();
        beranda.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent beranda = new Intent(getApplicationContext(),Beranda.class);
                startActivity(beranda);
                finish();
            }
        });
        lanjut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Update();
            }
        });

    }

    private void getUserDetail(){
        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Loading...");
        progressDialog.show();


        StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_TAMPIL,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();
                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String message = jsonObject.getString("message");
                            if (message.equals("success")){
                                JSONArray jsonArray = jsonObject.getJSONArray("data");
                                for (int i=0; i < jsonArray.length(); i++){
                                    JSONObject object = jsonArray.getJSONObject(i);
                                    String strUkuran = object.getString("ukuran").trim();
                                    String strStok = object.getString("stok").trim();
                                    String strHarga = object.getString("harga").trim();
                                    String strPenghuni = object.getString("penghuni").trim();
                                    String strFasilitaskamar = object.getString("fasilitaskamar").trim();
                                    //Picasso.get().load(strFoto).memoryPolicy(MemoryPolicy.NO_CACHE).networkPolicy(NetworkPolicy.NO_CACHE).into(foto_profil);
                                    Ukuran.setText(strUkuran);
                                    Stok.setText(strStok);
                                    Harga.setText(strHarga);
                                    Penghuni.setText(strPenghuni);
                                    Fasilitaskamar.setText(strFasilitaskamar);


                                }
                            } else {
                                progressDialog.dismiss();
                                Toast.makeText(TipeKmr.this, message, Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e){
                            e.printStackTrace();
                            progressDialog.dismiss();
                            Toast.makeText(TipeKmr.this, "Error "+e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(TipeKmr.this, "Error "+error.toString(), Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("id", id);
                params.put("Content-Type","application/x-www-form-urlencoded");
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

    private void Update() {
        final String idkos = this.id;
        final String Ukuran = this.Ukuran.getText().toString().trim();
        final String Stok = this.Stok.getText().toString().trim();
        final String Harga = this.Harga.getText().toString().trim();
        final String Penghuni = this.Penghuni.getText().toString().trim();
        final String Fasilitaskamar = this.Fasilitaskamar.getText().toString().trim();


        final ProgressDialog progressDialog = new ProgressDialog(this);
        progressDialog.setMessage("Update...");
        progressDialog.show();

        StringRequest stringRequest = new StringRequest(Request.Method.PUT, URL_UPDATE,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        progressDialog.dismiss();

                        try{
                            JSONObject jsonObject = new JSONObject(response);
                            String status = jsonObject.getString("status");
                            String error = jsonObject.getString("error");
                            String message = jsonObject.getString("message");

                            if (status.equals("200") && error.equals("false")){
                                Toast.makeText(TipeKmr.this, message, Toast.LENGTH_SHORT).show();
                                /*sessionManager.createSession(id);*/
                            } else {
                                Toast.makeText(TipeKmr.this, message, Toast.LENGTH_SHORT).show();
                            }
                        } catch (JSONException e){
                            e.printStackTrace();
                            Toast.makeText(TipeKmr.this, "error "+e.toString(), Toast.LENGTH_SHORT).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        progressDialog.dismiss();
                        Toast.makeText(TipeKmr.this, "error "+error.toString(), Toast.LENGTH_SHORT).show();
                    }
                })
        {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();
                params.put("id_kos", idkos);
                params.put("ukuran", Ukuran);
                params.put("stok", Stok);
                params.put("harga", Harga);
                params.put("penghuni", Penghuni);
                params.put("fasilitaskamar", Fasilitaskamar);
                return params;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

}





