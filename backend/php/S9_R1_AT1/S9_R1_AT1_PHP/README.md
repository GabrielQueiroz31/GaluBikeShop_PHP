# Formulário de Contato com PHP (S9_R1_AT1)

Projeto simples utilizando HTML5, CSS e PHP para envio e exibição de dados de um formulário de contato.

## Descrição

Este projeto possui duas páginas:

- `index.php` → formulário de contato
- `informacao.php` → página responsável por receber e exibir os dados enviados

O usuário preenche os campos do formulário e, ao clicar em **Enviar**, os dados são enviados via método `POST` para a página `informacao.php`.

---

## Tecnologias Utilizadas

- **HTML5** — estrutura da página
- **CSS3** — estilização da interface
- **PHP** — processamento dos dados enviados

---

## Estrutura do Projeto

```txt
S9_R1_AT1/
│
├── index.php          # Página do formulário
├── informacao.php     # Página que recebe e exibe os dados
└── README.md
```

---

## Funcionalidades

- Formulário de contato com:
  - Nome
  - E-mail
  - Mensagem

- Envio de dados utilizando método `POST`
- Exibição das informações enviadas
- Interface estilizada com CSS
- Botão para retornar ao formulário
- Uso do operador `??` para evitar erros caso os dados não existam

---

## Como Funciona

### 1. O usuário preenche o formulário

Na página `index.php`:

```html
<form method="POST" action="informacao.php">
```

O atributo `action` define que os dados serão enviados para `informacao.php`.

---

### 2. Os dados são enviados via POST

Os campos são enviados utilizando:

```html
<input type="text" name="nome">
<input type="email" name="email">
<input type="text" name="msg">
```

---

### 3. O PHP recebe os dados

Na página `informacao.php`:

```php
$nome = $_POST["nome"] ?? "";
$email = $_POST["email"] ?? "";
$msg = $_POST["msg"] ?? "";
```

O operador `??` evita erros caso a variável não exista.

---

### 4. Os dados são exibidos na tela

```php
echo "<div class='info'><span>Nome:</span> $nome</div>";
```

---

## Resultado

O sistema permite que o usuário:

1. Digite as informações
2. Envie o formulário
3. Visualize os dados enviados em outra página

---

## Autor

**Gabriel Gomes de Queiroz**