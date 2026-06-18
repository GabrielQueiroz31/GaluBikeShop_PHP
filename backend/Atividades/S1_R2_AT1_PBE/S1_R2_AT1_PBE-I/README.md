# Projeto Express.js

Projeto desenvolvido com **Node.js** e **Express.js** para prática de back-end, contendo servidor básico, rotas, middlewares, arquivos estáticos e CRUD de usuários.

---

## Tecnologias utilizadas

- Node.js
- Express.js
- JavaScript
- HTML

---

## Como executar o projeto

### 1. Instalar as dependências

```bash
npm install
```

### 2. Iniciar o servidor

```bash
node server.js
```

### 3. Acessar no navegador

```bash
http://localhost:3000
```

---

## Funcionalidades implementadas

### Exercício 1 - Servidor básico

- Rota `GET /hello`
- Retorna mensagem em JSON

### Exercício 2 - Lista de tarefas

- `GET /tarefas` → lista todas as tarefas
- `POST /tarefas` → adiciona nova tarefa
- `DELETE /tarefas/:id` → remove tarefa pelo ID

### Exercício 3 - Middleware de log

- Registra no console o método e a URL de cada requisição

### Exercício 4 - Tratamento de erros

- Middleware global para capturar erros
- Retorna respostas JSON com status adequados

### Exercício 5 - Arquivos estáticos

- Pasta `public` para arquivos estáticos
- Rota `/` retorna o arquivo `index.html`

### Exercício 6 e 7 - CRUD de usuários

- `GET /usuarios`
- `GET /usuarios/:id`
- `POST /usuarios`
- `PUT /usuarios/:id`
- `DELETE /usuarios/:id`

---

## Rotas disponíveis

### Rotas de teste

- `GET /hello`

### Rotas de tarefas

- `GET /tarefas`
- `POST /tarefas`
- `DELETE /tarefas/:id`

### Rotas de usuários

- `GET /usuarios`
- `GET /usuarios/:id`
- `POST /usuarios`
- `PUT /usuarios/:id`
- `DELETE /usuarios/:id`

---

## Observações

- Os dados são armazenados em memória.
- Ao reiniciar o servidor, os dados voltam ao estado inicial.
- Projeto desenvolvido para fins educacionais.

---

## Autor

Gabriel Gomes