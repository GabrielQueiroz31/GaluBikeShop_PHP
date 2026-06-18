# Funções de Análise Empresarial em PHP

Funções reutilizáveis em PHP para calcular o tempo de existência de uma empresa e classificar seu porte com base no número de funcionários.

---

## Descrição

Este script contém duas funções utilitárias independentes e reutilizáveis, demonstrando boas práticas de modularização em PHP. Cada função realiza uma tarefa específica e pode ser chamada com diferentes conjuntos de dados.

---

## Funções

### `tempoEmpresa($fundacao, $anoAtual)`

Calcula há quantos anos uma empresa existe.

| Parâmetro   | Tipo  | Descrição                        |
|-------------|-------|----------------------------------|
| `$fundacao` | `int` | Ano de fundação da empresa       |
| `$anoAtual` | `int` | Ano atual para o cálculo         |

**Retorno:** `string` — Mensagem com o tempo de existência em anos.

**Exemplo:**
```php
echo tempoEmpresa(2003, 2026);
// Saída: Tempo de empresa: 23 anos
```

---

### `porteEmpresa($funcionarios)`

Classifica o porte da empresa com base na quantidade de funcionários.

| Parâmetro       | Tipo  | Descrição                            |
|-----------------|-------|--------------------------------------|
| `$funcionarios` | `int` | Número de funcionários da empresa    |

**Critérios de classificação:**

| Funcionários     | Classificação              |
|------------------|----------------------------|
| Menos de 100     | Empresa de Pequeno Porte   |
| De 100 a 499     | Empresa de Médio Porte     |
| 500 ou mais      | Empresa de Grande Porte    |

**Retorno:** `string` — Classificação do porte da empresa.

**Exemplo:**
```php
echo porteEmpresa(400);
// Saída: Empresa de Médio Porte
```

---

## Exemplo de Uso

```php
echo tempoEmpresa(2003, 2026) . "<br>";
echo porteEmpresa(400) . "<br><br>";

echo tempoEmpresa(2015, 2026) . "<br>";
echo porteEmpresa(80) . "<br>";
```

**Saída esperada:**
```
Tempo de empresa: 23 anos
Empresa de Médio Porte

Tempo de empresa: 11 anos
Empresa de Pequeno Porte
```

---

## Como Executar

1. Certifique-se de ter o **PHP instalado** (versão 7.0 ou superior).
2. Salve o arquivo com a extensão `.php` (ex: `empresa.php`).
3. Execute via terminal:
   ```bash
   php empresa.php
   ```
   Ou acesse pelo navegador através de um servidor local (ex: XAMPP, WAMP, Laravel Herd).

---

## Estrutura do Projeto

```
/
└── empresa.php   # Script principal com as funções e exemplos de uso
```

---

## Conceitos Demonstrados

- **Funções reutilizáveis** — separação de responsabilidades em funções independentes
- **Estruturas condicionais** — uso de `if / elseif / else` para classificação
- **Interpolação de strings** — uso de variáveis dentro de strings com aspas duplas
- **Reuso de código** — mesmas funções chamadas com argumentos diferentes

## Autor

Gabriel Gomes de Queiroz