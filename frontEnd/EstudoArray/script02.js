//Matrizes

//delcaração de Matrizes
let matriz = [ 
    [9,8,7]
    [6,5,4]
    [3,2,1]
];

let matrizMista = [
    ["João", 25, "19-999990"],
    ["Maria", 22, "11-7775432"],
    ["Joana", 18, "12-987654321"]
]

//Busca de Item na Matriz

console.log(matrizMista[1][0]); //Maria

console.log(matrizMista[2][2]); //12-987654321

//Iterando sobre a matriz (for aninhada)
for(let i=0; i < matriz.length; i++){
    for(let j=0; j < matriz[i].length; j++){
        console .log(matriz[i][j]);
    }
}