//Desafio

//Criar um jogo de N° Aleatório
console.log("Jogo de Adivinhação");
var prompt = require("prompt-sync")();
var numeroSecreto = Math.floor(Math.random() * 100);
var tentativa;
var tentativas = 0;

while (tentativa != numeroSecreto) {
  tentativa = Number(prompt("Digite um número entre 0 e 100: "));
  tentativas++;
  if (tentativa < numeroSecreto) {
    console.log("O numero sorteado é maior!\n ");
  } else if (tentativa > numeroSecreto) {
    console.log("O numero sorteado é menor!\n ");
  } else {
    console.log("Você acertouuuu!!!!");
  }

  console.log("\n\nDeseja continuar?\n1. Sim\n2. Não");
  var op = prompt("Escolha: ");

  if (op == 1) {
    numeroSecreto = Math.round(Math.random() * 100);
    contadorTentativas = 0;
    acertou = false;
    continuar = true;
  } else {
    continuar = false;
    console.log("Saindo....");
  }
}
while (continuar);
