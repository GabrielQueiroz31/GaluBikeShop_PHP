# Análise de Salário

Projeto simples em PHP que analisa um salário informado pelo usuário e calcula quantos salários mínimos ele representa, além do valor restante.

## Descrição

O sistema recebe um salário digitado pelo usuário através de um formulário HTML e realiza os seguintes cálculos:

- Quantidade de salários mínimos
- Valor restante após a divisão
- Exibição formatada em moeda brasileira (R$)

## Tecnologias Utilizadas

- **HTML5** — estrutura da página
- **CSS3** — estilização da interface
- **PHP** — processamento dos cálculos

## Estrutura do Projeto

```bash
Projeto/
│
├── index.php      # Página principal com formulário e lógica PHP
└── style.css      # Estilos da página
```

## Funcionalidades

- Campo para digitar salário
- Cálculo automático de salários mínimos
- Exibição do valor restante
- Formatação monetária brasileira
- Interface simples e organizada

## Como Funciona

1. O usuário digita um salário
2. O formulário envia os dados usando método POST
3. O PHP recebe o valor informado
4. O sistema calcula:
   - Quantos salários mínimos cabem no valor
   - Quanto sobra da divisão
5. O resultado é exibido na tela

## Fórmulas Utilizadas

### Quantidade de salários mínimos

```php
$quantidadeSalarios = floor($salario / $salarioMinimo);
```

### Valor restante

```php
$resto = $salario - ($quantidadeSalarios * $salarioMinimo);
```

## Exemplo de Uso

Salário informado:

```text
R$ 5.000,00
```

Resultado:

```text
3 salários mínimos
Sobra: R$ 137,00
```

## Autor

Gabriel Gomes de Queiroz