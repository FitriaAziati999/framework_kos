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

public class RecyclerViewAdapter extends RecyclerView.Adapter<RecyclerViewAdapter.MyViewHolder> {
    private List<Data> mItems;
    private Context context;
    private OnHistoryClickListener listener;

    public interface OnHistoryClickListener{
        public void onClick(int position);
    }

    public void setListener(OnHistoryClickListener listener) {
        this.listener = listener;
    }

    public RecyclerViewAdapter(Context context, List<Data> mItems) {
        this.context = context;
        this.mItems = mItems;
    }

    @NonNull
    @Override
    public MyViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        View layout = LayoutInflater.from(parent.getContext()).inflate(R.layout.activity_list_data_kost, parent, false);
        MyViewHolder myViewHolder = new RecyclerViewAdapter.MyViewHolder(layout);
        return myViewHolder;
    }

    @Override
    public void onBindViewHolder(@NonNull final MyViewHolder holder, int position) {
        Data me = mItems.get(position);
        holder.nama_kos.setText(me.getNama_kos());
        holder.alamat_kos.setText(me.getAlamat_kos());
        holder.jenis_kos.setText(me.getKhusus_kos());
    }

    @Override
    public int getItemCount() {
        return mItems.size();
    }

    public class MyViewHolder extends RecyclerView.ViewHolder {
        TextView jenis_kos, alamat_kos, nama_kos;
        public MyViewHolder(@NonNull View itemView) {
            super(itemView);
            nama_kos = itemView.findViewById(R.id.NamaKos);
            alamat_kos = itemView.findViewById(R.id.AlamatKos);
            jenis_kos = itemView.findViewById(R.id.JenisKos);

            itemView.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    if(listener != null){
                        int position = getAdapterPosition();
                        if (position != RecyclerView.NO_POSITION){
                            listener.onClick(position);
                        }
                    }
                }
            });
        }
    }
}
