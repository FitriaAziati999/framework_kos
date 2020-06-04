package com.kos.KostKita.adapter;

import android.annotation.SuppressLint;
import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;

import com.kos.KostKita.DetailDataKos;
import com.kos.KostKita.R;
import com.kos.KostKita.model.Data;

import java.util.List;

public class RecyclerViewAdapter<RequestOptions> extends RecyclerView.Adapter<RecyclerViewAdapter.MyViewHolder> {

    private Context mContext;
    private List<Data> mData;
    private RequestOptions options;

    public RecyclerViewAdapter(Context mContext, List<Data> mData) {
        this.mContext = mContext;
        this.mData = mData;
        //options = new RequestOptions().centerCrop().placeholder(R.drawable.loading_shape).error(R.drawable.loading_shape);
    }

    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        View view;
        LayoutInflater inflater = LayoutInflater.from(mContext);
        view = inflater.inflate(R.layout.activity_list_data_kost, viewGroup, false);
        return new MyViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull MyViewHolder myviewHolder, @SuppressLint("RecyclerView") final int i) {
        myviewHolder.id_kos.setText(mData.get(i).getId_kos());
        myviewHolder.id_pemilik.setText(mData.get(i).getId_pemilik());
		myviewHolder.nama_kos.setText(mData.get(i).getNama_kos());
		myviewHolder.alamat_kos.setText(mData.get(i).getAlamat_kos());
		myviewHolder.khusus_kos.setText(mData.get(i).getKhusus_kos());
		myviewHolder.fasilitas_kos.setText(mData.get(i).getFasilitas_kos());
        myviewHolder.lingkungan_kos.setText(mData.get(i).getLingkungan_kos());
        myviewHolder.peraturan_kos.setText(mData.get(i).getPeraturan_kos());

        //Glide.with(mContext).load(mData.get(i).getFoto()).apply(options).into(myviewHolder.foto);
        //myviewHolder.
        myviewHolder .linearLayout.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(mContext, DetailDataKos.class);
                intent.putExtra("id", mData.get(i).getId_kos());
                mContext.startActivity(intent);
            }
        });
    }

    @Override
    public int getItemCount() {
        return mData.size();
    }

    static class MyViewHolder extends RecyclerView.ViewHolder{

        TextView id_kos, id_pemilik, nama_kos, alamat_kos, khusus_kos, fasilitas_kos, lingkungan_kos, peraturan_kos ;
        ImageView foto;
        LinearLayout linearLayout;

        MyViewHolder(View itemView){
            super(itemView);
           // id_kos = itemView.findViewById(R.id.id_kos);//
           // id_pemilik = itemView.findViewById(R.id.id_pemilik);//
            nama_kos = itemView.findViewById(R.id.txtnamakos);
            alamat_kos = itemView.findViewById(R.id.txtalamatkos);
            fasilitas_kos = itemView.findViewById(R.id.txtfasilitaskos);
			lingkungan_kos = itemView.findViewById(R.id.txtlingkungankos);
			peraturan_kos = itemView.findViewById(R.id.txtperaturankos);
            //linearLayout = itemView.findViewById(R.id.item_mhs_layout);//
        }
    }
}
