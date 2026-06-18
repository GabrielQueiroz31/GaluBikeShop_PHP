console.log("=== SERVIDOR DE PRODUTOS ===")

const express = require("express");
const app = express();

const PORTA = 3002;

app.get("/", (req, res) => {
    res.status(200).json({
        mensagem: "Servidor de Produtos funcionando!"
    });
});

app.listen(PORTA, () => {
    console.log(`Servidor de Produtos rodando na porta ${PORTA}`);
});