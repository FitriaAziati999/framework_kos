package com.kos.KostKita;

import androidx.annotation.Nullable;
import androidx.annotation.RequiresApi;
import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.net.Uri;
import android.os.Build;
import android.os.Bundle;
import android.os.Handler;
import android.provider.MediaStore;
import android.util.Base64;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.inputmethod.InputMethodManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.kos.KostKita.model.Data;
import com.squareup.picasso.MemoryPolicy;
import com.squareup.picasso.NetworkPolicy;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.util.HashMap;
import java.util.Map;
import java.util.Objects;

import de.hdodenhof.circleimageview.CircleImageView;

public class DetailDataKos extends AppCompatActivity {

		private static final String TAG = DetailDataKos.class.getSimpleName();
		private EditText nama_kos, alamat_kos, khusus_kos, fasilitas_kos, lingkungan_kos, peraturan_kos ;
		private Button btn_hapus;
		private Bitmap bitmap;
		ImageView gambar_kost;
		SessionManager sessionManager;
		private static String URL_UPDATE = "http://192.168.100.37/framework_kos/index.php/detaildata";
		String getId;
		private Menu action;

		@RequiresApi(api = Build.VERSION_CODES.KITKAT)
		@Override
		protected void onCreate(Bundle savedInstanceState) {
			super.onCreate(savedInstanceState);
			setContentView(R.layout.activity_detail_data_kos);
			Objects.requireNonNull(getSupportActionBar()).setTitle("Data Mahasiswa");

			sessionManager = new SessionManager(this);
			sessionManager.checkLogin();

			getId = getIntent().getStringExtra("id");

			nama_kos = findViewById(R.id.namakost);
			alamat_kos = findViewById(R.id.alamatkost);
			khusus_kos = findViewById(R.id.khususkost);
			fasilitas_kos = findViewById(R.id.fasilitaskost);
			lingkungan_kos = findViewById(R.id.lingkungankost);
			peraturan_kos = findViewById(R.id.peraturankost);
			Button btn_foto = findViewById(R.id.btn_foto);
			btn_hapus = findViewById(R.id.hapus);
			gambar_kost = findViewById(R.id.GambarKost);
			nama_kos.setEnabled(false);
			alamat_kos.setEnabled(false);
			khusus_kos.setEnabled(false);
			fasilitas_kos.setEnabled(false);
			lingkungan_kos.setEnabled(false);
			peraturan_kos.setEnabled(false);

			btn_foto.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {
					chooseFile();
				}
			});
			btn_hapus.setOnClickListener(new View.OnClickListener() {
				@Override
				public void onClick(View v) {
					hapusMhs();
				}
			});
			getUserDetail();
		}

		private void hapusMhs() {
			btn_hapus.setVisibility(View.GONE);

			String URL_DELETE = "http://idtechdev.com/mahasiswa/mhs/delete";
			StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_DELETE,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						try{
							JSONObject jsonObject = new JSONObject(response);
							String status = jsonObject.getString("status");
							String error = jsonObject.getString("error");
							String message = jsonObject.getString("message");

							if (status.equals("200") && error.equals("false")){
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
								new Handler().postDelayed(new Runnable() {

									@Override
									public void run() {
										DetailDataKos.this.startActivity(new Intent(DetailDataKos.this, DataActivity.class));
									}
								}, 2000);
							} else {
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
								btn_hapus.setVisibility(View.VISIBLE);
							}
						} catch (JSONException e){
							e.printStackTrace();
							Toast.makeText(DetailDataKos.this, "Error! " + e.toString(), Toast.LENGTH_SHORT).show();

							btn_hapus.setVisibility(View.VISIBLE);
						}
					}
				},
				new Response.ErrorListener() {
					@Override
					public void onErrorResponse(VolleyError error) {
						Toast.makeText(DetailDataKos.this, "Error! " + error.toString(), Toast.LENGTH_SHORT).show();

						btn_hapus.setVisibility(View.VISIBLE);
					}
				})

			{

				@Override
				public String getBodyContentType() {
					return "application/x-www-form-urlencoded; charset=UTF-8";
				}

				@Override
				protected Map<String, String> getParams() {
					Map<String, String> params = new HashMap<>();
					params.put("id",getId);
					params.put("Content-Type","application/x-www-form-urlencoded");
					return params;
				}
			};

			RequestQueue requestQueue = Volley.newRequestQueue(this);
			requestQueue.add(stringRequest);
		}

		private void chooseFile() {
			Intent intent = new Intent();
			intent.setType("Image/*");
			intent.setAction(Intent.ACTION_GET_CONTENT);
			startActivityForResult(Intent.createChooser(intent, "Pilih Foto"), 1);
		}

		@Override
		protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
			super.onActivityResult(requestCode, resultCode, data);
			if (requestCode == 1 && resultCode == RESULT_OK && data != null && data.getData() != null){
				Uri filePath = data.getData();
				try{
					bitmap = MediaStore.Images.Media.getBitmap(getContentResolver(), filePath);
					gambar_kost.setImageBitmap(bitmap);
				} catch (IOException e){
					e.printStackTrace();
				}

				UploadFoto(getId, getStringImage(bitmap));
			}
		}

		public String getStringImage(Bitmap bitmap){
			ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
			bitmap.compress(Bitmap.CompressFormat.JPEG, 100, byteArrayOutputStream);
			byte[] imageByteArray = byteArrayOutputStream.toByteArray();
			return Base64.encodeToString(imageByteArray, Base64.DEFAULT);
		}

		private void UploadFoto(final String getId, final String foto) {
			final ProgressDialog progressDialog = new ProgressDialog(this);
			progressDialog.setMessage("Uploading...");
			progressDialog.show();
			StringRequest stringRequest = new StringRequest(Request.Method.PUT, URL_UPDATE,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						progressDialog.dismiss();
						Log.i(TAG, response);
						try{
							JSONObject jsonObject = new JSONObject(response);
							String status = jsonObject.getString("status");
							String error = jsonObject.getString("error");
							String message = jsonObject.getString("message");
							if (status.equals("200") && error.equals("false")){
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
								Intent intent = new Intent(DetailDataKos.this, DataActivity.class);
								intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
								intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK);
								startActivity(intent);
							} else {
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
							}
						} catch (JSONException e){
							e.printStackTrace();
							progressDialog.dismiss();
							Toast.makeText(DetailDataKos.this, e.toString(), Toast.LENGTH_SHORT).show();
						}
					}
				},
				new Response.ErrorListener() {
					@Override
					public void onErrorResponse(VolleyError error) {
						progressDialog.dismiss();
						Toast.makeText(DetailDataKos.this, "Cek " + error.toString(), Toast.LENGTH_SHORT).show();
					}
				})
			{
				@Override
				protected Map<String, String> getParams() {
					Map<String, String> params = new HashMap<>();
					params.put("id", getId);
					params.put("foto", foto);
					return params;
				}
			};
			RequestQueue requestQueue = Volley.newRequestQueue(this);
			requestQueue.add(stringRequest);
		}

		private void getUserDetail(){
			final ProgressDialog progressDialog = new ProgressDialog(this);
			progressDialog.setMessage("Loading...");
			progressDialog.show();

			String URL_READ = "http://idtechdev.com/mahasiswa/mhs/id";
			StringRequest stringRequest = new StringRequest(Request.Method.POST, URL_READ,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						progressDialog.dismiss();
						Log.i(TAG, response);
						try{
							JSONObject jsonObject = new JSONObject(response);
							String status = jsonObject.getString("status");
							String error = jsonObject.getString("error");
							if (status.equals("200") && error.equals("false")){
								JSONArray jsonArray = jsonObject.getJSONArray("mhs");
								for (int i=0; i < jsonArray.length(); i++){
									JSONObject object = jsonArray.getJSONObject(i);
									String strnamakost = object.getString("namakos").trim();
									String stralamatkost = object.getString("alamatkos").trim();
									String strkhususkost = object.getString("khususkost").trim();
									String strfasilitaskost = object.getString("fasilitaskos").trim();
									String strlingkungankost = object.getString("lingkungankos").trim();
									String strperaturankost = object.getString("peraturankos").trim();
									String strFoto = object.getString("foto").trim();
									Picasso.get().load(strFoto).memoryPolicy(MemoryPolicy.NO_CACHE).networkPolicy(NetworkPolicy.NO_CACHE).into(gambar_kost);
									nama_kos.setText(strnamakost);
									alamat_kos.setText(stralamatkost);
									khusus_kos.setText(strkhususkost);
									fasilitas_kos.setText(strfasilitaskost);
									lingkungan_kos.setText(strlingkungankost);
									peraturan_kos.setText(strperaturankost);

								}
							} else {
								progressDialog.dismiss();
								Toast.makeText(DetailDataKos.this, "Data tidak tersedia", Toast.LENGTH_SHORT).show();
							}
						} catch (JSONException e){
							e.printStackTrace();
							progressDialog.dismiss();
							Toast.makeText(DetailDataKos.this, "Error "+e.toString(), Toast.LENGTH_SHORT).show();
						}
					}
				},
				new Response.ErrorListener() {
					@Override
					public void onErrorResponse(VolleyError error) {
						progressDialog.dismiss();
						Toast.makeText(DetailDataKos.this, "Error "+error.toString(), Toast.LENGTH_SHORT).show();
					}
				})
			{
				@Override
				protected Map<String, String> getParams() {
					Map<String, String> params = new HashMap<>();
					params.put("id", getId);
					params.put("Content-Type","application/x-www-form-urlencoded");
					return params;
				}
			};

			RequestQueue requestQueue = Volley.newRequestQueue(this);
			requestQueue.add(stringRequest);
		}

		@Override
		protected void onResume() {
			super.onResume();
		}

		@Override
		public boolean onCreateOptionsMenu(Menu menu) {
			MenuInflater menuInflater = getMenuInflater();
			menuInflater.inflate(R.menu.menu_action, menu);
			action = menu;
			action.findItem(R.id.menu_save).setVisible(false);
			return true;
		}

		@Override
		public boolean onOptionsItemSelected(MenuItem item) {
			switch (item.getItemId()){
				case R.id.menu_edit:
					nama_kos.setEnabled(true);
					alamat_kos.setEnabled(true);
					khusus_kos.setEnabled(true);
					fasilitas_kos.setEnabled(true);
					lingkungan_kos.setEnabled(true);
					peraturan_kos.setEnabled(true);
					btn_hapus.setVisibility(View.GONE);
					nama_kos.setFocusableInTouchMode(true);
					alamat_kos.setFocusableInTouchMode(true);
					khusus_kos.setFocusableInTouchMode(true);
					fasilitas_kos.setFocusableInTouchMode(true);
					lingkungan_kos.setFocusableInTouchMode(true);
					peraturan_kos.setFocusableInTouchMode(true);
					InputMethodManager inputMethodManager = (InputMethodManager)getSystemService(Context.INPUT_METHOD_SERVICE);
					assert inputMethodManager != null;
					inputMethodManager.showSoftInput(nama_kos, InputMethodManager.SHOW_IMPLICIT);
					action.findItem(R.id.menu_edit).setVisible(false);
					action.findItem(R.id.menu_save).setVisible(true);
					return true;

				case R.id.menu_save:
					Update();
					action.findItem(R.id.menu_edit).setVisible(true);
					action.findItem(R.id.menu_save).setVisible(false);
					nama_kos.setFocusableInTouchMode(false);
					alamat_kos.setFocusableInTouchMode(false);
					khusus_kos.setFocusableInTouchMode(false);
					fasilitas_kos.setFocusableInTouchMode(false);
					lingkungan_kos.setFocusableInTouchMode(false);
					peraturan_kos.setFocusableInTouchMode(false);
					nama_kos.setFocusable(false);
					alamat_kos.setFocusable(false);
					khusus_kos.setFocusable(false);
					fasilitas_kos.setFocusable(false);
					lingkungan_kos.setFocusable(false);
					peraturan_kos.setFocusable(false);
					return true;
				default:
					return super.onOptionsItemSelected(item);
			}
		}

		private void Update() {
			final String namakos = this.nama_kos.getText().toString().trim();
			final String alamatkos = this.alamat_kos.getText().toString().trim();
			final String khususkos = this.khusus_kos.getText().toString().trim();
			final String fasilitaskos = this.fasilitas_kos.getText().toString().trim();
			final String lingkungankos = this.lingkungan_kos.getText().toString().trim();
			final String peraturankos = this.peraturan_kos.getText().toString().trim();

			final ProgressDialog progressDialog = new ProgressDialog(this);
			progressDialog.setMessage("Update...");
			progressDialog.show();

			StringRequest stringRequest = new StringRequest(Request.Method.PUT, URL_UPDATE,
				new Response.Listener<String>() {
					@Override
					public void onResponse(String response) {
						progressDialog.dismiss();

						try{
							JSONObject jsonObject = new JSONObject(response);
							String status = jsonObject.getString("status");
							String error = jsonObject.getString("error");
							String message = jsonObject.getString("message");

							if (status.equals("200") && error.equals("false")){
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
								Intent intent = new Intent(DetailDataKos.this, DataActivity.class);
								intent.addFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
								intent.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK);
								startActivity(intent);
							} else {
								Toast.makeText(DetailDataKos.this, message, Toast.LENGTH_SHORT).show();
							}
						} catch (JSONException e){
							e.printStackTrace();
							Toast.makeText(DetailDataKos.this, "JSONException "+e.toString(), Toast.LENGTH_SHORT).show();
						}
					}
				},
				new Response.ErrorListener() {
					@Override
					public void onErrorResponse(VolleyError error) {
						progressDialog.dismiss();
						Toast.makeText(DetailDataKos.this, "onResponError "+error.toString(), Toast.LENGTH_SHORT).show();
					}
				})
			{
				@Override
				protected Map<String, String> getParams() {
					Map<String, String> params = new HashMap<>();
					params.put("namakos", namakos);
					params.put("alamatkos", alamatkos);
					params.put("khususkos", khususkos);
					params.put("fasilitaskos", fasilitaskos);
					params.put("lingkungankos", lingkungankos);
					params.put("peraturankos", peraturankos);
					params.put("id_kos", getId);
					return params;
				}
			};

			RequestQueue requestQueue = Volley.newRequestQueue(this);
			requestQueue.add(stringRequest);
		}

	}

