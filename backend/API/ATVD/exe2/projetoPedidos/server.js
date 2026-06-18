console.log("=== SERVIDOR DE PEDIDOS ===")

const express = require("express");
const app = express();

const PORTA = 3003;

app.get("/", (req, res) => {
    res.status(200).json({
        mensagem: "Servidor de Pedidos funcionando!"
    });
});

app.listen(PORTA, () => {
    console.log(`Servidor de Pedidos rodando na porta ${PORTA}`);
});