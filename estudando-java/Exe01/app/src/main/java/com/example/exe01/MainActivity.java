package com.example.exe01;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

import java.util.ArrayList;

public class MainActivity extends AppCompatActivity {
    Button btnCalcular, btnRecuperacao;
    EditText n1, n2, n3, recuperacao;
    TextView outputResultado;
    double[] notas_doubles = new double[3];
    double media, recupera;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_main);

        // inicia componentes de entrada
        n1 = findViewById(R.id.inputPrimeiraNota);
        n2 = findViewById(R.id.inputSegundaNota);
        n3 = findViewById(R.id.inputTerceiraNota);
        recuperacao = findViewById(R.id.inputNotaRecuperacao);

        // inicia componentes de saida
        outputResultado = findViewById(R.id.outputResultado);

        // inicia botões de evento
        btnCalcular = findViewById(R.id.btnCalcularMedia);
        btnRecuperacao = findViewById(R.id.btnRecuperacao);

        // oculta componentes desnecessarios
        ocultarComponentes();

        // inicia evento Calcular média
        btnCalcular.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // processo 1 - Validar entradas recebidas
                if (!validarEntradas()){
                    return;
                }

                // processo 2 - Calcula a média do aluno
                media = Utilidades.calcularMedia(notas_doubles);

                // processo 3 - avalia o resultado do aluno
                if (media >= 6){
                    exibirResultado(String.format("Aluno AProvado: media %.2f", media));
                } else if (media < 3){
                    exibirResultado("Aluno Reprovado !!!");
                } else {
                // se a nota está entre 3 e 5.9 o aluno entra em recuperação
                exibirResultado("Aluno em Recuperação");
                eventoRecuperacao();
                }
                return;
            }
        });


        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });
    }

    private void ocultarComponentes(){
        outputResultado.setVisibility(View.INVISIBLE);
        btnRecuperacao.setVisibility(View.INVISIBLE);
        recuperacao.setVisibility(View.INVISIBLE);
    }
    private void eventoRecuperacao(){
        // torna o campo de entrada visivel e o botão
        btnRecuperacao.setVisibility(View.VISIBLE);
        recuperacao.setVisibility(View.VISIBLE);

        // adiciona o evento no botão recuperação
        btnRecuperacao.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // valida o campo na nota de recuperação
                if (recuperacao.getText().toString().isEmpty()){
                    Utilidades.notificarResultado(MainActivity.this, "Preencha a nota de recuperação");
                    return;
                }

                recupera = Double.parseDouble(recuperacao.getText().toString());
                if (recupera > 5){
                    exibirResultado("Aluno aprovado !!!!");
                    return;
                }
                exibirResultado("Aluno reprovado !!!!");
                return;
            }
        });
    }
    private boolean validarEntradas(){
        String[] notas = {n1.getText().toString(), n2.getText().toString(), n3.getText().toString()};
        for (int x = 0; x < 3; x++){
            if (Utilidades.campoVazio(notas[x])){
                Utilidades.notificarResultado(MainActivity.this, "Preencha todos os campos !!!");
                return false;
            }

            double nota = Double.parseDouble(notas[x]);
            if (!Utilidades.verificarIntervalo(nota)){
                Utilidades.notificarResultado(MainActivity.this, "As notas devem estar no intervalo de 0 a 10");
                return false;
            }

            notas_doubles[x] = nota;

        }
        return true;
    }

    private void exibirResultado(String resultado){
        outputResultado.setVisibility(View.VISIBLE);
        outputResultado.setText(resultado);
    }

}