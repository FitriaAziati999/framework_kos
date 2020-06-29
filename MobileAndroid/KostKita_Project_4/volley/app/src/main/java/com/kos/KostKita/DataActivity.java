package com.kos.KostKita;

import android.annotation.SuppressLint;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.floatingactionbutton.FloatingActionButton;
import com.kos.KostKita.adapter.RecyclerViewAdapter;
import com.kos.KostKita.model.Data;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Objects;

import okhttp3.internal.Util;

public class DataActivity extends RecyclerView.Adapter<DataActivity.HolderData> {
	private List<ModalData> mItems;
	private Context context;
	private OnHistoryClickListener listener;

	public interface OnHistoryClickListener{
		public void onClick(int position);
	}

	public void setListener(OnHistoryClickListener listener) {
		this.listener = listener;
	}

	public DataActivity(Context context, List<ModalData> mItems)
	{
		this.context = context;
		this.mItems = mItems;
	}
	@NonNull
	@Override
	public HolderData onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
		View layout = LayoutInflater.from(parent.getContext()).inflate(R.layout.activity_data_kos, parent, false);
		HolderData holderData = new DataActivity.HolderData(layout, listener);
		return holderData;
	}

	@Override
	public void onBindViewHolder(@NonNull final HolderData holder, int position) {
		ModalData me = mItems.get(position);
		holder.NamaKost.setText(me.getNamaKost());
		holder.AlamatKost.setText(me.getAlamatKost());
		holder.JenisKost.setText(me.getJeniskost());
		holder.Stok.setText(me.getStok());
	}

	@Override
	public int getItemCount() {
		return mItems.size();
	}

	public static class HolderData extends RecyclerView.ViewHolder {
		TextView NamaKost,AlamatKost, JenisKost, Stok;
		public HolderData(@NonNull View itemView, final OnHistoryClickListener listener) {
			super(itemView);
			NamaKost = itemView.findViewById(R.id.NamaKost);
			AlamatKost = itemView.findViewById(R.id.AlamatKost);
			JenisKost = itemView.findViewById(R.id.JenisKost);
			Stok = itemView.findViewById(R.id.stokKost);

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