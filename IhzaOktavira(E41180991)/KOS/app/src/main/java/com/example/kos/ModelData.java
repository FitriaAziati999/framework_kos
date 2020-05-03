package com.example.kos;

public class ModelData {
    private String namaprofil, emailprofil, nama, alamat, nohp, email, username;

    public String getNamaprofil(){
        return namaprofil;
    }
    public void setNamaprofil(String namaprofil){
        this.namaprofil = namaprofil;
    }

    public String getEmailprofil() { return emailprofil; }
    public void setEmailprofil(String emailprofil) { this.emailprofil = emailprofil; }

    public String getNama() {
        return nama;
    }
    public void setNama(String nama) { this.nama = nama; }

    public String getAlamat() { return alamat; }
    public void setAlamat(String alamat) { this.alamat = alamat; }

    public String getNohp() { return nohp; }
    public void setNohp(String nohp) { this.nohp = nohp; }

    public String getEmail() { return email; }
    public void setEmail(String email) { this.email = email; }

    public String getUsername() { return username; }
    public void setUsername(String username) { this.username = username; }
}
