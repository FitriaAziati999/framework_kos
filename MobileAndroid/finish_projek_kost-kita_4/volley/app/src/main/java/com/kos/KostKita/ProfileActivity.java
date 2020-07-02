package com.kos.KostKita;
import android.app.ProgressDialog;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.Bundle;
import android.text.LoginFilter;
import android.util.Base64;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.AuthFailureError;
import com.android.volley.ClientError;
import com.android.volley.NetworkError;
import com.android.volley.NoConnectionError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.TimeoutError;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.android.material.snackbar.Snackbar;
import com.google.android.material.textfield.TextInputEditText;
import com.kos.KostKita.config.Auth;
import com.kos.KostKita.config.ServerApi;
import com.squareup.picasso.MemoryPolicy;
import com.squareup.picasso.NetworkPolicy;
import com.squareup.picasso.Picasso;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.ByteArrayOutputStream;
import java.io.FileNotFoundException;
import java.io.InputStream;
import java.util.HashMap;
import java.util.Map;

import de.hdodenhof.circleimageview.CircleImageView;

public class ProfileActivity extends AppCompatActivity {
	ProgressDialog progressDialog;
	Auth auth;
	RequestQueue queue;
	ArrayAdapter<String> adapter;

	private final int IMG_REQUEST = 1;
	boolean statusImage = false;
	private String mFotoProfil;

	String mIdpem;
	String mNamapem;
	String mNopem;
	String mEmailpem;
	String mAlamatpem;
	String mNoNIKpem;
	String mFotopem;
	String mUserpem;
	String mPasspem;

	EditText txtNama, txtTelepon, txtEmail, txtAlamat, txtNIK, txtUser;
	TextInputEditText txtPass;
	TextView txtPathFotopem, textnamanya, textemailnya;
	Button btnUpdateProfil, btnBack, btnBeranda;
	CircleImageView btnImage;
	Bitmap bitmapProfil;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

		progressDialog = new ProgressDialog(this);
		auth = new Auth(this);
		queue = Volley.newRequestQueue(this);

		mIdpem = auth.getKodeUser();

		btnImage = findViewById(R.id.imgprofile);
		mFotoProfil = "http://192.168.100.37/framework_kos/cirest/uploads/pemilik/" + auth.getFoto_pemilik();
		Picasso.get().load(mFotoProfil).into(btnImage);

		initWidgetId();
		btnUpdateProfil.setEnabled(false);
		loadProfil();

