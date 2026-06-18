for (let i = 0; i <= 20; i++) {
  if (i % 2 == 0) {
    console.log(i);
  }
}

//Forma do professor
for (let i = 1; i <= 20; i++) {
  //imprimir nº pares
  let resto = i % 2; //pega o resto da divisão
  if (resto == 0) {
    console.log(i);
  }
}
