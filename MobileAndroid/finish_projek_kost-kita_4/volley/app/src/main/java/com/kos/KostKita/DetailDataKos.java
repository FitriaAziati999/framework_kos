package com.kos.KostKita;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.text.LoginFilter;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.kos.KostKita.config.ServerApi;
import com.squareup.picasso.MemoryPolicy;
import com.squareup.picasso.NetworkPolicy;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;

public class DetailDataKos extends AppCompatActivity {
	TextView Namakos, Alamatkos, Khususkos, Fasilitaskos, Lingkungankos, Peraturankos;
	Button lanjut, beranda;
	RequestQueue queue;
	String ID_KOS;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_detail_data_kos);
		queue = Volley.newRequestQueue(this);
		Namakos = (TextView)findViewById(R.id.namakost);
		Alamatkos = (TextView) findViewById(R.id.alamatkost);
		Khususkos = (TextView) findViewById(R.id.khususkost);
		Fasilitaskos  = (TextView) findViewById(R.id.fasilitaskost);
		Lingkungankos  = (TextView) findViewById(R.id.lingkungankost);
		Peraturankos  = (TextView) findViewById(R.id.peraturankost);
 		beranda = (Button)findViewById(R.id.beranda);
		lanjut = (Button)findViewById(R.id.lanjut);

		beranda.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Intent beranda = new Intent(getApplicationContext(),Beranda.class);
				startActivity(beranda);
				finish();
			}
		});
		lanjut.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
//				Update();
			}
		});
		Intent intent = getIntent();
		ID_KOS = intent.getStringExtra("id_kos");

		Toast.makeText(this, ID_KOS, Toast.LENGTH_LONG).show();

	}

	private void LoadDetail() {
		StringRequest loadDetKos = new StringRequest(Request.Method.POST, ServerApi.URL_DETAILKOS, new Response.Listener<String>() {
			@Override
			public void onResponse(String response) {
				try
				{
					JSONObject hasilRequest = new JSONObject(response);
					String status = hasilRequest.getString("status");

					if (status.equals("true")) {
						JSONArray data = hasilRequest.getJSONArray("data");
						JSONObject utama = data.getJSONObject(0);

						String Kosid = utama.getString("id_kos");
						String Kosnama = utama.getString("namakos");
						String Kosalamat = utama.getString("alamatkos");
						String Koskhusus = utama.getString("khususkos");
						String Kosfasilitas = utama.getString("fasilitaskos");
						String Koslingkungan = utama.getString("fasilitaskos");
						String Kosperaturan = utama.getString("fasilitaskos");

						Namakos.setText(Kosnama);
						Alamatkos.setText(Kosalamat);
						Khususkos.setText(Koskhusus);
						Fasilitaskos.setText(Kosfasilitas);
						Lingkungankos.setText(Koslingkungan);
						Peraturankos.setText(Kosperaturan);
					}
				} catch (Exception e) {
					Toast.makeText(DetailDataKos.this, e.toString(), Toast.LENGTH_LONG).show();
				}
			}
		}, new Response.ErrorListener() {
			@Override
			public void onErrorResponse(VolleyError error) {
				Toast.makeText(DetailDataKos.this, error.toString(), Toast.LENGTH_LONG).show();
			}
		}) {
				@Override
				protected Map<String, String> getParams() throws AuthFailureError {
				Map<String, String> params = new HashMap<>();
				params.put("id_kos", ID_KOS);

				return params;
			}
		};
		queue.add(loadDetKos);
	}


}





