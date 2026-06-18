//classe para organização da interface da aplicação] e interagir com ohtml
//

export class TarefaView{
    constructor(){
        this.tarefaInput = document.getElementById("tarefaInput"); //entrada de dados da nova tarefa
        this.addTarefaBtn = document.getElementById("addTarefaBtn"); //botão para enviar tarefa
        this.listaTarefas = document.getElementById("listaTarefas"); //ul lista de tarefas 
        this.mensagem = document.getElementById("mensagem"); //p para mensagem
    }

    //métodos
    //pegar a tarefa do input
    getTarefaInputValue(){
        return this.tarefaInput.value.trim();
    }

    //limpar o valor do input
    clearInput(){
        this.tarefaInput.value = "";
    }

    // mandar uma mensagem para o usuário no paragrafo
    showMensagem(texto){
        this.mensagem.textContent = texto;
    }

    clearMensagem(){
        this.mensagem.textContent = "";
    }

    //renderizar a lista de tarefas
    renderTarefa(tarefas, atualizar, remover){
        //limpar a lista existente
        this.listaTarefas.innerHTML = ""; // remover todo html do ul

        //reconstruir a lista
        tarefas.forEach(tarefa =>{
            //lógica do laço de repetição
            const li = document.createElement("li"); //criando um item da lista
            
            if(tarefa.completed){
                li.classList.add("completed"); // adicionando a classe completed o elemento
            }

            const span = document.createElement("span");
            span.textContent = tarefa.titulo;

            const action = document.createElement("div");
            action.classList.add("action");
            
            //botão para atualizar a tarefa
            const atualizarBtn = document.createElement("button");
            atualizarBtn.textContent = tarefa.completed ? "Desfazer" : "Concluir"; //operador ternário
            atualizarBtn.addEventListener("click", () => atualizar(tarefa.id)); // função estará no controller

            //botão apra remover a tarefa
            const removerBtn = document.createElement("button");
            removerBtn.textContent = "Remover";
            removerBtn.addEventListener("click", ()=>remover(tarefa.id));

            //adicionar o elementos ao html
            //add button a div action
            action.appendChild(atualizarBtn);
            action.appendChild(removerBtn);

            // add. span e a div ao li
            li.appendChild(span);
            li.appendChild(action);

            //add li ao ul
            this.listaTarefas.appendChild(li);

        });
    }
}

// Pega os elementos do Html
// Le um valor do input
// limpa o imput
// Mostra mensgem
// Limpa a Mensagem
// Rederiza a Lista de TArefas na UL
