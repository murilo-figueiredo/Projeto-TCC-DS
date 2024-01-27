package com.example.app_tcc;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.ListView;
import android.widget.Toast;

import com.google.gson.JsonArray;
import com.google.gson.JsonObject;
import com.koushikdutta.async.future.FutureCallback;
import com.koushikdutta.ion.Ion;

import java.util.ArrayList;
import java.util.List;

public class TelaJogos extends AppCompatActivity {

    String bdUrl = "https://tripixel.000webhostapp.com/";
    String ret = "";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tela_jogos);

        List<ItemJogo> itemList = new ArrayList<>();

        ListView listView = (ListView) findViewById(R.id.lvLista);


        // Inicia uma chamada de rede usando a biblioteca Ion, passando a referência da atividade atual (TelaJogos.this)
        Ion.with(TelaJogos.this)
                // Define a URL da requisição concatenando a base da URL com o caminho específico para listar jogos
                .load(bdUrl + "app/rotinas/listarjogos.php")
                // Especifica que o formato de resposta esperado é um array JSON
                .asJsonArray()
                // Configura um retorno de chamada para lidar com a resposta da requisição assincronamente
                .setCallback(new FutureCallback<JsonArray>() {
                    @Override
                    // Este método é chamado quando a requisição é concluída, seja com sucesso ou erro
                    public void onCompleted(Exception e, JsonArray result) {
                        // Verifica se houve algum erro na requisição
                        if (e == null) {
                            // Processa os dados JSON aqui
                            for (int i = 0; i < result.size(); i++) {
                                // Obtém cada objeto JSON da resposta
                                JsonObject jogo = result.get(i).getAsJsonObject();
                                // Extrai o valor da chave "nome" do objeto JSON
                                String nome = jogo.get("nome").getAsString();

                                // Adiciona um novo item à lista de jogos com base nos dados obtidos
                                itemList.add(new ItemJogo(
                                        bdUrl+"images/"+nome.replaceAll("\\s", "").toLowerCase()+"back.png",
                                        "https://cdn-icons-png.flaticon.com/512/44/44627.jpg",
                                        bdUrl+"images/"+nome.replaceAll("\\s", "").toLowerCase()+"icon.png", nome));
                            }
                            // Cria um adaptador personalizado para os itens do jogo e define no ListView
                            ItemJogoAdapter adapter = new ItemJogoAdapter(TelaJogos.this, R.layout.item_jogo, itemList);
                            listView.setAdapter(adapter);
                        } else {
                            // Trata o erro, se houver, exibindo uma mensagem de Toast
                            Toast.makeText(getApplicationContext(), "Erro ao obter dados do servidor", Toast.LENGTH_LONG).show();
                        }
                    }
                });

    }
}