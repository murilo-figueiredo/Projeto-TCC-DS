package com.example.app_tcc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import com.google.gson.JsonObject;
import com.koushikdutta.async.future.FutureCallback;
import com.koushikdutta.ion.Ion;

public class CadastrarActivity extends AppCompatActivity {

    String bdUrl = "https://tripixel.000webhostapp.com/app/rotinas/";
    String ret = "";
    Conexao cn = new Conexao(this);

    ImageButton btnCadastrar;
    EditText txtNomeCadastrar, txtEmailCadastrar, txtSenhaCadastrar, txtSenhaConfCadastrar;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cadastrar);
        btnCadastrar = (ImageButton) findViewById(R.id.btnCadastrar);
        txtNomeCadastrar = (EditText) findViewById(R.id.txtNomeCadastrar);
        txtEmailCadastrar = (EditText) findViewById(R.id.txtEmailCadastrar);
        txtSenhaCadastrar = (EditText) findViewById(R.id.txtSenhaCadastrar);
        txtSenhaConfCadastrar = (EditText) findViewById(R.id.txtSenhaConfCadastrar);

        btnCadastrar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (cn.isOnline())
                {
                    Cadastrar();
                }
                else
                {
                    Toast.makeText(getApplicationContext(),  "Verifique sua conexão com a internet",   Toast.LENGTH_LONG).show();
                }
            }
        });
    }

    private void Cadastrar() {
        Log.d("TAG", "Iniciando o método Cadastrar()");

        if (!TextUtils.isEmpty(txtNomeCadastrar.getText()) &&
                !TextUtils.isEmpty(txtEmailCadastrar.getText()) && !TextUtils.isEmpty(txtSenhaCadastrar.getText())) {
            Log.d("TAG", "Campos não estão vazios");

            Ion.with(CadastrarActivity.this)
                    .load(bdUrl + "cadastro.php")
                    .setBodyParameter("usuario", txtNomeCadastrar.getText().toString())
                    .setBodyParameter("email", txtEmailCadastrar.getText().toString())
                    .setBodyParameter("senha", txtSenhaCadastrar.getText().toString())
                    .asJsonObject()
                    .setCallback(new FutureCallback<JsonObject>() {
                        @Override
                        public void onCompleted(Exception e, JsonObject result) {
                            Log.d("TAG", "Callback do Ion concluído");

                            ret = result.get("status").getAsString();
                            if (ret.equals("ok")) {
                                Toast.makeText(getApplicationContext(), "Cadastrado com sucesso", Toast.LENGTH_LONG).show();
                                Intent entrar = new Intent(CadastrarActivity.this, EntrarActivity.class);
                                startActivity(entrar);
                            } else {
                                Toast.makeText(getApplicationContext(), "Erro", Toast.LENGTH_LONG).show();
                            }
                        }
                    });
        } else {
            Log.d("TAG", "Campos estão vazios");
            Toast.makeText(getApplicationContext(), "Verifique se todos os campos estão corretos", Toast.LENGTH_LONG).show();
        }
    }

}