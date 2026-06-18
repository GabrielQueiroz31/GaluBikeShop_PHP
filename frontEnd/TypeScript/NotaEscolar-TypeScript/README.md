# Sistema de Notas Escolares com TypeScript

Projeto simples desenvolvido em TypeScript para praticar o uso de interface, arrays, funções, laços de repetição e estrutura condicional.

## Descrição

Este projeto consiste em um sistema simples de notas escolares.

O programa cria uma interface chamada `Estudante`, contendo as propriedades `nome` e `notas`.

Também foi criada uma função chamada `calcularMedia`, que recebe um estudante, calcula a média das suas notas e exibe no console o nome do aluno, a média formatada e se ele foi aprovado ou reprovado.

## Tecnologias Utilizadas

- TypeScript
- Node.js

## Estrutura do Projeto

SistemaNotas-TS/
├── dist/
│   └── index.js
├── src/
│   └── index.ts
├── package.json
├── package-lock.json
├── tsconfig.json
└── .gitignore

## Funcionalidades

- Criação de uma interface `Estudante`
- Cadastro de estudante com nome e notas
- Armazenamento das notas em um array de números
- Cálculo da média escolar
- Verificação se o estudante foi aprovado ou reprovado
- Exibição do resultado no console

## Como Executar

Instale as dependências do projeto:

npm install

Execute o projeto:

npm run dev

## Saída Esperada

Gomes ficou com média 8.50 e foi Aprovado

## Como Funciona

A interface `Estudante` define quais informações um estudante precisa ter.

O campo `nome` armazena o nome do aluno.

O campo `notas` armazena uma lista de notas usando um array de números.

A função `calcularMedia` percorre todas as notas do estudante, soma os valores e divide pela quantidade de notas.

Depois disso, o programa verifica a média:

- Média maior ou igual a 7 significa que o estudante foi aprovado
- Média menor que 7 significa que o estudante foi reprovado

A média é exibida com duas casas decimais usando `toFixed(2)`.

## Conceitos Praticados

- Interface em TypeScript
- Tipagem de dados
- Array de números
- Funções
- Laço de repetição `for...of`
- Condicional if/else
- Cálculo de média
- Execução de código TypeScript com Node.js

## Autor

Gabriel Gomes de Queiroz