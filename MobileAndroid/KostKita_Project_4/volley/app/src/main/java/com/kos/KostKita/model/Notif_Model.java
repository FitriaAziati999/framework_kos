package com.kos.KostKita.model;

public class Notif_Model {

    private int id_pemilik;
    private String nama_penyewa;
    private String alamat_penyewa;
    private String nama_kos;
    private int harga_sewa;


    public int getId_pemilik() { return id_pemilik; }

    public void setId_pemilik(int id_pemilik) {
        this.id_pemilik = id_pemilik;
    }

    public String getNama_penyewa() {
        return nama_penyewa;
    }

    public void setNama_penyewa(String nama_penyewa) {
        this.nama_penyewa = nama_penyewa;
    }

    public String getAlamat_penyewa() {
        return alamat_penyewa;
    }

    public void setAlamat_penyewa(String alamat_penyewa) {
        this.alamat_penyewa = alamat_penyewa;
    }

    public String getNama_kos() {
        return nama_kos;
    }

    public void setNama_kos(String nama_kos) {
        this.nama_kos = nama_kos;
    }

    public int getHarga_sewa() {
        return harga_sewa;
    }

    public void setHarga_sewa(int harga_sewa) {
        this.harga_sewa = harga_sewa;
    }
}

