package com.kos.KostKita.model;

import com.google.gson.annotations.SerializedName;

public class Profil {
	@SerializedName("Nama_Profil")
	private String Nama_Profil;
	@SerializedName("Email_Profil")
	private String Email_Profil;
	@SerializedName("Nama")
	private String Nama;
	@SerializedName("Alamat")
	private String Alamat;
	@SerializedName("No_Telepon")
	private String No_Telepon;
	@SerializedName("Username")
	private String Username;
	@SerializedName("Password")
	private String Password;

	public Profil(){}

	public Profil(String Nama_Profil, String Email_Profil, String Nama, String Alamat, String No_Telepon,
				  String Username, String Password, String Konfirmasi_Password) {
		this.Nama_Profil = Nama_Profil;
		this.Email_Profil = Email_Profil;
		this.Nama = Nama;
		this.Alamat = Alamat;
		this.No_Telepon = No_Telepon;
		this.Username = Username;
		this.Password = Password;
	}

	public String getNama_Profil() { return Nama_Profil; }
	public void setNama_Profil(String Nama_Profil) { this.Nama_Profil = Nama_Profil; }

	public String getEmail_Profil() { return Email_Profil; }
	public void setEmail_Profil(String Email_Profil) { this.Email_Profil = Email_Profil; }

	public String getNama() { return Nama; }
	public void setNama(String Nama) { this.Nama = Nama; }

	public String getAlamat() { return Alamat; }
	public void setAlamat(String Alamat) { this.Alamat = Alamat; }

	public String getNo_Telepon() { return No_Telepon; }
	public void setNo_Telepon(String No_Telepon) { this.No_Telepon = No_Telepon; }

	public String getUsername() { return Username; }
	public void setUsername(String Username) { this.Username = Username; }

	public String getPassword() { return Password; }
	public void setPassword(String Password) { this.Password = Password; }

}
