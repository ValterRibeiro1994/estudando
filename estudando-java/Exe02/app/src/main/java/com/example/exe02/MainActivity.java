package com.example.exe02;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import androidx.activity.EdgeToEdge;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.graphics.Insets;
import androidx.core.view.ViewCompat;
import androidx.core.view.WindowInsetsCompat;

public class MainActivity extends AppCompatActivity {

    EditText tempo1, tempo2, tempo3;
    TextView outputResposta;
    Button btnAvaliar;
    EditText[] campos = new EditText[3];

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        EdgeToEdge.enable(this);
        setContentView(R.layout.activity_main);

        // iniciando componentes
        tempo1 = findViewById(R.id.inputPrimeiroTempo);
        tempo2 = findViewById(R.id.inputSegundoTempo);
        tempo3 = findViewById(R.id.inputTerceiroTempo);
        outputResposta = findViewById(R.id.outputResposta);
        btnAvaliar = findViewById(R.id.btnAvaliar);

        btnAvaliar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                // adiciona os campos em um array
                campos[0] = tempo1;
                campos[1] = tempo2;
                campos[2] = tempo3;

                // somador para os tempos
                int somar = 0;

                // loop para validar e somar os campos de entrada
                for (int x = 0; x < 3; x++){
                    // captura a entrada fornecida
                    String entradaTempo = campos[x].getText().toString();

                    // verifica se a entrada não está vazia
                    if (entradaTempo.isEmpty()){
                        outputResposta.setText("Preencha todos os campos !!!");
                        return;
                    }

                    // converte o tempo para um int
                    int tempo = Integer.parseInt(entradaTempo);

                    // garanta que o tempo seja um valor positivo acima de zero
                    if (tempo <= 0){
                        outputResposta.setText("Os tempos devem ser maiores que ZERO !!!");
                        return;
                    }

                    // Soma o valor total
                    somar = somar + tempo;
                }

                // calcula a media (aqui a divisão já é inteira nativamente)
                int media = somar / 3;

                // avalia o atleta
                if (media > 20){
                    outputResposta.setText("Atleta Desclassificado. \nTempo Final: " + media);
                } else if (media > 15){
                    outputResposta.setText("Categoria Bronze. \nTempo Final: " + media);
                } else if (media > 10){
                    outputResposta.setText("Categoria Prata. \nTempo Final: " + media);
                } else {
                    outputResposta.setText("Categoria Ouro. \nTempo Final: " + media);
                }
                Toast.makeText(MainActivity.this, "Avaliação feita com sucesso !!", Toast.LENGTH_LONG).show();

            }
        });

        ViewCompat.setOnApplyWindowInsetsListener(findViewById(R.id.main), (v, insets) -> {
            Insets systemBars = insets.getInsets(WindowInsetsCompat.Type.systemBars());
            v.setPadding(systemBars.left, systemBars.top, systemBars.right, systemBars.bottom);
            return insets;
        });
    }
}