import '../models/habito.dart';

class HabitoController {
  void concluirHabito(Habito habito) {
    habito.concluido = true;
  }

  void resetarHabitos(List<Habito> habitos) {
    for (var habito in habitos) {
      habito.concluido = false;
    }
  }
}