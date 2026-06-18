// Eventos Avançados com DOM

// capturar letra digitada -> function
document.addEventListener("keydown", (e) => {
  //exibir a letra no console
  console.log("Tecla pressionada: " + e.key);
});

//função para sugestão de texto em campos de busca =>

let input = document.createElement("input");
input.type = "text";
input.id = "busca";
input.placeholder = "Digite para buscar...";
document.body.appendChild(input); //add input ao body
//criar uma lista de sugestões
let lista = document.createElement("ul"); //lista não ordenada
lista.id = "sugestoes";
lista.style.listStyle = "none"; // remove a característica de lista * antes do texto
document.body.appendChild(lista); //add lista ao body

//criar um vetor de sugestões
let sugestoes = [
  "JavaScript",
  "TypeScript",
  "Java",
  "Dart",
  "Kotlin",
  "C#",
  "PHP",
  "Go",
  "Ruby",
  "C++",
  "Assembly",
  "Cobol",
  "C",
  "Lua",
  "Swift",
  "Pascal",
  "Delphi",
  "Rust",
];

//evento para capturar o texto e sugerir a partir dos caracteres digitados
document.getElementById("busca").addEventListener("keyup", () => {
  let texto = input.value.toLowerCase();
  lista.innerHTML = ""; //limpa a lista
  sugestoes.forEach((sugestao) => {
    if (sugestao.toLowerCase().includes(texto)) {
      let item = document.createElement("li");
      //permitir click do item
      item.style.cursor = "pointer"; //Transforma em cursor pointer
      item.addEventListener("click", () => {
        input.value = sugestao; //ao clicar no item, pega o texto
        lista.innerHTML = ""; //Limpa a lista
      });
      item.innerText = sugestao;
      lista.appendChild(item);
    }
  });
});
