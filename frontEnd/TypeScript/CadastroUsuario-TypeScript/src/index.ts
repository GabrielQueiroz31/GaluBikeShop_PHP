interface Usuario{
    id: number;
    nome: string;
    email: string;
    isAdmin: boolean;
}

function renderizarPerfil(usuario: Usuario): void {
  if (usuario.isAdmin) {
    console.log(`Status: Administrador: ${usuario.nome} (${usuario.email})`);
  } else {
    console.log(`Status: Usuário Comum`);
  }
}

const usuario1: Usuario = {
  id: 1,
  nome: "Gomes",
  email: "gomes@email.com",
  isAdmin: true
};

const usuario2: Usuario = {
  id: 2,
  nome: "Enzo",
  email: "Enzo@email.com",
  isAdmin: false
};

renderizarPerfil(usuario1);
renderizarPerfil(usuario2);
