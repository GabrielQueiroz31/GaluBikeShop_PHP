//DOM => Document Object Model

//Script de Manipulação DOM

//getElementById => variavel Simples - Id é sempre único

//Usar sempre o document para manipular
let titulo = document.getElementById("titulo"); //Busca no html o elemento com a id correspondente
console.log(titulo); //mostra a informação da Id
titulo.innerText = "Outro Título para o Site"; //Modifica o conteúdo da ID

//getElementByTagName => Vetor (Array) de elementos
let paragrafo = document.getElementsByTagName("P"); //html => p(paragrafos)
paragrafo[0].innerText="Exemplo de Parágrafo modificado por DOM"; //modificar elemento
paragrafo[1].computedStyleMap.color = "red"; //Modioficar o Style do elemento

//getElementByClassName => Vetor de elementos
let descricao = document.getElementsByClassName("descricao");
// modificar elementos do array
for(let i=0; i < descricao.length; i++){
    descricao[i].style.color = "blue";
}

//querySelector => variaveis simples = seleciona sempre o primeiro elemento com o seletor
let p = document.querySelector("P");
//modificar a fonte 
p.style.fontWeight = "bold";

//querySelectorAll => Vetor de Elementos => seleciona todos os elementos
let descricaoAll = document.querySelectorAll(".descricao");
descricaoAll.forEach(e => e.style.fontWeight = "bold");

//eventos Listener (ouvintes)

//chamar pelo nome da função
function MudarCorFundo(){
    let body = document.querySelector("body");
    body.style.backgroundColor = "red";
}

//chamar diretamente no script o ouvinte
document.getElementById("btnColor").addEventListener("click",OutraCor);

function OutraCor(){
    let body = document.querySelector("body");
    body.style.backgroundColor = "orange";
}