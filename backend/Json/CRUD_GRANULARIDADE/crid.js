const fs = require("fs");
const promptSync = require("prompt-sync")();

function menu() {
    console.log("\nMenu de Contatos: ");
    console.log("1 - Cadastrar Contato");
    console.log("2 - Listar Contatos");
    console.log("3 - atualizar Contato");
    console.log("4 - Excluir Contato");
    console.log("5 - Sair");
}

// função para escolher grupo
function escolherGrupo() {
    console.log("\nTipo de contato:");
    console.log("1 - Aluno");
    console.log("2 - Professor");

    const opcao = promptSync("Escolha o tipo de contato: ");

    if (opcao === "1") return "Aluno";
    if (opcao === "2") return "Professor";
    return null; // Retorna null se a opção for inválida
}

//leitura do JSON
function LerDados() {
    const dados = fs.readFileSync("contatos.json", "utf-8");
    return JSON.parse(dados || "[]"); // retorna um array vazio se não houver dados no JSON
}

function salvarDados(contatos) {
    fs.writeFileSync("contatos.json", JSON.stringify(contatos, null, 2), "utf-8");
}

//função para adicionar

function adicionar() {
    const grupo = escolherGrupo();
    if (!grupo) return console.log("Tipo de contato inválido!");
    const nome = promptSync("Nome: ");
    const telefone = promptSync("Telefone: ");

    const dados = LerDados();
    dados[grupo].push({nome, telefone});
    salvarDados(dados);
}

function listar() {
    const grupo = escolherGrupo();
    if (!grupo) return console.log("Tipo de contato inválido!");

    const dados = LerDados();

    console.log(`Lista de ${grupo}s:`);
    dados[grupo].forEach((contato, index) => {
        console.log(`${index + 1}. ${contato.nome} - ${contato.telefone}`);
    });
}

// função atualizar

function atualizar() {
    const grupo = escolherGrupo();
    if (!grupo) return console.log("Tipo de contato inválido!");
    const dados = LerDados();
    const index = parseInt(promptSync("Index do contato a atualizar: ")) - 1;
    if (index >= 0 && index < dados[grupo].length) {
        const nome = promptSync("Novo nome: ");
        const telefone = promptSync("Novo telefone: ");
        dados[grupo][index] = { nome, telefone };
        salvarDados(dados);
        console.log("Contato atualizado com sucesso!");
    } else {
        console.log("Index inválido!");
    }
}

//função excluir
function excluir() {
    const grupo = escolherGrupo();
    if (!grupo) return console.log("Tipo de contato inválido!");
    const dados = LerDados();

    const index = parseInt(promptSync("Indice do contato a excluir: ")) - 1;
    if (index >= 0 && index < dados[grupo].length) {
        dados[grupo].splice(index, 1);
        salvarDados(dados);
        console.log("Contato excluído com sucesso!");
    } else {
        console.log("Index inválido!");
    }
}

function main(){
    let opcao;
    do {
        menu();
        opcao = promptSync("Escolha uma opção: ");
        switch(opcao){
            case "1":
                adicionar();
                break;
            case "2":
                listar();
                break;
            case "3":
                atualizar();
                break;
            case "4":
                excluir();
                break;
            case "5":
                console.log("Saindo...");
                break;
            default:
                console.log("Opção inválida!");
        }
    } while(opcao !== "5");

}

main();