package com.example.app_tcc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;

public class PerfilActivity extends AppCompatActivity {

    ImageButton btnSair;
    ImageView imgPerfil;
    TextView txtUsuario, txtEmail;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_perfil);

        btnSair = (ImageButton) findViewById(R.id.btnSair);
        imgPerfil = (ImageView) findViewById(R.id.imgPerfil);
        txtUsuario = (TextView) findViewById(R.id.txtUsuario);
        txtEmail = (TextView) findViewById(R.id.txtEmail);

        // Obtendo uma referência para SharedPreferences
        SharedPreferences preferences = getSharedPreferences("prefLogin", Context.MODE_PRIVATE);

        // Recuperando dados usando os métodos getX, onde X é o tipo de dado que você está recuperando
        String usuario = preferences.getString("Usuario", "");
        String email = preferences.getString("Email", "");
        String foto = preferences.getString("Foto", "");


        txtUsuario.setText(usuario);
        txtEmail.setText(email);

        Picasso.get().load("https://tripixel.000webhostapp.com/site/upl/uploads/"+foto).into(imgPerfil);

        btnSair.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View view) {

                // Obtendo uma referência para SharedPreferences
                SharedPreferences preferences = getSharedPreferences("prefLogin", Context.MODE_PRIVATE);

                // Obtendo um Editor para modificar as preferências
                SharedPreferences.Editor editor = preferences.edit();

                // Adicionando dados usando o método putX, onde X pode ser String, Int, Boolean, etc.
                editor.putString("Usuario", ""); // Aqui, "chave" é o nome pelo qual você irá recuperar o valor, e "valor" é o dado que você está salvando.
                editor.putString("Email", "");
                editor.putString("Senha", "");
                editor.putString("Foto", "");

                // Aplicando as alterações
                editor.apply();

                Intent it = new Intent(PerfilActivity.this, MainActivity.class);
                startActivity(it);
            }
        });
    }
}