# Projeto Exe01

Este projeto é um exemplo educacional de aplicativo Android em Java que calcula a média de notas de um aluno e determina se ele está aprovado, reprovado ou em recuperação.

## Conceitos educacionais abordados

- **Atividade Android (`AppCompatActivity`)**
  - Estrutura básica de uma tela em Android.
  - `onCreate()` como ponto de entrada para inicializar a interface e eventos.

- **Componentes de interface**
  - `EditText` para entrada de valores numéricos.
  - `Button` para acionar cálculos e ações.
  - `TextView` para exibir resultados.

- **Eventos e listeners**
  - `setOnClickListener()` para reagir ao clique do usuário.
  - Lógica de navegação de UI baseada em eventos.

- **Validação de entradas**
  - Verificar campos vazios antes de processar dados.
  - Validar o intervalo das notas (0 a 10).
  - Mostrar mensagens ao usuário com `Toast`.

- **Estruturas de controle**
  - Uso de `if`, `else if` e `else` para decisões de aprovação, reprovação e recuperação.
  - `for` para iterar sobre um array de notas.

- **Array e cálculo de média**
  - Armazenamento de notas em um `double[]`.
  - Somar valores e calcular a média.
  - Modularização da lógica em um método utilitário (`Utilidades.calcularMedia`).

- **Organização de código**
  - Separação de responsabilidades com a classe `Utilidades`.
  - Reuso de métodos para validação e notificação.

- **Controle de visibilidade de componentes**
  - Mostrar e ocultar elementos da interface conforme o fluxo de aplicação.
  - Exibir o campo de recuperação apenas quando necessário.

## Fluxo do aplicativo

1. O usuário insere três notas.
2. O app valida as entradas.
3. O app calcula a média.
4. Se a média for maior ou igual a 6, o aluno é aprovado.
5. Se a média for menor que 3, o aluno é reprovado.
6. Se a média estiver entre 3 e 5,9, o app solicita a nota de recuperação.
7. Com a nota de recuperação, o app decide aprovação ou reprovação final.

## Objetivo didático

O objetivo deste projeto é ensinar conceitos básicos de programação Java e desenvolvimento Android:

- manipulação de interface gráfica;
- tratamento de eventos;
- validação de dados;
- uso de estruturas condicionais e laços;
- organização de código em classes e métodos.
