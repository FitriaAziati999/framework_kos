package com.kos.KostKita.model;

import com.google.gson.annotations.Expose;
import com.google.gson.annotations.SerializedName;

public class ModelDataNotif {


    @SerializedName("id_pemilik")
    @Expose
    private String idPemilik;

    @SerializedName("nama_penyewa")
    @Expose
    private String NamaPenyewa;

    @SerializedName("alamat_penyewa")
    @Expose
    private String AlamatPenyewa;

    @SerializedName("nama_kos")
    @Expose
    private String NamaKos;

    @SerializedName("harga_sewa")
    @Expose
    private String HargaSewa;


    public ModelDataNotif(){};

    public ModelDataNotif(String idPemilik, String namaPenyewa, String alamatPenyewa, String namaKos, String hargaSewa) {
        this.idPemilik = idPemilik;
        NamaPenyewa = namaPenyewa;
        AlamatPenyewa = alamatPenyewa;
        NamaKos = namaKos;
        HargaSewa = hargaSewa;
    }

    public String getIdPemilik() {
        return idPemilik;
    }

    public void setIdPemilik(String idPemilik) {
        this.idPemilik = idPemilik;
    }

    public String getNamaPenyewa() {
        return NamaPenyewa;
    }

    public void setNamaPenyewa(String namaPenyewa) {
        NamaPenyewa = namaPenyewa;
    }

    public String getAlamatPenyewa() {
        return AlamatPenyewa;
    }

    public void setAlamatPenyewa(String alamatPenyewa) {
        AlamatPenyewa = alamatPenyewa;
    }

    public String getNamaKos() {
        return NamaKos;
    }

    public void setNamaKos(String namaKos) {
        NamaKos = namaKos;
    }

    public String getHargaSewa() {
        return HargaSewa;
    }

    public void setHargaSewa(String hargaSewa) {
        HargaSewa = hargaSewa;
    }
}


