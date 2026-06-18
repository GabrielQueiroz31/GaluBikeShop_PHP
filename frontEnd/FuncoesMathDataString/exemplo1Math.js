//funções Matemáticas (Math) -> Nativas

// SQRT e POW (Quadrado e Potência)

//calcular a raiz quadrada de 25
console.log(Math.sqrt(25));//5

//Potencia de um numero pelo outro
console.log(Math.pow(7, 2)); //7² = 49
console.log(Math.pow(4,3)); //4³ = 64
console.log(Math.pow(27, 1/3)); //Raiz cubica de 27 = 3

//Funções de Arredondamento (round, ceil, floor)
console.log(Math.round(4.7)); //5
console.log(Math.round(4.4)); //4
console.log(Math.ceil(4.2)); //5
console.log(Math.floor(4.8)); //4

//Funções Números aleatórios (Math.random)
console.log(Math.random()) //gerar um n° aleatório entre 0 e 1
//gerar um n° entre 0 e 999
console.log(Math.random() * 1000);

//Números Absolutos (converte negativo em positovo) (Math.abs)
console.log(Math.abs(-10)); //10

// Funções Analíticas Mínimo e Máximo (Math.min, Math.max)
console.log(Math.min(1, 2, 3, 4, 5, 6, 7, 8, 9)); //1
console.log(Math.max(1, 2, 3, 4, 5, 6, 7, 8, 9)); //9
