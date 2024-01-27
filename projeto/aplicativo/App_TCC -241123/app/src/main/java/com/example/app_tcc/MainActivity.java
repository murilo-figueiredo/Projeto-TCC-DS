package com.example.app_tcc;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.ImageButton;

public class MainActivity extends AppCompatActivity {

    ImageButton btnCadastrar, btnEntrar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        // Obtendo uma referência para SharedPreferences
        SharedPreferences preferences = getSharedPreferences("prefLogin", Context.MODE_PRIVATE);

        // Recuperando dados usando os métodos getX, onde X é o tipo de dado que você está recuperando
        String usuario = preferences.getString("Usuario", "");
        String senha = preferences.getString("Senha", "");

        // O segundo parâmetro de getString é o valor padrão que será retornado se a chave não existir

        if(!usuario.equals("") && !senha.equals(""))
        {
            Intent logar = new Intent(MainActivity.this, EntrarActivity.class);
            logar.putExtra("Usuario", usuario);
            logar.putExtra("Senha", senha);
            startActivity(logar);
        }

        btnCadastrar = (ImageButton) findViewById(R.id.btnCadastro);
        btnEntrar = (ImageButton) findViewById(R.id.btnLogin);

        btnCadastrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent cadastrar = new Intent(MainActivity.this, CadastrarActivity.class);
                startActivity(cadastrar);
            }
        });

        btnEntrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent entrar = new Intent(MainActivity.this, EntrarActivity.class);
                startActivity(entrar);
            }
        });
    }
}