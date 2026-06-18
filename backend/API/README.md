# 📞 API de Contatos

API RESTful desenvolvida em Node.js com Express para gerenciamento de contatos organizados por grupos.

> 🎓 Projeto de cunho educacional, com foco em aprendizado de backend e manipulação de arquivos JSON.

---

## 📚 Sobre o Projeto

Esta API permite gerenciar contatos dentro de grupos (como alunos e professores), realizando operações de:

- 📄 Listagem de contatos por grupo
- ➕ Adição de novos contatos
- ✏️ Atualização de contatos existentes
- ❌ Remoção de contatos

Os dados são armazenados localmente em um arquivo JSON (`contatos.json`).

---

## 🛠️ Tecnologias Utilizadas

- Node.js
- Express
- JavaScript
- File System (fs)

---

## ⚙️ Como Executar o Projeto

### 1. Clone o repositório

### 2. cd api-contatos

### 3. npm install express

### 4. node index.js

## Base URL - http://localhost:3000

## Estrutura de dados
```json
{
  "alunos": [
    {
      "nome": "João Santos",
      "telefone": "11999999999"
    }
  ],
  "professores": [
    {
      "nome": "Ana Oliveira",
      "telefone": "11923456789"
    }
  ]
}