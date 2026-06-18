# Reajustador de Preços

> Aplicação PHP simples que calcula o novo valor de um produto após aplicar um reajuste percentual.

---

## Funcionalidades

- **Preço do produto** — usuário informa o valor do produto
- **Reajuste percentual** — ajuste usando uma barra deslizante (`range`)
- **Atualização em tempo real** — mostra a porcentagem enquanto a barra é movida
- **Resultado formatado** — exibe os valores em Real Brasileiro (`R$`)

---

## Estrutura

```bash
reajustador/
├── index.php     # Lógica PHP + estrutura HTML
├── style.css     # Estilos da aplicação
└── README.md     # Este arquivo
```

---

## Como funciona

### Captura do valor do produto

```php
$preco = floatval($_POST['preco']);
```

Recebe o valor digitado pelo usuário e converte para número decimal.

### Captura da porcentagem

```php
$percentual = $_POST['percentual'] ?? 15;
```

Recebe a porcentagem selecionada na barra de reajuste.  
Caso nenhum valor seja enviado, utiliza `15%` como padrão.

### Cálculo do reajuste

```php
$novoPreco = $preco + ($preco * $percentual / 100);
```

1. Calcula o percentual do reajuste
2. Soma ao valor original do produto
3. Gera o novo preço final

### Atualização da porcentagem em tempo real

```html
oninput="valorPercentual.innerText = this.value + '%'"
```

Atualiza a porcentagem exibida na tela enquanto o usuário move a barra.

---

## Personalização

### Alterar porcentagem inicial

```php
$percentual = $_POST['percentual'] ?? 15;
```

Troque o `15` pelo valor desejado.

### Alterar limite máximo da barra

```html
<input type="range" min="0" max="100">
```

Altere o valor de `max`.

---

## Autor

Gabriel Gomes de Queiroz