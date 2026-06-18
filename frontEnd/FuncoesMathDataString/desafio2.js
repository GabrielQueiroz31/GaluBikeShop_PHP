const texto = " João, mariA, NicolaS, SocoRRo, zuLeiCa";

//remover os espaços vazios (trim)
const textotrim = texto.trim();

//split - separa em array

const nomesSujos = textotrim.split(", ");

console.log(nomesSujos);

//vetor de 5 nomes
let nomesLimpo = [];

for (let i = 0; i < nomesSujos.length; i++) {
  nomesLimpo[i] =
    nomesSujos[i].charAt(0).toUpperCase() + nomesSujos[i].slice(1).toLowerCase();
}

console.log(nomesLimpo);
