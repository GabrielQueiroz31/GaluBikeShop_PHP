# Cadastro de Usuários com TypeScript

Projeto simples desenvolvido em TypeScript para praticar o uso de interface, objetos, funções e estrutura condicional.

## Descrição

Este projeto consiste em um sistema simples de cadastro de usuários.

O programa cria uma interface chamada `Usuario`, contendo as propriedades `id`, `nome`, `email` e `isAdmin`.

Também foi criada uma função chamada `renderizarPerfil`, que recebe um usuário e exibe no console o status dele, mostrando se ele é administrador ou usuário comum.

## Tecnologias Utilizadas

- TypeScript
- Node.js

## Estrutura do Projeto

CadastroUsuario-TS/
├── dist/
│   └── index.js
├── src/
│   └── index.ts
├── package.json
├── package-lock.json
├── tsconfig.json
└── .gitignore

## Funcionalidades

- Criação de uma interface `Usuario`
- Cadastro de usuários com id, nome, e-mail e tipo de acesso
- Verificação se o usuário é administrador ou comum
- Exibição do status do usuário no console

## Como Executar

Instale as dependências do projeto:

npm install

Execute o projeto:

npm run dev

## Saída Esperada

Status: Administrador: Gomes (gomes@email.com)
Status: Usuário Comum

## Como Funciona

A interface `Usuario` define quais informações um usuário precisa ter.

Cada usuário possui um `id`, um `nome`, um `email` e a propriedade `isAdmin`.

O campo `isAdmin` recebe um valor booleano:

- `true` significa que o usuário é administrador
- `false` significa que o usuário é comum

A função `renderizarPerfil` verifica esse valor.

Se `isAdmin` for `true`, o programa exibe o status de administrador junto com o nome e o e-mail do usuário.

Se `isAdmin` for `false`, o programa exibe apenas o status de usuário comum.

## Conceitos Praticados

- Interface em TypeScript
- Tipagem de dados
- Objetos
- Funções
- Condicional if/else
- Valores booleanos
- Execução de código TypeScript com Node.js

## Autor

Gabriel Gomes de Queiroz