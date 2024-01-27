package com.example.app_tcc;

public class ItemJogo {
    private String imgFundoUrl;
    private String imgBarUrl;
    private String imgIconeUrl;
    private String titulo;

    public ItemJogo(String imgFundoUrl, String imgBarUrl, String imgIconeUrl, String titulo) {
        this.imgFundoUrl = imgFundoUrl;
        this.imgBarUrl = imgBarUrl;
        this.imgIconeUrl = imgIconeUrl;
        this.titulo = titulo;
    }

    public String getImgFundoUrl() {
        return imgFundoUrl;
    }

    public String getImgBarUrl() {
        return imgBarUrl;
    }

    public String getImgIconeUrl() {
        return imgIconeUrl;
    }

    public String getTitulo() {
        return titulo;
    }
}

