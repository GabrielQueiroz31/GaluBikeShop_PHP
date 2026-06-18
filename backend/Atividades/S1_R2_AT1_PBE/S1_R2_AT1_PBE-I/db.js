// Array que simula o banco de dados de usuários
let usuarios = [
    { id: 1, nome: "Ana" },
    { id: 2, nome: "Carlos" }
];

// Variável para gerar IDs automáticos
let proximoIdUsuario = 3;

// Retorna todos os usuários
function buscarUsuarios() {
    return usuarios;
}

// Busca um usuário pelo ID
function buscarUsuarioPorId(id) {
    return usuarios.find((usuario) => usuario.id === id);
}

// Adiciona um novo usuário
function adicionarUsuario(nome) {
    const novoUsuario = {
        id: proximoIdUsuario++,
        nome: nome
    };

    usuarios.push(novoUsuario);
    return novoUsuario;
}

// Atualiza o nome de um usuário pelo ID
function atualizarUsuario(id, nome) {
    const usuario = usuarios.find((usuario) => usuario.id === id);

    if (!usuario) {
        return null;
    }

    usuario.nome = nome;
    return usuario;
}

// Remove um usuário pelo ID
function deletarUsuario(id) {
    const index = usuarios.findIndex((usuario) => usuario.id === id);

    if (index === -1) {
        return null;
    }

    const removido = usuarios.splice(index, 1);
    return removido[0];
}

// Exporta as funções para serem usadas em outros arquivos
module.exports = {
    buscarUsuarios,
    buscarUsuarioPorId,
    adicionarUsuario,
    atualizarUsuario,
    deletarUsuario
};