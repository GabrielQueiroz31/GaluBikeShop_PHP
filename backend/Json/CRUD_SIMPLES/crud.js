const fs = require("fs");
const promptSync = require("prompt-sync")();

//Cria o menu de opções::

function menu() {
  console.log("\nMenu de Contatos: ");
  console.log("1 - Cadastrar Contato");
  console.log("2 - Listar Contatos");
  console.log("3 - atualizar Contato");
  console.log("4 - Excluir Contato");
  console.log("5 - Sair");
}

function main() {
  let opcao;
  do {
    menu();
    opcao = promptSync("Escolha uma opção: ");
    switch (opcao) {
      case "1":
        adicionar(); // chama a função para adicionar contato
        break;
      case "2":
        listar(); // chama a função para listar contatos
        break;
      case "3":
        atualizar(); // chama a função para atualizar contato
        break;
      case "4":
        excluir(); // chama a função para excluir contato
        break;
      case "5":
        console.log("Saindo...");
        break;
      default:
        console.log("Opção inválida!");
    }
  } while (opcao !== "5");
}
// função para ler os dados do arquivo JSON

function LerDados() {
  const dados = fs.readFileSync("contatos.json", "utf-8");
  return JSON.parse(dados || "[]"); // retorna um array vazio se não houver dados no JSON
}

// função para adicionar um novo contato
function adicionar() {
  nome = promptSync("Digite o nome do contato: ");
  telefone = promptSync("Digite o telefone do contato: ");

  const contatos = LerDados(); // lê os contatos existentes
  contatos.push({ nome, telefone });
  salvarDados(contatos); //salva os contatos atualizados no arquivo JSON
  console.log("Contato adicionado com sucesso!");
}

// Função para listar os contatos
function listar() {
  const contatos = LerDados(); // lê os contatos existentes
  console.log("Lista de Contatos:");
  contatos.forEach((contato, index) => {
    console.log(`${index + 1}. ${contato.nome} - ${contato.telefone}`);
  });
}
// Função para atualizar um contato
function atualizar() {
  const indexAtualizar =
    parseInt(promptSync("Digite o número do contato que deseja atualizar: ")) -
    1;
  const contatos = LerDados();
  if (indexAtualizar >= 0 && indexAtualizar < contatos.length) {
    const novoNome = promptSync("Digite o novo nome do contato: ");
    const novoTelefone = promptSync("Digite o novo telefone do contato: ");

    contatos[indexAtualizar] = { nome: novoNome, telefone: novoTelefone }; // atualiza o contato
    salvarDados(contatos); // salva os contatos atualizados no arquivo JSON
    console.log("Contato atualizado com sucesso!");
  } else {
    console.log("Contato não encontrado!");
  }
}

function excluir() {
  const indexExcluir =
    parseInt(promptSync("Digite o número do contato que deseja excluir: ")) - 1;
  const contatos = LerDados();
  if (indexExcluir >= 0 && indexExcluir < contatos.length) {
    contatos.splice(indexExcluir, 1); // remove o contato do array
    salvarDados(contatos); // salva os contatos atualizados no arquivo JSON
    console.log("Contato excluído com sucesso!");
  } else {
    console.log("Contato não encontrado!");
  }
}

// função para "salvar" os dados no JSON
function salvarDados(contatos) {
  fs.writeFileSync("contatos.json", JSON.stringify(contatos, null, 2)); // salva os contatos no arquivo JSON
}

main(); // inicia o programa
