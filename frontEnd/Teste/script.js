// === Lista de Tarefas ===

// Seleção dos elementos
const btnEnviar = document.getElementById("btnEnviar");
const inputTarefa = document.getElementById("tarefa");
const lista = document.getElementById("lista");
const contador = document.getElementById("contador");
const dica = document.getElementById("dica");

// Ouvintes de evento
btnEnviar.addEventListener("click", criarTarefa);

// Permite pressionar Enter para adicionar a tarefa
inputTarefa.addEventListener("keydown", function (e) {
    if (e.key === "Enter") {
        criarTarefa();
    }
});

// === Funções ===

function criarTarefa() {
    const texto = inputTarefa.value.trim();

    // Não cria tarefa se o campo estiver vazio
    if (texto === "") {
        inputTarefa.focus();
        return;
    }

    // Cria o item da lista
    const li = document.createElement("li");

    const span = document.createElement("span");
    span.textContent = texto;
    span.title = "Clique para marcar como concluída";

    // Clique no texto marca/desmarca como concluída
    span.addEventListener("click", function () {
        li.classList.toggle("concluida");
    });

    const btnRemover = document.createElement("button");
    btnRemover.textContent = "Remover";
    btnRemover.className = "btnRemove";
    btnRemover.addEventListener("click", function () {
        removerTarefa(li);
    });

    li.appendChild(span);
    li.appendChild(btnRemover);
    lista.appendChild(li);

    // Limpa o input e foca para próxima tarefa
    inputTarefa.value = "";
    inputTarefa.focus();

    atualizarContador();
}

function removerTarefa(li) {
    li.style.animation = "none";
    li.style.opacity = "0";
    li.style.transform = "translateX(20px)";
    li.style.transition = "opacity 0.2s, transform 0.2s";

    setTimeout(() => {
        li.remove();
        atualizarContador();
    }, 200);
}

function atualizarContador() {
    const total = lista.querySelectorAll("li").length;

    contador.textContent = total === 0
        ? "0 tarefas"
        : total === 1
        ? "1 tarefa"
        : `${total} tarefas`;

    // Mostra ou esconde a dica de lista vazia
    if (total === 0) {
        dica.classList.remove("oculta");
    } else {
        dica.classList.add("oculta");
    }
}
