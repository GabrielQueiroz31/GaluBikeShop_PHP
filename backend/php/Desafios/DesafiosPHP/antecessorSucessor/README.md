# Identificador de Antecessores e Sucessores

Aplicação PHP que recebe um número e retorna seu antecessor e sucessor — simples, direto, sem dependências.

---

## Funcionalidades

- Entrada de qualquer número inteiro pelo usuário
- Exibe o **antecessor** (número - 1) e o **sucessor** (número + 1)
- Resultado exibido em página separada com layout em card

---

## Estrutura

```
projeto/
├── index.php           # Formulário de entrada
├── processar.php       # Lógica PHP + exibição do resultado
├── css/
│   ├── style.css       # Estilo do formulário
│   └── processar.css   # Estilo da página de resultado
└── README.md           # Este arquivo
```

---

## 🔧 Como funciona

**1.** O usuário digita um número em `index.php` e envia o formulário via `POST`.

**2.** `processar.php` recebe o valor, calcula antecessor e sucessor e exibe o resultado:

```php
$numero     = $_POST['numero'];
$antecessor = $numero - 1;
$sucessor   = $numero + 1;
```

**3.** Os três valores são exibidos na tela dentro de um card estilizado.

---

## Autor

Gabriel Gomes de Queiroz