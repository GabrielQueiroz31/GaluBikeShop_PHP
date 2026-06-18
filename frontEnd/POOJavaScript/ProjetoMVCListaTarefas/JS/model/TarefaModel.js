//base da estrutura do aplicativo
// é a classe responsável pela modelagem de dados


// adicionar um anotação na classe => export
// que essa classe será usada em outras partes do código
export class TarefaModel{

    //js permite colocar atributos diretamente no construtor
    constructor(){
        this.tarefas = []; //cria um vetor para as tarefas
        this.currentId = 1 // contador para o id
    }

    //métodos
    //adicioanr tarefa (create)
    addTarefa(titulo){
        const newTarefa = {
            id: this.currentId++,
            titulo: titulo,
            completed: false
        };
        this.tarefas.push(newTarefa); //adicioanr a tarefa ao vetor
    }

    //buscar a tarefas (read)
    getTarefas(){
        return this.tarefas; // retorna o vetor de tarefas
    }

    //atualizar tarefa (update)
    atualizarTarefa(id){
        const tarefa = this.tarefas.find(tarefa => tarefa.id === id);
        if(tarefa){ //se tarefa for encontrada
            tarefa.completed = !tarefa.completed; //inverter o valor da booleana
        }
    }

    //remover a tarefa do vetor (delete)
    removeTarefa(id){
        this.tarefas = this.tarefas.filter(tarefa => tarefa.id !== id)
    }

}

// o que foi Feito?
//um crud
//criamos um vetor de tarefas
// geramos um id automatico para as tarefas
