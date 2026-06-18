// Elementos do DOM
const darkModeToggle = document.getElementById("darkModeToggle");
const formulario = document.getElementById("formulario");
const lista = document.getElementById("list");

// Campos do formulário
const nome = document.getElementById("nome");
const email = document.getElementById("email");
const telefone = document.getElementById("telefone");
const empresa = document.getElementById("empresa");
const categoria = document.getElementById("categoria");

// Contador
let contador = 0;

// 🌙 Modo escuro
darkModeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");

  if (document.body.classList.contains("dark-mode")) {
    darkModeToggle.textContent = "☀️ Modo Claro";
  } else {
    darkModeToggle.textContent = "🌙 Modo Escuro";
  }
});

// Limpar formulário
function limparFormulario() {
  nome.value = "";
  email.value = "";
  telefone.value = "";
  empresa.value = "";
  categoria.value = "";
}

// Criar card
function CriacaoCard(
  nomeValue,
  emailValue,
  telefoneValue,
  empresaValue,
  categoriaValue,
) {
  const li = document.createElement("li");
  li.className = "card";

  li.innerHTML = `
        <div class="guest-info">
            <h3>${nomeValue}</h3>
            <div class="guest-details">
                <p>${emailValue}</p>
                <p>${telefoneValue}</p>
                <p>${empresaValue}</p>
                <p><strong>${categoriaValue}</strong></p>
            </div>
        </div>
        <button class="btn-remove">🗑️ Remover</button>
    `;

  // Remover convidado
  const btnRemove = li.querySelector(".btn-remove");
  btnRemove.addEventListener("click", () => {
    li.remove();
    contador--;

    if (contador === 0) {
      lista.innerHTML = `
                <p>Nenhum convidado cadastrado ainda</p>
                <p>Os convidados aparecerão aqui após cadastrados</p>
            `;
    }
  });

  return li;
}

// Envio do formulário
formulario.addEventListener("submit", (event) => {
  event.preventDefault();

  const nomeValue = nome.value.trim();
  const emailValue = email.value.trim();
  const telefoneValue = telefone.value.trim();
  const empresaValue = empresa.value.trim();
  const categoriaValue = categoria.value;

  // Validação
  if (
    !nomeValue ||
    !emailValue ||
    !telefoneValue ||
    !empresaValue ||
    !categoriaValue
  ) {
    alert("Preencha todos os campos!");
    return;
  }

  // Limpa mensagem inicial
  if (contador === 0) {
    lista.innerHTML = "";
  }

  // Cria card
  const card = CriacaoCard(
    nomeValue,
    emailValue,
    telefoneValue,
    empresaValue,
    categoriaValue,
  );
  lista.insertBefore(card, lista.firstChild);

  contador++;
  limparFormulario();
});

// Foco automático
window.addEventListener("load", () => {
  nome.focus();
});
