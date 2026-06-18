//Estrutura de dados 

//Condicionais (If Else // Switch Case)

//IF - ELSE

var precoProduto = 150;
//Se preco do produto >= 100 - desconto de 10%

if (precoProduto >= 100){
    console.log("Valor a pagar: " + (precoProduto*0.9));
}else{
    console.log("Valor a pagar: " + (precoProduto));
}

//Condicional Intermediaria (else if)
//se preco > 200 15%desc// preço > 100 10% desc//
console.log("-------------------------------------------");
if (precoProduto >= 200){
    console.log("Valor do produto: " + (precoProduto*0.85));
} else if (precoProduto >= 100){
    console.log("Valor do produto: " + (precoProduto*0.90))
} else {
    console.log("Valor produto: " + precoProduto)
}

//Switch Case
console.log("-------------------------------------------");
var mes = 4;
switch(mes){
    case 1:
        console.log("Janeiro");
        break;
    case 2:
        console.log("Fevereiro");
        break;
    case 3:
        console.log("Março");
        break;
    case 4:
        console.log("Abril");
        break;
    default:
        console.log("Outro Mês");
        break;
}

//Estruturas de Repetição (for While)

//For ()
console.log("-------------------------------------------");
for (let i = 0; i < 101; i++){
    console.log(i);
}

//While (Incontáveis)
console.log("-------------------------------------------");
var continuar = true;
var numEscolhido = 3;
var contador = 0;
while(continuar){ //enquanto continuar for verdadeiro, continua o loop
    contador++;// incremento do contador
    let numeroSorteado = Math.round(Math.random()*10);
    if(numeroSorteado == numEscolhido){
        continuar = false;
        console.log("Acertou Miseravi");
        console.log("tentativas = " + contador);
    }
}


//Funções (fuction)
//Ações específicas que podem ser chamadas a qualquer momento dentro do codigo 

console.log("-------------------------------------------")
function ola (nome){ // Função com retorno
    return "Olá, "+ nome;
}

function hello (nome){ //fuction void
    console.log("Hello, "+ nome);
}

//Chamando as fuctions
console.log(ola("Diogo"));

hello("Diogo");

//explicando o Math
//random ( sortear um numero entre 0 e 1)
//exemplo: 0.954321 / 0.23456 / 0.65432
//Math Round - Arredonda para o número para um inteiro