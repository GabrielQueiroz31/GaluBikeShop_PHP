// Importar o prompt-sync

const prompt = require('prompt-sync')();

//Função principal
function consultarCEP() {
    // 1. Solicitar o cep 2. Monta a URL 3. Faz a req (GET) 4. Retornar os dados.
    let cep = prompt("Digite seu CEP (somente numeros): ");
    cep = cep.trim();

    const url = `https://viacep.com.br/ws/${cep}/json/`;

fetch(url)
.then((resposta) => {
    //converte a resposta em JSON
    return resposta.json();
})
.then((dados) => {
    //Verificar se o CEP é invalido
    if (dados.erro){
        console.log("CEP não encontrado");
        return;
    }
//Exibi os dados do CEP:
console.log("Dados do CEP: ");
console.log("CEP: ", dados.cep)
console.log("Logradouro: ", dados.logradouro);
console.log("Bairro: ", dados.bairro);
console.log("Cidade: ", dados.localidade);
console.log("UF: ", dados.uf);
})
.catch((erro) => {
    console.log("Erro ao acessar a API: ");
    console.log(erro.message);
});
}
consultarCEP();
