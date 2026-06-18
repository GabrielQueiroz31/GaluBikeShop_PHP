//Operações Avançadas de Array

let valores = [10,20,30,40,50];
//map -> Criação de Novos Valores de um Array
let valoresDobro = valores.map(x => x*2);
console.log(valoresDobro); //[20,40,60,80,100]

//Filter => filtragem de dados de um array
let valoresFilter = valores.filter(x => x>25);
console.log(valoresFilter); //[30,40,50]

// reduce => tranforma um array em variável simples
let soma = valores.reduce((soma,e)=>soma+e);
console.log(soma); //150

//sort => ordenação de Array
let aleatorio = [7,4,2,9,1,5,8,6,3];
console.log(aleatorio);
let ordenado = aleatorio.sort();
console.log(ordenado);