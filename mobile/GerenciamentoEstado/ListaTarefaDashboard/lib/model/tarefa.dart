//Modelagem dos Dados

class Tarefa {
  //Atributos
  String titulo; //armazena o titulo da tarefa
  bool concluida; //status da tarefa
  //Classe que armazena informações de data 
  DateTime datacriacao;

  //Construtor padrão
  // Tarefa(String titulo){
  //   this.titulo = titulo;
  //   this.concluida = false;
  //   this.datacriacao = DateTime.now();
  // }

  //Construtor resumido
  Tarefa({
    required this.titulo,
    this.concluida = false,
    DateTime? datacriacao,}) : datacriacao = datacriacao ?? DateTime.now();
    //Se data de criação for nulo, atribui uma data DateTime.now() -> pega a data atual

// classe de modelagem de dados, toda tarefa criada é um obj da classe Tarefa
// toda tarefa tem um titulo, um status de conclusão e uma data de criação

}