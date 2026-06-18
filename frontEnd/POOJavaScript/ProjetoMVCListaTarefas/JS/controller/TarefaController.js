// classe controller para realizar a interação entre o model e o view

export class TarefaController{
    constructor(model, view){
        this.model = model;
        this.view = view;
    }
    
    //Função que roda no inicio do sistema
    init(){
        //Evento para adicionar tarefas
        this.view.addTarefaBtn.addEventListener("click", () => this.addTarefa());
        //renderizar a lista dea tarefas
        this.view.renderTarefa(
            this.model.getTarefas(),// pegar as tarefas do model
            (id) => this.atualizarTarefa(id), //Função para atualizar tarefa
            (id) => this.removerTarefa(id), //Função para remover tarefa
        )
    }

    //Funções para adicionar tarefas
    addTarefa(){
        const titulo = this.view.getTarefaInputValue()//Pega o valor do input

        if(titulo === ""){
            //Mandar mensagem de erro
            this.view.showMensagem("O título da tarefa não pode ser vazio");
            return; //interrompe a função
        }

        //continuo escrevendo a função
        this.view.clearMensagem();
        this.model.addTarefa(titulo); //Adiciona o titulo da tarefa no model
        this.view.clearInput(); //Limpa  input
        this.updateView(); //Atualiza a view

    }

    //Função para mudar a tarefa para concluida ou não concluida
    atualizarTarefa(id){
        this.model.atualizarTarefa(id); //Atualizar a tarefa no model
        this.updateView(); //Atualizar a view
    }

    removerTarefa(id){
        this.model.removeTarefa(id); //Remover a tarefa no model
        this.updateView(); //Atualizar a view
    }

    updateView(){
        this.view.renderTarefa(
            this.model.getTarefas(),
            (id) => this.atualizarTarefa(id),
            (id) => this.removerTarefa(id),
        )
    }
}