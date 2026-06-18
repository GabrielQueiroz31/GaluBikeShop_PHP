import 'package:flutter/material.dart';
import '../models/habito.dart';
import '../controllers/habito_controller.dart';

class EcoProvider extends ChangeNotifier {
  final HabitoController _controller = HabitoController();

  int paginaAtual = 0;
  bool temaEscuro = false;
  String nomeUsuario = 'Usuário';

  final List<Habito> habitos = [
    Habito(titulo: 'Separar lixo reciclável', icone: '♻️'),
    Habito(titulo: 'Economizar água no banho', icone: '💧'),
    Habito(titulo: 'Usar garrafa reutilizável', icone: '🚰'),
    Habito(titulo: 'Desligar luzes desnecessárias', icone: '💡'),
    Habito(titulo: 'Usar transporte coletivo ou bicicleta', icone: '🚌'),
  ];

  List<Habito> get pendentes {
    return habitos.where((habito) => !habito.concluido).toList();
  }

  List<Habito> get concluidos {
    return habitos.where((habito) => habito.concluido).toList();
  }

  int get totalConcluidos => concluidos.length;

  int get totalPendentes => pendentes.length;

  int get pontuacao => totalConcluidos * 20;

  double get metaSemanal {
    if (habitos.isEmpty) return 0;
    return totalConcluidos / habitos.length;
  }

  String get nivel {
    if (pontuacao >= 80) return 'Guardião Verde';
    if (pontuacao >= 40) return 'Eco Ativo';
    return 'Iniciante';
  }

  void mudarPagina(int index) {
    paginaAtual = index;
    notifyListeners();
  }

  void concluirHabito(Habito habito) {
    _controller.concluirHabito(habito);
    notifyListeners();
  }

  void alterarTema(bool valor) {
    temaEscuro = valor;
    notifyListeners();
  }

  void alterarNome(String nome) {
    nomeUsuario = nome;
    notifyListeners();
  }

  void resetarProgresso() {
    _controller.resetarHabitos(habitos);
    notifyListeners();
  }
}