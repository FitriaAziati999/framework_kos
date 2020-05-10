package com.kos.KostKita;

import androidx.appcompat.app.AppCompatActivity;
import androidx.cardview.widget.CardView;

import android.app.ProgressDialog;
import android.content.Context;
import android.os.Bundle;
import android.util.Log;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.Toast;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.kos.KostKita.model.Data;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class DataKos extends AppCompatActivity {
	private String URLstring = "https://demonuts.com/Demonuts/JsonTest/Tennis/json_parsing.php";
	private static ProgressDialog mProgressDialog;
	private CardView cardView;
	private ListView listView;
	ArrayList<Data> dataModelArrayList;
	private ListAdapter listAdapter;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_data_kos);

		//listView = findViewById(R.id.cardView);

		retrieveJSON();

	}

	private void retrieveJSON() {

		showSimpleProgressDialog(this, "Loading...","Fetching Json",false);

		StringRequest stringRequest = new StringRequest(Request.Method.GET, URLstring,
			new Response.Listener<String>() {
				@Override
				public void onResponse(String response) {

					Log.d("strrrrr", ">>" + response);

					try {

						JSONObject obj = new JSONObject(response);
						if(obj.optString("status").equals("true")){

							dataModelArrayList = new ArrayList<>();
							JSONArray dataArray  = obj.getJSONArray("data");

							for (int i = 0; i < dataArray.length(); i++) {

								Data playerModel = new Data();
								JSONObject dataobj = dataArray.getJSONObject(i);

								playerModel.setNama_kos(dataobj.getString("nama_kos"));
								playerModel.setAlamat_kos(dataobj.getString("alamat_kos"));
								playerModel.setJenis_kos(dataobj.getString("jenis_kos"));
								playerModel.setStok(dataobj.getString("stok"));
								playerModel.setImgURL(dataobj.getString("imgURL"));

								dataModelArrayList.add(playerModel);

							}

							setupListview();

						}

					} catch (JSONException e) {
						e.printStackTrace();
					}
				}
			},
			new Response.ErrorListener() {
				@Override
				public void onErrorResponse(VolleyError error) {
					//displaying the error in toast if occurrs
					Toast.makeText(getApplicationContext(), error.getMessage(), Toast.LENGTH_SHORT).show();
				}
			});

		// request queue
		RequestQueue requestQueue = Volley.newRequestQueue(this);

		requestQueue.add(stringRequest);


	}

	private void setupListview(){
		removeSimpleProgressDialog();  //will remove progress dialog
		listAdapter = new com.kos.KostKita.adapter.DataAdapter(this, dataModelArrayList);
		listView.setAdapter(listAdapter);
	}

	public static void removeSimpleProgressDialog() {
		try {
			if (mProgressDialog != null) {
				if (mProgressDialog.isShowing()) {
					mProgressDialog.dismiss();
					mProgressDialog = null;
				}
			}
		} catch (IllegalArgumentException ie) {
			ie.printStackTrace();

		} catch (RuntimeException re) {
			re.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		}

	}

	public static void showSimpleProgressDialog(Context context, String title,
												String msg, boolean isCancelable) {
		try {
			if (mProgressDialog == null) {
				mProgressDialog = ProgressDialog.show(context, title, msg);
				mProgressDialog.setCancelable(isCancelable);
			}

			if (!mProgressDialog.isShowing()) {
				mProgressDialog.show();
			}

		} catch (IllegalArgumentException ie) {
			ie.printStackTrace();
		} catch (RuntimeException re) {
			re.printStackTrace();
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

}















