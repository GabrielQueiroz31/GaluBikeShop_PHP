# Desafio Profissional Inicial - Banco de Dados

Este projeto foi desenvolvido para o Mini Desafio de Autonomia Assistida, com o objetivo de criar a estrutura de banco de dados de um sistema de empresa.

## Objetivo

Criar uma estrutura básica de banco de dados utilizando PostgreSQL, contendo:

- Criação de uma tabela
- Inserção de pelo menos 2 registros
- Consulta dos dados com SELECT
- Atualização de dados com UPDATE
- Criação de um dump do banco de dados
- Explicação dos comandos utilizados

## Banco de Dados

O banco de dados criado se chama:

```sql
empresa
```

## Tabela Criada

Foi criada a tabela `funcionarios`, responsável por armazenar os dados dos funcionários da empresa.

### Estrutura da tabela

```sql
CREATE TABLE funcionarios (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    salario DECIMAL(10,2) NOT NULL,
    ativo BOOLEAN DEFAULT TRUE
);
```

## Campos da Tabela

| Campo | Tipo | Descrição |
|---|---|---|
| id | SERIAL PRIMARY KEY | Identificador único de cada funcionário |
| nome | VARCHAR(100) | Nome do funcionário |
| cargo | VARCHAR(100) | Cargo ocupado pelo funcionário |
| salario | DECIMAL(10,2) | Salário do funcionário |
| ativo | BOOLEAN | Indica se o funcionário está ativo no sistema |

## Registros Inseridos

Foram inseridos dois funcionários na tabela:

```sql
INSERT INTO funcionarios (nome, cargo, salario, ativo)
VALUES 
('Gabriel Gomes', 'Desenvolvedor Junior', 2500.00, TRUE),
('Ana Souza', 'Analista de Sistemas', 3200.00, TRUE);
```

## Consulta dos Dados

Para visualizar os dados cadastrados, foi utilizado o comando:

```sql
SELECT * FROM funcionarios;
```

Esse comando mostra todos os registros armazenados na tabela `funcionarios`.

## Atualização Realizada

Foi realizada uma atualização no salário do funcionário Gabriel Gomes:

```sql
UPDATE funcionarios
SET salario = 2800.00
WHERE id = 1;
```

Esse comando altera o salário do funcionário com `id = 1` para `2800.00`.

## Dump do Banco de Dados

O arquivo `empresa_dump.sql` contém a exportação do banco de dados, incluindo a estrutura da tabela e os dados cadastrados.

O dump foi gerado com o comando:

```bash
pg_dump -U postgres -d empresa > empresa_dump.sql
```

## Arquivos do Projeto

```txt
S11_R1_Situação_Aprendizagem/
│
├── comandos.sql
├── empresa_dump.sql
└── README.md
```

### comandos.sql

Arquivo com os comandos SQL utilizados no desafio.

### empresa_dump.sql

Arquivo de dump/exportação do banco de dados.

## Explicação dos Comandos

### CREATE DATABASE

Cria um novo banco de dados.

```sql
CREATE DATABASE empresa;
```

### CREATE TABLE

Cria uma nova tabela dentro do banco de dados.

```sql
CREATE TABLE funcionarios (...);
```

### INSERT

Insere novos registros na tabela.

```sql
INSERT INTO funcionarios (...);
```

### SELECT

Consulta e exibe os dados cadastrados.

```sql
SELECT * FROM funcionarios;
```

### UPDATE

Atualiza informações de um registro existente.

```sql
UPDATE funcionarios
SET salario = 2800.00
WHERE id = 1;
```

### pg_dump

Gera uma cópia/exportação do banco de dados em um arquivo `.sql`.

```bash
pg_dump -U postgres -d empresa > empresa_dump.sql
```

## Autor

Gabriel Gomes de Queiroz
