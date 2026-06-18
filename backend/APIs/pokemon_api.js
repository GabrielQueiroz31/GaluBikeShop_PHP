// Importa a biblioteca para ler dados do usuário no terminal
const prompt = require('prompt-sync')();

// Função para consultar um Pokémon na API
async function consultarPokemon() {

    let pokemon = prompt("Digite o nome do pokemon: ");

    // Remove espaços e deixa tudo em minúsculo
    pokemon = pokemon.trim().toLowerCase();

    // Monta a URL da API com o nome digitado
    const url = `https://pokeapi.co/api/v2/pokemon/${pokemon}`;

    // Faz a requisição para a API
    const resposta = await fetch(url);

    if (!resposta.ok) {
        console.log("Erro na consulta");
        return;
    }

    // Converte a resposta para JSON
    const dados = await resposta.json();

    // Exibe os dados
    console.log("\n=== Dados do Pokémon ===");
    console.log(`Nome: ${dados.name}`);
    console.log(`Altura: ${dados.height} m`);
    console.log(`Peso: ${dados.weight} kg`);
    console.log(`Tipo: ${dados.types[0].type.name}`);
}

// Roda a função
consultarPokemon();