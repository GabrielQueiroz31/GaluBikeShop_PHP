//modelagem de dados 

class Nota {
  //atributos
  final int? id; //permitir que a variavel seja nula
  // em um primeiro momento a váriavel é nula
  // somente quando cair no DB ira receber um valor para o ID
  final String titulo;
  final String conteudo;

  //construtor
  Nota({this.id, required this.titulo, required this.conteudo});

  // Métodos de serialização de dados (toMap() froMap())
  
  //toMap() => converter um obj da Classe Nota para MAP de DB (inserir dados no DB)
  Map<String, dynamic> toMap() {
    return {
      "id": id, //Mapeando as colunas do DB com os atributos da classe
      "titulo": titulo,
      "conteudo": conteudo,
    };
  }

  // Converter um MAP(Vindo do DB) => Obj da Classe Nota
  // Para fazer o fromMap vamos usar factory
  factory Nota.fromMap(Map<String, dynamic> map) {
    return Nota(
      id: map["id"] as int, //se está voltando do DB então já tem um ID
      titulo: map["titulo"] as String, 
      conteudo: map["conteudo"] as String      
    );
  }

  //Método para imprimir os dados
  @override
  String toString() {
    return "Nota(id: $id, titulo: $titulo, conteudo: $conteudo)";
  }

}