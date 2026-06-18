const prompt = require("prompt-sync")();

let notas = [];
let disciplinas = ["Matemática", "Português", "Ciências"];

console.log("==== Gerenciador de notas ====");

let qtdAlunos = Number(prompt("Quantos alunos deseja cadastrar? "));

for (let i = 0; i < qtdAlunos; i++) {
  console.log(`Aluno [${i + 1}]:`);

  notas[i] = []; 

  for (let j = 0; j < disciplinas.length; j++) {
    let nota_nova = Number(prompt(`Digite a nota de ${disciplinas[j]}: `));
    notas[i][j] = nota_nova;
  }
}

console.log("\n===== TABELA DE NOTAS =====");
console.log("Matemática | Português | Ciências");

for (let i = 0; i < qtdAlunos; i++) {
  console.log(
    `Aluno ${i + 1}: ${notas[i][0]} | ${notas[i][1]} | ${notas[i][2]}`,
  );
}

console.log("\n===== RESULTADO =====");

for (let i = 0; i < qtdAlunos; i++) {
  let soma = 0;

  for (let j = 0; j < disciplinas.length; j++) {
    soma += notas[i][j];
  }

  let media = soma / disciplinas.length;

  console.log(
    `Aluno ${i + 1} - Média: ${media.toFixed(2)} - ${
      media >= 7 ? "Aprovado" : "Reprovado"
    }`,
  );
}