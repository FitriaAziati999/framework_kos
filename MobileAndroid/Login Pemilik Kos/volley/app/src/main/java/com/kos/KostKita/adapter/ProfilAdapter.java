package com.kos.KostKita.adapter;

	import android.content.Intent;
	import android.support.v7.widget.RecyclerView;
	import android.view.LayoutInflater;
	import android.view.View;
	import android.view.ViewGroup;
	import android.widget.TextView;

	import androidx.recyclerview.widget.RecyclerView;

	import com.example.root.kontak.EditActivity;
	import com.example.root.kontak.Model.Kontak;
	import com.example.root.kontak.R;
	import com.kos.KostKita.model.Profil;

	import java.util.List;

/**
 * Created by root on 2/3/17.
 */

public class ProfilAdapter extends RecyclerView.Adapter<ProfilAdapter.MyViewHolder>{
	List<Profil> mKontakList;

	public ProfilAdapter(List <Profil> KontakList) {
		mKontakList = KontakList;
	}

	@Override
	public MyViewHolder onCreateViewHolder (ViewGroup parent,int viewType){
		View mView = LayoutInflater.from(parent.getContext()).inflate(R.layout.kontak_list, parent, false);
		MyViewHolder mViewHolder = new MyViewHolder(mView);
		return mViewHolder;
	}

	@Override
	public void onBindViewHolder (MyViewHolder holder,final int position){
		holder.mTextViewId.setText("Id = " + mKontakList.get(position).getId());
		holder.mTextViewNama.setText("Nama = " + mKontakList.get(position).getNama());
		holder.mTextViewNomor.setText("Nomor = " + mKontakList.get(position).getNomor());
		holder.itemView.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View view) {
				Intent mIntent = new Intent(view.getContext(), EditActivity.class);
				mIntent.putExtra("Nama", mKontakList.get(position).getNama());
				mIntent.putExtra("Nama", mKontakList.get(position).getNama());
				mIntent.putExtra("Nomor", mKontakList.get(position).getNomor());
				view.getContext().startActivity(mIntent);
			}
		});
	}

	@Override
	public int getItemCount () {
		return mKontakList.size();
	}

	public class MyViewHolder extends RecyclerView.ViewHolder {
		public TextView mTextViewId, mTextViewNama, mTextViewNomor;

		public MyViewHolder(View itemView) {
			super(itemView);
			mTextViewId = (TextView) itemView.findViewById(R.id.tvId);
			mTextViewNama = (TextView) itemView.findViewById(R.id.tvNama);
			mTextViewNomor = (TextView) itemView.findViewById(R.id.tvNomor);
		}
	}
}
