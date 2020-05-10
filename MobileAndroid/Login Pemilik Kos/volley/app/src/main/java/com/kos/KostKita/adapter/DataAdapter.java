package com.kos.KostKita.adapter;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import java.util.ArrayList;

import com.kos.KostKita.R;
import com.kos.KostKita.model.Data;
import com.squareup.picasso.Picasso;

public class DataAdapter extends BaseAdapter {

	private Context context;
	private ArrayList<Data> dataModelArrayList;

	public DataAdapter(Context context, ArrayList<Data>
		dataModelArrayList) {

		this.context = context;
		this.dataModelArrayList = dataModelArrayList;
	}

	@Override
	public int  getItemViewType(int position) {
		return position;
	}
	@Override
	public int getCount() {
		return dataModelArrayList.size();
	}
	@Override
	public Object getItem(int position){
		return dataModelArrayList.get(position);
	}
	@Override
	public long getItemId(int position){
		return 0;
	}
	@Override
	public View getView(int position, View convertView, ViewGroup parent) {
		ViewHolder holder;

		if (convertView == null) {
			holder = new ViewHolder();
			LayoutInflater inflater = (LayoutInflater) context.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
			convertView = inflater.inflate(R.layout.list_data, null, true);

			holder.iv = (ImageView)
				convertView.findViewById(R.id.gambar_kos);
			holder.tvnama = (TextView)
				convertView.findViewById(R.id.nama_kos);
			holder.tvalamat = (TextView)
				convertView.findViewById(R.id.alamat_kos);
			holder.tvjenis = (TextView)
				convertView.findViewById(R.id.jenis_kos);
			holder.tvstok = (TextView)
				convertView.findViewById(R.id.jenis_kos);

			convertView.setTag(holder);
		} else {
			holder = (ViewHolder)convertView.getTag();
		}

		Picasso.get().load(dataModelArrayList.get(position).getImgURL()).into(holder.iv);
		holder.tvnama.setText("Name:" + dataModelArrayList.get(position).getNama_kos());
		holder.tvalamat.setText("Country:" + dataModelArrayList.get(position).getAlamat_kos());
		holder.tvjenis.setText("City:" + dataModelArrayList.get(position).getJenis_kos());
		holder.tvstok.setText("City:" + dataModelArrayList.get(position).getStok());
		return convertView;
	}

	private class ViewHolder {
		protected TextView tvnama, tvalamat, tvjenis, tvstok;
		protected ImageView iv;
	}


}