		btnImage.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				selectImage();
			}
		});

		btnBeranda.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Intent intent = new Intent(ProfileActivity.this, Beranda.class);
				startActivity(intent);
			}
		});
        // Adding click listener to logout button.
        btnBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(ProfileActivity.this, Beranda.class);
                startActivity(intent);
            }
        });

		btnUpdateProfil.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				if (validateTextInput(txtNIK, "Nik harus diisi!") &
						validateTextInput(txtNama, "Nama harus diisi!") &
						validateTextInput(txtAlamat, "Alamat harus diisi!") &
						validateTextInput(txtTelepon, "Telepon harus diisi!") &
						validateTextInput(txtUser, "Username harus diisi!") &
						validateTextInput(txtPass, "Password harus diisi!") &
						validateTextInput(txtEmail, "Email harus diisi!")) {

					updateProfil();

					Intent intent = new Intent(ProfileActivity.this, Beranda.class);
					startActivity(intent);
					Toast.makeText(getApplicationContext(),"Profil Berhasil di Update", Toast.LENGTH_SHORT).show();
					finish();

				} else {
					Snackbar.make(findViewById(R.id.activity_profile), "Data diri belum terpenuhi", Snackbar.LENGTH_SHORT).show();
				}
			}
		});
    }

	private void selectImage() {
		Intent intent = new Intent();
		intent.setType("image/*");
		intent.setAction(intent.ACTION_GET_CONTENT);
		startActivityForResult(intent, IMG_REQUEST);
	}

	private void initWidgetId() {
		btnUpdateProfil = findViewById(R.id.simpanprofil);
		txtNama = findViewById(R.id.textnama);
		txtAlamat = findViewById(R.id.textAlamat);
		txtTelepon = findViewById(R.id.textNohp);
		txtEmail = findViewById(R.id.textEmail);
		txtUser = findViewById(R.id.textUsername);
		txtNIK = findViewById(R.id.textNIK);
		txtPass = findViewById(R.id.txtPW);
		txtPathFotopem = findViewById(R.id.pathfoto);
		btnBack = findViewById(R.id.button_logout);
		btnBeranda = findViewById(R.id.beranda);
		textnamanya = findViewById(R.id.profilename);
		textemailnya = findViewById(R.id.profilemail);
	}

	private boolean validateTextInput(EditText editText, String errorMessage) {
		String input = editText.getText().toString().trim();

		if (input.isEmpty()) {
			editText.setError(errorMessage);
			return false;
		} else {
			editText.setError(null);
			return true;
		}
	}

	private String imageToString(Bitmap bitmap) {
		ByteArrayOutputStream byteArrayOutputStream = new ByteArrayOutputStream();
		bitmap.compress(Bitmap.CompressFormat.JPEG, 70, byteArrayOutputStream);
		byte[] imageBytes = byteArrayOutputStream.toByteArray();

		String encodedImage = Base64.encodeToString(imageBytes, Base64.DEFAULT);
		return encodedImage;
	}

	private void loadProfil() {
		progressDialog.setMessage("Sedang Memperbarui Data...");
		progressDialog.setCancelable(false);
		progressDialog.show();

		String url = ServerApi.URL_DATAUSER + auth.getKodeUser();

		StringRequest stringRequest = new StringRequest(Request.Method.GET, url, new Response.Listener<String>() {
			@Override
			public void onResponse(String response) {
				progressDialog.dismiss();
				try {
					JSONObject jsonObject = new JSONObject(response);
					String status = jsonObject.getString("status");

					if (status.equals("false")) {
						String message = jsonObject.getString("message");
						Snackbar.make(findViewById(R.id.activity_profile), message, Snackbar.LENGTH_LONG).show();
					} else {
						JSONArray data = jsonObject.getJSONArray("data");
						JSONObject dataUser = data.getJSONObject(0);

						mNamapem = dataUser.getString("namapem");
						mAlamatpem = dataUser.getString("alamatpem");
						mNopem = dataUser.getString("nopem");
						mEmailpem = dataUser.getString("emailpem");
						mUserpem = dataUser.getString("userpem");
						mNoNIKpem = dataUser.getString("nikpem");
						mPasspem = dataUser.getString("passpem");
						mFotopem = dataUser.getString("fotopem");

						txtNama.setText(mNamapem);
						txtAlamat.setText(mAlamatpem);
						txtTelepon.setText(mNopem);
						txtEmail.setText(mEmailpem);
						txtUser.setText(mUserpem);
						txtNIK.setText(mNoNIKpem);
						txtPass.setText(mPasspem);
						textnamanya.setText(mNamapem);
						textemailnya.setText(mEmailpem);

						btnUpdateProfil.setEnabled(true);
					}
				} catch (Exception e) {
					Snackbar.make(findViewById(R.id.activity_profile), e.toString(), Snackbar.LENGTH_LONG).show();
				}
			}
		}, new Response.ErrorListener() {
			@Override
			public void onErrorResponse(VolleyError error) {
				progressDialog.dismiss();
				String message = "Terjadi error. Coba beberapa saat lagi.";

				if (error instanceof NetworkError) {
					message = "Tidak dapat terhubung ke internet. Harap periksa koneksi anda.";
				} else if (error instanceof AuthFailureError) {
					message = "Gagal login. Harap periksa email dan password anda.";
				} else if (error instanceof ClientError) {
					message = "Gagal login. Harap periksa email dan password anda.";
				} else if (error instanceof NoConnectionError) {
					message = "Tidak ada koneksi internet. Harap periksa koneksi anda.";
				} else if (error instanceof TimeoutError) {
					message = "Connection Time Out. Harap periksa koneksi anda.";
				}

				Snackbar.make(findViewById(R.id.activity_profile), message, Snackbar.LENGTH_LONG).show();
			}
		});
		queue.add(stringRequest);
	}

	private void updateProfil() {
		progressDialog.setMessage("Sedang Memperbarui Data...");
		progressDialog.setCancelable(false);
		progressDialog.show();

		String url = ServerApi.URL_EDITUSER;

		StringRequest updateRequest = new StringRequest(Request.Method.PUT, url, new Response.Listener<String>() {
			@Override
			public void onResponse(String response) {
				progressDialog.dismiss();

				try {
					JSONObject jsonObject = new JSONObject(response);
					String message = jsonObject.getString("message");

					Snackbar.make(findViewById(R.id.activity_profile), message, Snackbar.LENGTH_LONG).show();
				} catch (Exception e) {
					Toast.makeText(getApplicationContext(), e.toString(), Toast.LENGTH_LONG).show();
				}
			}
		}, new Response.ErrorListener() {
			@Override
			public void onErrorResponse(VolleyError error) {
				progressDialog.dismiss();
				String message = "Terjadi error. Coba beberapa saat lagi.";

				if (error instanceof NetworkError) {
					message = "Tidak dapat terhubung ke internet. Harap periksa koneksi anda.";
				} else if (error instanceof AuthFailureError) {
					message = "Gagal login. Harap periksa email dan password anda.";
				} else if (error instanceof ClientError) {
					message = "Gagal login. Harap periksa email dan password anda.";
				} else if (error instanceof NoConnectionError) {
					message = "Tidak ada koneksi internet. Harap periksa koneksi anda.";
				} else if (error instanceof TimeoutError) {
					message = "Connection Time Out. Harap periksa koneksi anda.";
				}

				Snackbar.make(findViewById(R.id.activity_profile), message, Snackbar.LENGTH_LONG).show();
			}
		}) {
			protected Map<String, String> getParams() throws AuthFailureError {
				Map<String, String> params = new HashMap<>();

				params.put("id_pemilik", mIdpem);
				params.put("namapem", txtNama.getText().toString().trim());
				params.put("alamatpem", txtAlamat.getText().toString().trim());
				params.put("nopem", txtTelepon.getText().toString().trim());
				params.put("emailpem", txtEmail.getText().toString().trim());
				params.put("userpem", txtUser.getText().toString().trim());
				params.put("nikpem", txtNIK.getText().toString().trim());
				params.put("fotopem", imageToString(bitmapProfil));

				return params;
			}
		};

		queue.add(updateRequest);
	}

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == IMG_REQUEST && resultCode == RESULT_OK && data != null) {
            Uri path = data.getData();

            try {
                InputStream inputStream = getContentResolver().openInputStream(path);
                String pathGambar = path.getPath();
                bitmapProfil = BitmapFactory.decodeStream(inputStream);

                txtPathFotopem.setText(pathGambar);

                statusImage = true;

            } catch (FileNotFoundException e) {
                Toast.makeText(this, e.toString(), Toast.LENGTH_LONG).show();
            }
        }
    }
    
}





