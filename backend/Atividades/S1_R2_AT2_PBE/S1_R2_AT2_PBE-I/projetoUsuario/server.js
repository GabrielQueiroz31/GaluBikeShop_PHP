console.log("=== SERVIDOR DE USUÁRIOS ===")

const express = require("express");
const app = express();

const PORTA = 3001;

app.get("/", (req, res) => {
    res.status(200).json({
        mensagem: "Servidor de Usuários funcionando!"
    });
});

app.listen(PORTA, () => {
    console.log(`Servidor de Usuários rodando na porta ${PORTA}`);
});