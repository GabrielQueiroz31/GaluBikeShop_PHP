# 🌐 API - Estudos com Node.js

Projeto de estudos focado em consumo de APIs externas e criação de servidores HTTP com Node.js puro, sem frameworks.

---

## 📁 Estrutura do Projeto

```
API/
├── node_modules/
├── .gitignore
├── api_hello.js
├── consulta_cep.js
├── consulta_cep_async.js
├── pokemon_api.js
├── package-lock.json
└── package.json
```

---

## 📄 Arquivos

### `api_hello.js`
Servidor HTTP simples criado com o módulo nativo `http` do Node.js.

- Roda em `http://127.0.0.1:3000`
- **GET `/hello`** → retorna `{ "message": "Olá Mundo" }`
- Qualquer outra rota → retorna `404` com `{ "error": "Rota não encontrada" }`

**Como rodar:**
```bash
node api_hello.js
```

---

### `consulta_cep.js`
Consulta de CEP via [ViaCEP](https://viacep.com.br/) usando **Promises** (`.then()` / `.catch()`).

- Solicita o CEP ao usuário no terminal
- Faz requisição GET para a API ViaCEP
- Exibe: CEP, Logradouro, Bairro, Cidade e UF

**Como rodar:**
```bash
node consulta_cep.js
```

---

### `consulta_cep_async.js`
Consulta de CEP via [ViaCEP](https://viacep.com.br/) usando **async/await** com tratamento de erros via `try/catch`.

- Mesma funcionalidade do `consulta_cep.js`, porém com sintaxe mais moderna
- Verifica se a resposta HTTP foi bem-sucedida (`resposta.ok`)
- Trata erros de rede e CEPs inválidos

**Como rodar:**
```bash
node consulta_cep_async.js
```

---

### `pokemon_api.js`
Consulta de Pokémon via [PokéAPI](https://pokeapi.co/) usando **async/await**.

- Solicita o nome do Pokémon ao usuário
- Exibe: Nome, Altura, Peso e Tipo

**Como rodar:**
```bash
node pokemon_api.js
```

---

## 🚀 Como instalar e usar

**1. Clone o repositório:**
```bash
git clone <url-do-repositorio>
cd API
```

**2. Instale as dependências:**
```bash
npm install
```

**3. Execute o arquivo desejado:**
```bash
node nome_do_arquivo.js
```

---

## 📦 Dependências

| Pacote | Uso |
|---|---|
| [`prompt-sync`](https://www.npmjs.com/package/prompt-sync) | Leitura de input do usuário no terminal |

---

## 🔗 APIs utilizadas

| API | Documentação |
|---|---|
| ViaCEP | https://viacep.com.br |
| PokéAPI | https://pokeapi.co |

---

## 🧠 Conceitos praticados

- Requisições HTTP com `fetch`
- Promises com `.then()` e `.catch()`
- Funções assíncronas com `async/await`
- Tratamento de erros com `try/catch`
- Criação de servidor HTTP com módulo nativo `http`
- Roteamento básico sem frameworks
- Leitura de input no terminal com `prompt-sync`
