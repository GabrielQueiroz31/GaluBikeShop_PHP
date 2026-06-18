const fs = require("fs");
const dados = fs.readFileSync("contatos.json", "utf-8");
console.log("Contatos: ");
const contatos = JSON.parse(dados || "[]");
contatos.forEach((contato, index) => {
    console.log(`${index + 1}. ${contato.nome} -  ${contato.telefone}`);
});
