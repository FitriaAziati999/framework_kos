package com.kos.KostKita.config;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import com.kos.KostKita.Beranda;
import com.kos.KostKita.LoginActivity;
import com.kos.KostKita.MainActivity;

public class Auth {
    SharedPreferences sharedPreferences;
    public Context mCtx;

    public static final String SHARED_PREF_NAME = "kos4";
    private static final String sudahlogin = "n";
    public SharedPreferences.Editor editor;

    private static final String id_pemilik = "id_pemilik";
    private static final String nama_pemilik = "namapem";
    private static final String foto_pemilik = "fotopem";
    private static final String akses_data = "akses_data";
    private static final String status_user = "status";
    private static final String token = "token";
    public static final String LOGIN_STATUS = "LOGIN_STATUS";




    public Auth(Context context){
        this.mCtx = context;
        sharedPreferences = context.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        editor = sharedPreferences.edit();
    }

    public void setdatauser(String xstatus, String xpemilik, String xnama, String xfoto, String tokennya){

        editor.putBoolean(LOGIN_STATUS, true);
        editor.putString(id_pemilik, xpemilik);
        editor.putString(nama_pemilik, xnama);
        editor.putString(foto_pemilik, xfoto);
        editor.putString(status_user, xstatus);
        editor.putString(sudahlogin, "y");
        editor.putString(token, tokennya);
        editor.apply();
    }




    public boolean isLogin(){
        return sharedPreferences.getBoolean(LOGIN_STATUS, false);
    }

    public void logout(){
        editor.clear();
        editor.commit();

        Intent login = new Intent(mCtx, LoginActivity.class);
        mCtx.startActivity(login);
        ((Beranda)mCtx).finish();
    }

    public String getKodeUser() {
        return sharedPreferences.getString(id_pemilik, null);
    }
    public String getNama() {
        return sharedPreferences.getString(nama_pemilik, null);
    }
    public String getAksesData() {
        return sharedPreferences.getString(akses_data, null);
    }
    public String getFoto_pemilik() {
        return sharedPreferences.getString(foto_pemilik, null);
    }

}
