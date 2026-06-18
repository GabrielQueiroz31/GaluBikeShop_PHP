// Estudo de DOM Avançado
//Adicionar elementos com DOM em Páginsa HTML

//Construir um Header com DOM

let header = document.createElement("header"); //Criação de uma tag <header>

// Estilização do header
header.style.backgroundColor = "black";
header.style.height = "8vh";
//adicionar o header como elemento filho do body
document.body.appendChild(header);
document.body.style.margin = "0"; //Retirou a margen padrão do body

//Adicionar elementos ao header
let divNav = document.createElement("div"); //Criação de uma tag <div>
//Configurando o display da div
divNav.style.display = "flex"
divNav.style.justifyContent = "space-around";
divNav.style.color = "aliceblue";
divNav.style.height = "100%";
divNav.style.alignItems = "Center";
divNav.style.fontSize = "5vh";
divNav.style.fontFamily = "Arial, Helvetica, sans-serif";

//Adicionar a div ao header como elemento filho
header.appendChild(divNav);

//Criar os itens de navegação
let itensNav = ["Index", "Produtos", "Contato"];
// Percorrer um vetor
itensNav.forEach(e => {
    let item = document.createElement("a");
    item.innerHTML = e;
    item.href = e.toLowerCase() + ".html"; //Criando o Link do item de navegação
    item.style.textDecoration = "none"; //Remove o link sublinhado
    item.style.color = "inherit"; //mantem a cor original
    divNav.appendChild(item); //Adicionando o item a divNav
})

//Rodapé
let footer = document.createElement("footer");
footer.style.backgroundColor = "black";
footer.style.height = "8vh";
footer.style.width = "100%";
footer.style.position = "fixed";
footer.style.bottom = "0";
let paragrafoFooter = document.createElement("p");
paragrafoFooter.innerHTML =
  "Copyright &copy; 2026 - Todos os direitos reservados.";
paragrafoFooter.style.color = "aliceblue";
paragrafoFooter.style.textAlign = "center";
paragrafoFooter.style.lineHeight = "5vh";
footer.appendChild(paragrafoFooter);
document.body.appendChild(footer);



