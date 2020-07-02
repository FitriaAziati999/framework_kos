package com.kos.KostKita;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.kos.KostKita.AppController.AppController;
import com.kos.KostKita.adapter.Adapter_Notif;
import com.kos.KostKita.config.Auth;
import com.kos.KostKita.model.Notif_Model;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class Notif extends AppCompatActivity {


    private Adapter_Notif adapter;
    private List<Notif_Model> list;
    private RecyclerView listdata;
    RecyclerView.LayoutManager mManager;
    ProgressDialog pd;
    Button kembali;

    String id_pemilik;
    Auth auth;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notif);
        kembali = (Button)findViewById(R.id.kembali);
      kembali.setOnClickListener(new View.OnClickListener() {
         @Override
         public void onClick(View v) {
             //Intent kembali = new Intent(getApplicationContext(),Beranda.class);
                //startActivity(kembali);
                finish();
            }
        });

        auth = new Auth(this);
        Intent i = getIntent();
        id_pemilik = i.getStringExtra("id_pem");

        listdata = (RecyclerView)findViewById(R.id.listdata);
        listdata.setHasFixedSize(true);

        list = new ArrayList<>();
        adapter = new Adapter_Notif(Notif.this,(ArrayList<Notif_Model>) list, this);
        mManager = new LinearLayoutManager(Notif.this, LinearLayoutManager.VERTICAL,false);
        listdata.setLayoutManager(mManager);
        listdata.setAdapter(adapter);
        pd = new ProgressDialog(Notif.this);
        loadJson(auth.getKodeUser());


}
    public void reload(){
        list.clear();
        loadJson(id_pemilik); // your code
        listdata.getAdapter().notifyDataSetChanged();

    }
    private void loadJson(String id)
    {
        pd.setMessage("Menampilkan Data");
        pd.setCancelable(false);
        pd.show();

        String URL = "http://192.168.1.11/framework_kos/api_notif/sewa?id_pemilik="+id;
        StringRequest getdata = new StringRequest(Request.Method.GET, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                JSONArray res = null;
                try {
                    res = new JSONArray(response);
                    if (res.length() > 0) {
                        pd.hide();
                        for (int i = 0; i < res.length(); i++) {
                            try {
                                JSONObject data = res.getJSONObject(i);
                                Notif_Model md = new Notif_Model();
                                md.setId_pemilik(data.getInt("id_pemilik"));
                                md.setNama_penyewa(data.getString("nama_penyewa"));
                                md.setAlamat_penyewa(data.getString("alamat_penyewa"));
                                md.setNama_kos(data.getString("nama_kos"));
                                md.setHarga_sewa(data.getInt("harga_sewa"));
                                md.setMasuk_kos(data.getString("masuk_kos"));
                                md.setNopen(data.getString("nopen"));
                                list.add(md);
                            } catch (Exception ea) {
                                ea.printStackTrace();
                                Log.d("pesan", ea.getMessage());
                            }
                        }
                        adapter.notifyDataSetChanged();
                        pd.cancel();
                    } else{
//                        not_found.setVisibility(View.VISIBLE);
                        pd.cancel();
                        Toast.makeText(Notif.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                    }
                } catch (JSONException e) {
                    pd.cancel();
                    Toast.makeText(Notif.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                    Log.d("pesan", "error "+e.getMessage());
                    e.printStackTrace();
                }
            }
        },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        pd.cancel();
                        Toast.makeText(Notif.this, "Data Kosong", Toast.LENGTH_SHORT).show();
                        Log.d("volley", "errornya : " + error.getMessage());
                    }
                });
        AppController.getInstance().addToRequestQueue(getdata);
        }
    }