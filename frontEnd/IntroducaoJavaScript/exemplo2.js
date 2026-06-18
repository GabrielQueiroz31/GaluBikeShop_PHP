//Tipos de operadoes

//Operadores Aritmeticos (+, -, *, /, %)

var a = 10;
var b = 3;
var c;
//soma
c = a+b;
console.log("Soma: "+c);

//Subtração
 c = a-b;
 console.log("Subtração"+c);

 //Multiplicação
 c = a*b;
 console.log("Multiplicação: "+c);

 //Divisão
 c = a/b;
 console.log("Divisão: "+c);

 //Resto da divisão
 c = a%b;
 console.log("Resto da divisão: "+c);

 //Operadores relacionais(> < >= <= == === != !==)

 var a = 10;
 var b = 20;
 var c = "20";

 console.log("Relacionais: "+ (a > b)); /// False
 //O que importa
 console.log("Igualdade Simples: " + (b == c));//true
 console.log("Igualdade Estrita: " + (b === c));//false

 //Operadores lógicos (&& - E, || - OU, ! - Não)
 var nota1 = 5;
 var nota2= 8;

 console.log("Aprovção: " + nota1 > 7 && nota2 > 7); //False
 console.log("Aprovado: " + nota1 > 7 || nota2 > 7);//True
 console.log("Negação: " + !true); //false
 