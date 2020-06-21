package com.kos.KostKita;

import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.ListView;
import android.widget.TextView;

import androidx.appcompat.app.AppCompatActivity;

import com.kos.KostKita.API.ApiService;
import com.kos.KostKita.adapter.ListArrayAdapter;
import com.kos.KostKita.model.ModelDataNotif;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class ListNotif extends AppCompatActivity implements AdapterView.OnItemClickListener {


    ArrayList<ModelDataNotif> datanotifikasi = new ArrayList<ModelDataNotif>();
    ListView listview;
    ListArrayAdapter adapter;

    LinearLayout layoutload;
    TextView loadtext;
    ImageView download_data;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.list_notif);

        listview = (ListView) findViewById(R.id.list);
        listview.setOnItemClickListener(ListNotif.this);
        listview.setDividerHeight(0);
        setup();

    }

    public void setup() {
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(NotifUrl.ROOT_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();

        ApiService service = retrofit.create(ApiService.class);

        Call<List<ModelDataNotif>> call = service.getAllSewa();

        call.enqueue(new Callback<List<ModelDataNotif>>() {

            @Override
            public void onResponse(Call<List<ModelDataNotif>> call, Response<List<ModelDataNotif>> response) {

                if (response.isSuccessful()) {
                    int jumlah = response.body().size();

                    for (int i = 0; i < jumlah; i++) {

                        ModelDataNotif data;
                        data = new ModelDataNotif(
                                response.body().get(i).getIdPemilik(),
                                response.body().get(i).getNamaPenyewa(),
                                response.body().get(i).getAlamatPenyewa(),
                                response.body().get(i).getNamaKos(),
                                response.body().get(i).getHargaSewa());
                        datanotifikasi.add(data);
                        Log.d("RESPON", "onResponse: " + response.body().get(i).getIdPemilik());

                    }
                    listview.setVisibility(View.VISIBLE);
                    adapter = new ListArrayAdapter(ListNotif.this, R.layout.list_notif, datanotifikasi);
                    listview.setAdapter(adapter);

                    if (adapter.getCount() < 1 ) {
                        layoutload.setVisibility(View.VISIBLE);
                        String error = "Daftar mahasiswa Kosong";
                        loadtext.setText(error);
                        Bitmap icon = BitmapFactory.decodeResource(getResources(), R.drawable.ic_data_kosong);
                        download_data.setImageBitmap(icon);
                    } else {
                        layoutload.setVisibility(View.GONE);
                    }
                } else {
                    String error = "Error Retrive Data from Server !!!";
                    loadtext.setText(error);
                    Bitmap icon = BitmapFactory.decodeResource(getResources(), R.drawable.ic_network);
                    download_data.setImageBitmap(icon);

                }

            }

            @Override
            public void onFailure(Call<List<ModelDataNotif>> call, Throwable t) {
                String error = "Error Retrive Data from Server wwaau!!!\n" + t.getMessage();
                loadtext.setText(error);
                Bitmap icon = BitmapFactory.decodeResource(getResources(), R.drawable.ic_network);
                download_data.setImageBitmap(icon);
            }
        });

    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == 1) {
            adapter.clear();
            setup();
        }
    }
}
