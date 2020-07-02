package com.kos.KostKita.config;

public class ServerApi {
    public static final String IPServer="http://192.168.100.88/KostKita_Project_4/cirest/";
    public static final String URL_REGIS=IPServer+"api/Register";
    public static final String URL_LOGIN=IPServer+"api/Pemilik/login";
    public static final String URL_DATAUSER=IPServer+"api/Pemilik?id_pemilik=";
    public static final String URL_EDITUSER=IPServer+"api/Pemilik";
    public static final String URL_DATAKOS=IPServer+"api/Datakos?id_pemilik=";
    public static final String URL_DETAILKOS=IPServer+"api/Datakos/detail?id_kos=";
    public static final String URL_TAMBAHKOS=IPServer+"api/Datakos";
}
