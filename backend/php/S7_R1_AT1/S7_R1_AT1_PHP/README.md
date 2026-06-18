# Lista de Produtos — S7_R1_AT1

Página web desenvolvida em **HTML + PHP** que exibe uma tabela de produtos com nome, preço e quantidade em estoque.

---

## Descrição

Este projeto renderiza dinamicamente uma tabela HTML a partir de um array de produtos definido em PHP. Os dados são iterados com `foreach` e inseridos na tabela diretamente no servidor antes de enviar a página ao navegador.

---

## Estrutura do Projeto

```
S7_R1_AT1/
└── index.php   # Arquivo principal com HTML, CSS e PHP
```

---

## Tecnologias Utilizadas

| Tecnologia | Finalidade                        |
|------------|-----------------------------------|
| HTML5      | Estrutura da página               |
| CSS3       | Estilização da tabela             |
| PHP        | Geração dinâmica das linhas da tabela |

---

## Como Executar

### Passos

1. Clone ou copie o arquivo para o diretório do seu servidor:
   ```bash
   git clone https://github.com/GabrielQueiroz31/S7_R1_AT1.git
   ```

2. Acesse a pasta do projeto e inicie o servidor embutido do PHP:
   ```bash
   php -S localhost:8000
   ```

3. Abra o navegador e acesse:
   ```
   http://localhost:8000/index.php
   ```

---

## Dados Exibidos

A tabela apresenta os seguintes produtos cadastrados diretamente no array PHP:

| Produto  | Preço  | Estoque |
|----------|--------|---------|
| Caneta   | R$ 2,00  | 200     |
| Caderno  | R$ 15,00 | 50      |
| Lápis    | R$ 1,00  | 300     |
| Borracha | R$ 2,00  | 500     |

---

## Funcionamento do Código

1. Um **array associativo** `$produtos` é criado em PHP, contendo os campos `produto`, `preco` e `estoque`.
2. Um laço `foreach` percorre cada item do array.
3. Para cada produto, uma linha `<tr>` com três colunas `<td>` é gerada dinamicamente via `echo`.
4. O CSS aplicado inclui hover nas linhas e formatação centralizada da tabela.

---

## Autor

Gabriel Gomes de Queiroz