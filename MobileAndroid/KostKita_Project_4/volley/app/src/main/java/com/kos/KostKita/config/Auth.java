package com.kos.KostKita.config;

import android.content.Context;
import android.content.SharedPreferences;

public class Auth {
    private static Auth mInstance;
    public static Context mCtx;
    public static final String SHARED_PREF_NAME = "kos4";
    private static final String sudahlogin = "n";

    private static final String id_pemilik = "id_pemilik";
    private static final String id_kos = "id_kos";
    private static final String ukuran = "ukuran";
    private static final String stok = "stok";
    private static final String harga = "harga";
    private static final String kapasitas = "penghuni";
    private static final String fasilitaskamar = "fasilitaskamar";




    private Auth(Context context){
        mCtx = context;
    }
    public static synchronized Auth getInstance(Context context){
        if (mInstance == null){
            mInstance = new Auth(context);
        }
        return mInstance;
    }

    public boolean setdatauser(String xpemilik, String xkos, String xukuran, String xstok,String xharga,String xkapasitas,String xfasilitaskamar){
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();

        editor.putString(id_pemilik, xpemilik);
        editor.putString(id_kos, xkos);
        editor.putString(ukuran,xukuran);
        editor.putString(stok,xstok);
        editor.putString(harga,xharga);
        editor.putString(kapasitas,xkapasitas);
        editor.putString(fasilitaskamar,xfasilitaskamar);
        editor.apply();

        return true;
    }




    public boolean ceklogin(){
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        if(sharedPreferences.getString(id_pemilik, null)!=null){
            return true;
        }
        return false;
    }

    public boolean logout(){
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.clear();
        editor.apply();
        return true;
    }

    public String getKodeUser() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(id_pemilik, null);
    }
    public String getUkuran() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(ukuran, null);
    }
    public String getStok() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(stok, null);
    }
    public String getHarga() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(harga, null);
    }
    public String getKapasitas() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(kapasitas, null);
    }
    public String getFasilitaskamar() {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME, Context.MODE_PRIVATE);
        return sharedPreferences.getString(fasilitaskamar, null);
    }

}
