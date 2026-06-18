"use strict";
function renderizarPerfil(usuario) {
    if (usuario.isAdmin) {
        console.log(`Usuário Administrador: ${usuario.nome} (${usuario.email})`);
    }
    else {
        console.log(`Usuário Comum: ${usuario.nome} (${usuario.email})`);
    }
}
const usuario1 = {
    id: 1,
    nome: "Gomes",
    email: "gomes@email.com",
    isAdmin: true
};
const usuario2 = {
    id: 2,
    nome: "Enzo",
    email: "Enzo@email.com",
    isAdmin: false
};
renderizarPerfil(usuario1);
renderizarPerfil(usuario2);
