package com.example.exe01;

import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class Utilidades {
    public static boolean campoVazio(String campo){
        return campo.isEmpty();
    }

    public static void notificarResultado(AppCompatActivity tela, String mensagem){
        Toast.makeText(tela, mensagem, Toast.LENGTH_LONG).show();
    }

    public static boolean verificarIntervalo(double nota){
        return nota >= 0 && nota <= 10;
    }

    public static double calcularMedia(double[] notas){
        int n = notas.length;
        double somar = 0;
        for (int x = 0; x < n; x++){
            somar += notas[x];
        }
        return somar / n;
    }
}
