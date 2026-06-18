const express = require('express');
const path = require("path");

// Importa funções do arquivo db.js
const {
    buscarUsuarios,
    buscarUsuarioPorId,
    adicionarUsuario,
    atualizarUsuario,
    deletarUsuario
} = require("./db");

const app = express();
const PORTA = 3000;

// Lista de tarefas em memória
let tarefas = [];

// ID automático para tarefas
let proximoId = 1;

// Permite receber JSON no body
app.use(express.json());

// Middleware de log
app.use((req, res, next) => {
    console.log(`${req.method} ${req.url}`);
    next();
});

// Arquivos estáticos da pasta public
app.use(express.static(path.join(__dirname, "public")));

// Página inicial
app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "public", "index.html"));
});

// Rota de teste
app.get("/hello", (req, res) => {
    res.status(200).json({
        mensagem: "Olá Mundo!"
    });
});

// ROTAS DE TAREFAS

// Lista todas as tarefas
app.get("/tarefas", (req, res) => {
    res.status(200).json(tarefas);
});

// Adiciona nova tarefa
app.post("/tarefas", (req, res) => {
    const { nome } = req.body;

    // Valida nome
    if (!nome || nome.trim() === "") {
        return res.status(400).json({
            erro: "O nome da tarefa é obrigatório"
        });
    }

    // Cria nova tarefa
    const novaTarefa = {
        id: proximoId++,
        nome: nome
    };

    tarefas.push(novaTarefa);

    res.status(201).json({
        mensagem: "Tarefa adicionada com sucesso.",
        tarefa: novaTarefa
    });
});

// Remove tarefa pelo ID
app.delete("/tarefas/:id", (req, res, next) => {
    const id = parseInt(req.params.id);

    // Verifica ID válido
    if (isNaN(id)) {
        const erro = new Error("ID inválido");
        erro.status = 400;
        return next(erro);
    }

    // Procura tarefa
    const index = tarefas.findIndex((tarefa) => tarefa.id === id);

    // Verifica se existe
    if (index === -1) {
        const erro = new Error("Tarefa não encontrada");
        erro.status = 404;
        return next(erro);
    }

    // Remove tarefa
    const removido = tarefas.splice(index, 1);

    res.status(200).json({
        mensagem: "Tarefa excluída com sucesso!",
        tarefa: removido[0]
    });
});


// ROTAS DE USUÁRIOS

// Lista todos os usuários
app.get("/usuarios", (req, res) => {
    const usuarios = buscarUsuarios();
    res.status(200).json(usuarios);
});

// Busca usuário por ID
app.get("/usuarios/:id", (req, res, next) => {
    const id = parseInt(req.params.id);

    if (isNaN(id)) {
        const erro = new Error("ID inválido");
        erro.status = 400;
        return next(erro);
    }

    const usuario = buscarUsuarioPorId(id);

    if (!usuario) {
        const erro = new Error("Usuário não encontrado");
        erro.status = 404;
        return next(erro);
    }

    res.status(200).json(usuario);
});

// Adiciona novo usuário
app.post("/usuarios", (req, res) => {
    const { nome } = req.body;

    if (!nome || nome.trim() === "") {
        return res.status(400).json({
            erro: "O nome do usuário é obrigatório"
        });
    }

    const novoUsuario = adicionarUsuario(nome);

    res.status(201).json({
        mensagem: "Usuário adicionado com sucesso!",
        usuario: novoUsuario
    });
});

// Atualiza usuário
app.put("/usuarios/:id", (req, res, next) => {
    const id = parseInt(req.params.id);
    const { nome } = req.body;

    if (isNaN(id)) {
        const erro = new Error("ID inválido");
        erro.status = 400;
        return next(erro);
    }

    if (!nome || nome.trim() === "") {
        const erro = new Error("O nome do usuário é obrigatório");
        erro.status = 400;
        return next(erro);
    }

    const usuarioAtualizado = atualizarUsuario(id, nome);

    if (!usuarioAtualizado) {
        const erro = new Error("Usuário não encontrado");
        erro.status = 404;
        return next(erro);
    }

    res.status(200).json({
        mensagem: "Usuário atualizado com sucesso!",
        usuario: usuarioAtualizado
    });
});

// Remove usuário
app.delete("/usuarios/:id", (req, res, next) => {
    const id = parseInt(req.params.id);

    if (isNaN(id)) {
        const erro = new Error("ID inválido");
        erro.status = 400;
        return next(erro);
    }

    const usuarioRemovido = deletarUsuario(id);

    if (!usuarioRemovido) {
        const erro = new Error("Usuário não encontrado");
        erro.status = 404;
        return next(erro);
    }

    res.status(200).json({
        mensagem: "Usuário excluído com sucesso!",
        usuario: usuarioRemovido
    });
});


// Middleware de erros
app.use((erro, req, res, next) => {
    res.status(erro.status || 500).json({
        erro: erro.message || "Erro interno do servidor"
    });
});

// Inicia servidor
app.listen(PORTA, () => {
    console.log(`Servidor rodando em http://localhost:${PORTA}`);
});