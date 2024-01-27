package com.example.app_tcc;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.annotation.Nullable;

import com.squareup.picasso.Picasso;

import java.util.List;

public class ItemJogoAdapter extends ArrayAdapter<ItemJogo> {

    private Context context;
    private List<ItemJogo> itemList;

    public ItemJogoAdapter(@NonNull Context context, int resource, @NonNull List<ItemJogo> objects) {
        super(context, resource, objects);
        this.context = context;
        this.itemList = objects;
    }

    @NonNull
    @Override
    public View getView(int position, @Nullable View convertView, @NonNull ViewGroup parent) {
        LayoutInflater inflater = LayoutInflater.from(context);
        View itemView = inflater.inflate(R.layout.item_jogo, parent, false);

        ImageView imgFundo = itemView.findViewById(R.id.imgFundo);
        ImageView imgIcone = itemView.findViewById(R.id.imgIcone);
        TextView txtTitulo = itemView.findViewById(R.id.lblTitulo);

        ItemJogo currentItem = itemList.get(position);

        // Use Picasso para carregar as imagens a partir das URLs
        Picasso.get().load(currentItem.getImgFundoUrl()).into(imgFundo);
        Picasso.get().load(currentItem.getImgIconeUrl()).into(imgIcone);
        txtTitulo.setText(currentItem.getTitulo());

        return itemView;
    }
}

