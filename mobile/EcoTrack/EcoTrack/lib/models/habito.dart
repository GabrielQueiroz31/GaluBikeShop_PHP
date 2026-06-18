class Habito {
  final String titulo;
  final String icone;
  bool concluido;

  Habito({
    required this.titulo,
    required this.icone,
    this.concluido = false,
  });
}