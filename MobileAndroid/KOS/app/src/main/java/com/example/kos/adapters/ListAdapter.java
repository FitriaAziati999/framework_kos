package com.example.kos.adapters;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.TextView;

import com.example.kos.models.ModelData;
import com.example.kos.R;

import java.util.ArrayList;

public class ListAdapter extends BaseAdapter {
    private final ArrayList<ModelData> arrayList;
    private final LayoutInflater inflater;
    private Context context;
    private ArrayList<ModelData> dataModelArrayList;
    public <Data_Model> ListAdapter(Context context, ArrayList<Data_Model> arrayList) {
        this.arrayList = (ArrayList<ModelData>) arrayList;
        this.inflater = (LayoutInflater) context
                .getSystemService(Context.LAYOUT_INFLATER_SERVICE);

        this.context = context;
        this.dataModelArrayList = dataModelArrayList;
    }

    @Override
    public int getViewTypeCount() {
        return getCount();
    }
    @Override
    public int getItemViewType(int position) {

        return position;
    }

    @Override
    public int getCount() {
        return dataModelArrayList.size();
    }

    @Override
    public Object getItem(int position) {
        return dataModelArrayList.get(position);
    }

    @Override
    public long getItemId(int position) {
        return 0;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        ViewHolder holder;

        if (convertView == null) {
            holder = new ViewHolder();
            LayoutInflater inflater = (LayoutInflater) context
                    .getSystemService(Context.LAYOUT_INFLATER_SERVICE);
            convertView = inflater.inflate(R.layout.activity_main, null, true);

            holder.namaprofil = (TextView) convertView.findViewById(R.id.profilename);
            holder.emailprofil = (TextView) convertView.findViewById(R.id.emailprofil);
            holder.nama = (TextView) convertView.findViewById(R.id.textnama);
            holder.nohp = (TextView) convertView.findViewById(R.id.textNohp);
            holder.email = (TextView) convertView.findViewById(R.id.textEmail);
            holder.alamat = (TextView) convertView.findViewById(R.id.textAlamat);
            holder.username = (TextView) convertView.findViewById(R.id.textUsername);


            convertView.setTag(holder);
        }else {
            // the getTag returns the viewHolder object set as a tag to the view
            holder = (ViewHolder)convertView.getTag();
        }

        return convertView;
    }

    private class ViewHolder {

        protected TextView  namaprofil, emailprofil , nama, nohp, email, alamat, username;

    }}


