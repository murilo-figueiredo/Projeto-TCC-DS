package com.example.app_tcc;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import com.google.gson.JsonObject;
import com.koushikdutta.async.future.FutureCallback;
import com.koushikdutta.ion.Ion;

public class EntrarActivity extends AppCompatActivity {

    String bdUrl = "https://tripixel.000webhostapp.com/app/rotinas/";
    String ret = "";
    Conexao cn = new Conexao(this);
    String foto = "";

    Button btnEsqueciSenha;
    ImageButton btnLogin;
    EditText txtUsuarioEntrar,txtSenhaEntrar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_entrar);
        btnEsqueciSenha = (Button) findViewById(R.id.btnEsqueciSenha);
        btnLogin = (ImageButton) findViewById(R.id.btnLogar);
        txtUsuarioEntrar = (EditText) findViewById(R.id.txtUsuarioEntrar);
        txtSenhaEntrar = (EditText) findViewById(R.id.txtSenhaEntrar);

        Intent intent = getIntent();
        if (intent != null) {
            String usuario = intent.getStringExtra("Usuario");
            String senha = intent.getStringExtra("Senha");

            if (usuario != null && senha != null) {
                Entrar(usuario, senha);
            }
        }

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                if(cn.isOnline())
                {
                    Entrar(txtUsuarioEntrar.getText().toString(), txtSenhaEntrar.getText().toString());
                }
                else {
                    Toast.makeText(getApplicationContext(),  "Verifique sua conexão com a internet",   Toast.LENGTH_LONG).show();
                }
            }
        });

        btnEsqueciSenha.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                EsqueciSenha();
            }
        });
    }

    private void EsqueciSenha()
    {
        Intent it = new Intent(EntrarActivity.this, EsqueceuSenha.class);
        startActivity(it);
    }

    public void Entrar(String u, String s)
    {
        Ion.with (EntrarActivity.this)

                .load ( bdUrl+"entrar.php" )
                .setBodyParameter ( "usuario" ,u)
                .setBodyParameter ( "senha",s)
                .asJsonObject ()
                .setCallback ( new  FutureCallback<JsonObject>() {
                    @Override
                    public void onCompleted(Exception e, JsonObject result) {
                        ret=result.get("status").getAsString ();
                        if(ret.equals ( "ok" ))
                        {
                            foto = result.get("foto").getAsString().toString();

                            // Obtendo uma referência para SharedPreferences
                            SharedPreferences preferences = getSharedPreferences("prefLogin", Context.MODE_PRIVATE);

                            // Obtendo um Editor para modificar as preferências
                            SharedPreferences.Editor editor = preferences.edit();

                            // Adicionando dados usando o método putX, onde X pode ser String, Int, Boolean, etc.
                            editor.putString("Usuario", u); // Aqui, "chave" é o nome pelo qual você irá recuperar o valor, e "valor" é o dado que você está salvando.
                            editor.putString("Email", result.get("email").getAsString().toString());
                            editor.putString("Senha", s);
                            editor.putString("Foto", foto);

                            // Aplicando as alterações
                            editor.apply();


                            Toast.makeText(getApplicationContext(),  " Login efetuado com sucesso",   Toast.LENGTH_SHORT).show();
                            Intent it = new Intent(EntrarActivity.this, HomeActivity.class);

                            it.putExtra("foto", foto);

                            startActivity(it);
                        }
                        else
                        {
                            Toast.makeText(getApplicationContext(),  ret,   Toast.LENGTH_LONG).show();
                            boolean enviandoEmail = false;
                        }
                    }
                });
    }

}