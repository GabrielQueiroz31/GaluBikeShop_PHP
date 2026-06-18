//Correção da Situação de Aprendizagem 2 - Gerenciamento de Nota de Alunos

const prompt = require("prompt-sync")();

// 1° Passo - Cadastrar Alunos
// Saber o n° e Alunos
// cada aluno tem 3 notas
// Calcular média do aluno
// Identificar o status do aluno (aprovado/reprovado)
// Imprimir as notas em formato de tabela

let matrizNota = []; //decalração de um vetor

let quantAlunos = []; //undefined

quantAlunos = Number(prompt("Quantos alunos tem na sala: "));

//Cadastrar notas dos Alunos

for(let i=0 ; i<quantAlunos; i++){
    matrizNota[i]=[];//Um vetor dentro do vetor
    for (let j=0; j < 3; j++){
        console.log(`Nota ${j+1} do Aluno ${i+1}`)
        matrizNota[i][j]=Number(prompt());
    }

}

//Imprimir a tabela

console.log(matrizNota);

//Calcular a média do aluno (reduce)

for(let i=0; i<quantAlunos; i++){
    let media = matrizNota[i].reduce((soma,nota)=>soma+nota)/3;
    console.log(`A media do aluno ${i+1} = ${media.toFixed(2)}`);
    //Verificar o status do Aluno
    if(media > 7){
        console.log("Aprovado")
    } else{
        console.log("Reprovado")
    }
}
