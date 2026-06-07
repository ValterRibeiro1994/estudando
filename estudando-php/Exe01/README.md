# Exercício de Cálculo de Média em PHP

## Visão Geral
Este projeto é um exercício educacional em PHP que calcula a média das notas de um aluno e determina seu status acadêmico. A aplicação também suporta uma etapa de recuperação quando a média fica dentro da faixa intermediária.

## Objetivo
O objetivo do projeto é praticar:
- separação de responsabilidades entre lógica de negócio e apresentação;
- manipulação de formulários HTTP em PHP;
- validação de entrada de dados;
- uso de classes para compor templates HTML de forma organizada.

## Arquitetura
A estrutura do projeto adota uma arquitetura simples com a seguinte organização:

- `index.php`
  - Faz o redirecionamento inicial para o controlador principal.
- `controller/calcularMedia.php`
  - Contém a lógica de processamento do formulário.
  - Define os caminhos para cálculo da média e do fluxo de recuperação.
- `template/appTemplate.php`
  - Encapsula a seleção do template de página e a inicialização do layout.
- `template/componentes.php`
  - Fornece métodos utilitários para gerar elementos HTML básicos (head, body, form, inputs, avisos).
- `template/templateMedia.php`
  - Gera o formulário de entrada das três notas e exibe mensagens de erro ou resultado.
- `template/templateRecuperacao.php`
  - Gera o formulário de entrada da nota de recuperação e exibe mensagens de sucesso ou erro.

## Fluxo do Programa
1. O usuário acessa `index.php`.
2. `index.php` redireciona a requisição para `controller/calcularMedia.php`.
3. O controlador verifica o método HTTP:
   - `GET`: retorna o formulário inicial para entrada das três notas.
   - `POST`: processa os dados enviados.

### Processamento de `POST`
- Se o campo `media` estiver presente:
  1. Captura as três notas enviadas.
  2. Valida se os valores são numéricos.
  3. Verifica se cada nota está no intervalo de `0` a `10`.
  4. Calcula a média aritmética.
  5. Decide o status do aluno:
     - média <= 3: reprovado direto;
     - média >= 6: aprovado direto;
     - média entre 3 e 6: apresenta o formulário de recuperação.

- Se o campo `recuperacao` estiver presente:
  1. Captura a nota de recuperação.
  2. Valida a entrada como número no intervalo `0` a `10`.
  3. Considera aprovado se a nota for maior que `5`, caso contrário reprovado.

## Componentes e Templates
- `Componentes` é responsável por montar o HTML estrutural.
- `TemplateMedia` cria o formulário de cálculo da média e exibe mensagens.
- `TemplateRecuperacao` cria o formulário de recuperação e retorna o resultado final.
- `AppTemplate` escolhe qual template usar com base no estado atual da aplicação.

## Observações Técnicas
- A validação é feita no servidor antes de qualquer cálculo.
- O projeto demonstra um padrão de separação entre lógica de controle e geração de interface.
- O HTML é construído dinamicamente usando classes PHP, o que facilita a manutenção e o reuso.

## Uso
1. Coloque o projeto em um servidor PHP local ou em um ambiente que execute PHP.
2. Acesse `index.php` no navegador.
3. Preencha as notas e envie o formulário.
4. Caso a média fique em recuperação, preencha a nota de recuperação.

## Considerações Finais
Este exercício é principalmente educacional, mas busca refletir boas práticas de organização de código e clareza no fluxo de execução. Ele serve como base para desenvolver aplicações web PHP com separação clara entre controller, modelo de apresentação e componentes reutilizáveis.
