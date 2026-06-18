# Contador de Funcionários

Script PHP simples que exibe uma lista de funcionários numerados de 1 a 10.

## Descrição

O script utiliza um loop `while` para iterar de 1 até 10, exibindo o número de cada funcionário na tela.

## Requisitos

- PHP 7.0 ou superior

## Como usar

1. Certifique-se de ter o PHP instalado na sua máquina
2. Execute o script no terminal:

```bash
php contador.php
```

Ou coloque o arquivo em um servidor web (como Apache ou Nginx) e acesse pelo navegador.

## Saída esperada

```
Funcionario: 1
Funcionario: 2
Funcionario: 3
...
Funcionario: 10
```

## Estrutura do código

| Elemento | Descrição |
|---|---|
| `$funcionario` | Variável contadora, inicializada em 1 |
| `while` | Loop que executa enquanto o contador for ≤ 10 |
| `echo` | Exibe o número do funcionário na tela |
| `$funcionario++` | Incrementa o contador a cada iteração |