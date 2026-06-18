//Funções de String

const mensagem = " JavScript é Incrivel ";

//Contar quantos caracteres tem a variável
console.log(mensagem.length); // 23

//MAIÚSCULA E minúscula
console.log(mensagem.toUpperCase); //JAVASCRIPT É INCRIVEL
console.log(mensagem.toLowerCase); //javascript é incrivel

//substituição de partes da String
const mensagem2 = mensagem.replace("Java", "Type");
console.log("mensagem2"); //TypeScript é Incrivel

//partes do texto

console.log(mensagem.substring(0, 5)); //Java
console.log(mensagem.slice(-11)); //JavaScript

//Tesoura (trim)
console.log(mensagem.trim()); //remove espaços antes e depois do texto

//Separação de String
const mensagem3 = "Boa tarde Com muita Alegria";
const array = mensagem3.split(" "); // usando o espaço para separa a frase e transformar em vetor
console.log(array);
    


