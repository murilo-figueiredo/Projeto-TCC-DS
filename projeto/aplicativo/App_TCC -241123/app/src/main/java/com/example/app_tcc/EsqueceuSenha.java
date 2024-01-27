package com.example.app_tcc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import com.google.gson.JsonObject;
import com.koushikdutta.async.future.FutureCallback;
import com.koushikdutta.ion.Ion;

public class EsqueceuSenha extends AppCompatActivity {
    String bdUrl = "https://tripixel.000webhostapp.com/app/rotinas/";
    ImageButton btnEsqueceuSenha;
    EditText txtEmailEsquecido;
    Conexao cn = new Conexao(this);
    String ret = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_esqueceu_senha);

        btnEsqueceuSenha = (ImageButton) findViewById(R.id.btnEnviar);
        txtEmailEsquecido = (EditText) findViewById(R.id.txtEmailRecuperar);

        btnEsqueceuSenha.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cn.isOnline()) {
                    EnviarEmail();
                } else {
                    Toast.makeText(getApplicationContext(), "Verifique sua conexão com a internet", Toast.LENGTH_LONG).show();
                }
            }
        });
    }

    void EnviarEmail()
    {
        Ion.with (EsqueceuSenha.this)

                .load ( bdUrl+"recuperar.php" )
                .setBodyParameter ( "email" ,txtEmailEsquecido.getText().toString ())
                .asJsonObject ()
                .setCallback ( new  FutureCallback<JsonObject>() {
                    @Override
                    public void onCompleted(Exception e, JsonObject result) {
                        ret=result.get("status").getAsString ();
                        if(ret.equals ( "ok" ))
                        {
                            Toast.makeText(getApplicationContext(),  "Email enviado com sucesso!",   Toast.LENGTH_LONG).show();
                        }
                        else
                        {
                            Toast.makeText(getApplicationContext(),  ret,   Toast.LENGTH_LONG).show();
                        }
                    }
                });
    }
}