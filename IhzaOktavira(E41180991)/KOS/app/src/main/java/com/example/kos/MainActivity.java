package com.example.kos;

import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;


public class MainActivity extends AppCompatActivity {
    RequestQueue requestQueue;
    StringRequest stringRequest;
    ImageView fotoprofil;
    String EmailHolder, PasswordHolder;
    private static ProgressDialog mProgressDialog;
    Button btn, btn2;
    ArrayList<ModelData> dataModelArrayList;
/*-------------------------------------------------------------------------------------------*/
ArrayList<HashMap<String, String>> list_data;
    private Object id;
    private Object TextView = id, namaprofil, emailprofil, nama, alamat, nohp, email, username;
    ;

    @Override    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        String url = "http://192.168.100.37/vollay/user.php";
        namaprofil = (TextView) findViewById(R.id.profilename);
        emailprofil = (TextView) findViewById(R.id.emailprofil);
        nama = (TextView) findViewById(R.id.textnama);
        alamat = (TextView) findViewById(R.id.textAlamat);
        nohp = (TextView) findViewById(R.id.textNohp);
        email = (TextView) findViewById(R.id.textEmail);
        username = (TextView) findViewById(R.id.textUsername);
        btn = findViewById(R.id.buttonEdit);
        btn2 = findViewById(R.id.buttonLogin);
        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent edit = new Intent(getApplicationContext(), UpdateBiodata.class);
                startActivity(edit);
            }
        });
        btn2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent edit = new Intent(getApplicationContext(),LoginActivity.class);
                startActivity(edit);
            }
        });
        }

    private void retrieveJSON() {

        showSimpleProgressDialog(this, "Loading...","Fetching Json",false);

        StringRequest stringRequest = new StringRequest(Request.Method.GET, (String) TextView,
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

                                    ModelData playerModel = new ModelData();
                                    JSONObject dataobj = dataArray.getJSONObject(i);

                                    playerModel.setNamaprofil(dataobj.getString("namaprofil"));
                                    playerModel.setEmailprofil(dataobj.getString("emailprofil"));
                                    playerModel.setNama(dataobj.getString("nama"));
                                    playerModel.setAlamat(dataobj.getString("alamat"));
                                    playerModel.setNohp(dataobj.getString("nohp"));
                                    playerModel.setEmail(dataobj.getString("email"));
                                    playerModel.setUsername(dataobj.getString("username"));


                                    dataModelArrayList.add(playerModel);

                                }



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

    private void showSimpleProgressDialog(MainActivity mainActivity, String s, String fetching_json, boolean b) {
    }

    private void setupTextView(){
        removeSimpleProgressDialog();  //will remove progress dialo
        ListAdapter listAdapter = new ListAdapter(this, dataModelArrayList);

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






