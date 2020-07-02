package com.kos.KostKita.adapter;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.recyclerview.widget.RecyclerView;

import com.kos.KostKita.R;
import com.kos.KostKita.model.Notif_Model;

import java.util.ArrayList;

public class Adapter_Notif extends RecyclerView.Adapter<Adapter_Notif.ViewHolder> {

    private ArrayList<Notif_Model> listdata;
    private Activity activity;
    private Context context;

public Adapter_Notif(Activity activity, ArrayList<Notif_Model> listdata, Context context){

    this.listdata = listdata;
    this.activity = activity;
    this.context = context;
}

    @Override
    public Adapter_Notif.ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext())
                .inflate(R.layout.notif_row_item, parent,false);

        Adapter_Notif.ViewHolder vh = new Adapter_Notif.ViewHolder(v);
        return vh;
    }

    @Override
    public void onBindViewHolder(Adapter_Notif.ViewHolder holder, int position) {

    Notif_Model md = listdata.get(position);
    final Adapter_Notif.ViewHolder x=holder;

   holder.notif_idpem.setText(Integer.toString(md.getId_pemilik()));
   holder.notif_namakos.setText(md.getNama_kos());
   holder.notif_namapen.setText(md.getNama_penyewa());
   holder.notif_alamatkos.setText(md.getAlamat_penyewa());
   holder.notif_hargasewa.setText(Integer.toString(md.getHarga_sewa()));
   holder.notif_masuk_kos.setText(md.getMasuk_kos());
   holder.notif_nopen.setText(md.getNopen());

    }

    @Override
    public int getItemCount() {
        return listdata.size();
    }
    public static class ViewHolder extends RecyclerView.ViewHolder {
        private LinearLayout cv;
        private TextView notif_idpem, notif_namapen, notif_alamatkos, notif_namakos, notif_hargasewa, notif_masuk_kos, notif_nopen;
        String detailStatus;
        Context mContext;
        public ViewHolder(View v) {
            super(v);
            notif_idpem=(TextView)v.findViewById(R.id.notif_idpem);
            notif_namapen=(TextView)v.findViewById(R.id.notif_namapen);
            notif_alamatkos=(TextView)v.findViewById(R.id.notif_alamatkos);
            notif_namakos= (TextView)v.findViewById(R.id.notif_namakos);
            notif_hargasewa = (TextView)v.findViewById(R.id.notif_hargasewa);
            notif_masuk_kos = (TextView)v.findViewById(R.id.notif_masuk_kos);
            notif_nopen = (TextView) v.findViewById(R.id.notif_nopen);
        }
    }
}
