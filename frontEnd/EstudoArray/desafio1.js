const prompt = require("prompt-sync")();

let notas = Number(prompt("Digite a quantiadade de notas que deseja inserir: "));

let arrayNotas = [];

for (let i = 0; i < notas; i++) {
    let notas = prompt(`Digite a nota ${i+1}: `);
    arrayNotas.push(notas)
}
let soma = arrayNotas.reduce((acumulador, notaAtual) => acumulador + Number(notaAtual), 0);
let media = soma / arrayNotas.length;
console.log(`A média das notas é: ${media.toFixed(2)}`); 