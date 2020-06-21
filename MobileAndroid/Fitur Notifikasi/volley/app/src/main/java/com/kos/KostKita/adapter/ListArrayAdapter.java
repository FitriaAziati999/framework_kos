package com.kos.KostKita.adapter;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.TextView;

import androidx.annotation.NonNull;

import com.kos.KostKita.R;
import com.kos.KostKita.model.ModelDataNotif;

import java.util.ArrayList;

    /**
     * Created by JhonDev on 07/10/2016.
     */

    public class ListArrayAdapter extends ArrayAdapter<ModelDataNotif> {

        private ArrayList<ModelDataNotif> list;
        private LayoutInflater inflater;
        private int res;

        public ListArrayAdapter(Context context, int resource, ArrayList<ModelDataNotif> list) {
            super(context, resource, list);
            this.list = list;
            this.inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            this.res = resource;
        }

        @NonNull
        @Override
        public View getView(int position, View convertView, @NonNull ViewGroup parent) {

            MyHolder holder = null;


            if (convertView == null) {

                convertView = inflater.inflate(res, parent, false);

                holder = new MyHolder();

                holder.namapen = (TextView) convertView.findViewById(R.id.namapen);
                holder.alamatpen = (TextView) convertView.findViewById(R.id.alamatpen);
                holder.namakos = (TextView) convertView.findViewById(R.id.namakos);
                holder.harga = (TextView) convertView.findViewById(R.id.harga);


                convertView.setTag(holder);

            } else {

                holder = (MyHolder) convertView.getTag();
            }

            holder.namapen.setText("Nama Penyewa : "+list.get(position).getNamaPenyewa());
            //holder.Alamat.setText("Nama Mahasiswa : "+list.get(position).getNama());
           // holder.NamaKos.setText("Kelas Mahasiswa : "+list.get(position).getKelas_mhs());

            return convertView;
        }

        @Override
        public int getCount() {
            return list.size();
        }

        @Override
        public void remove(ModelDataNotif object) {
            super.remove(object);
        }

        @Override
        public void clear() {
            super.clear();
        }

        @Override
        public void notifyDataSetChanged() {
            super.notifyDataSetChanged();
        }

        static class MyHolder {

            TextView namapen;
            TextView alamatpen;
            TextView namakos;
            TextView harga;


        }
    }

//}
