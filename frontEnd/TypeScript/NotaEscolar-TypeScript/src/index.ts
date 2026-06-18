interface Estudante {
  nome: string;
  notas: number[];
}

function calcularMedia(estudante: Estudante): void {
  let soma = 0;

  for (let nota of estudante.notas) {
    soma += nota;
  }

  const media = soma / estudante.notas.length;

  if (media >= 7) {
    console.log(`${estudante.nome} ficou com média ${media.toFixed(2)} e foi Aprovado`);
  } else {
    console.log(`${estudante.nome} ficou com média ${media.toFixed(2)} e foi Reprovado`);
  }
}

const estudante1: Estudante = {
  nome: "Gomes",
  notas: [8, 7, 9, 10]
};

const estudante2: Estudante = {
  nome: "Bosso",
  notas: [5, 2, 4, 8]
};

calcularMedia(estudante1);
calcularMedia(estudante2);