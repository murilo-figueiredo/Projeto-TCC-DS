package com.example.app_tcc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;

import com.squareup.picasso.Picasso;

public class HomeActivity extends AppCompatActivity {

    ImageButton btnLoja, btnSuporte, btnSobreNos, btnPerfil;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        btnLoja = (ImageButton) findViewById(R.id.btnLoja);
        btnSuporte = (ImageButton) findViewById(R.id.btnSuporte);
        btnSobreNos = (ImageButton) findViewById(R.id.btnSobreNos);
        btnPerfil = (ImageButton) findViewById(R.id.btnPerfil);

        Intent it = getIntent();

        String foto = it.getStringExtra("foto");

        Picasso.get().load("https://tripixel.000webhostapp.com/site/upl/uploads/"+foto).into(btnPerfil);

        btnPerfil.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent it = new Intent(HomeActivity.this, PerfilActivity.class);
                startActivity(it);
            }
        });

        btnSuporte.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String urlSuporte = "https://www.google.com";
                Intent it = new Intent(Intent.ACTION_VIEW);
                it.setData(Uri.parse(urlSuporte));

                startActivity(it);
            }
        });

        btnSobreNos.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                String urlSuporte = "https://www.google.com";
                Intent it = new Intent(Intent.ACTION_VIEW);
                it.setData(Uri.parse(urlSuporte));

                startActivity(it);
            }
        });

        btnLoja.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent it = new Intent(HomeActivity.this, TelaJogos.class);
                startActivity(it);
            }
        });


    }
}