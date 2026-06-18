  import 'package:flutter/material.dart';
  import 'package:lista_tarefas_provider/model/tarefa.dart';

  class TarefaController extends ChangeNotifier {
  //ChangeNotifier -> Classe do provider
  //Tarefas Controller está herdando elementos da ChangeNotifier
  //Herda o método notifierListener()


  //Atributos
  //Lista para armazenar as tarefas criadas
  List<Tarefa> _tarefas = []; //atributo privado

  //getter
  List<Tarefa> get tarefas => _tarefas;
  //Método get para acessar os dados da lista privada

  //Métodos Crud
  //Adicionar tarefa
  void criarTarefa(String titulo){
    //verificar se o texto não é vazio
    if(titulo.trim().isEmpty) return; //interrompe o método

    tarefas.add(Tarefa(titulo: titulo.trim()));

    //avisa os listeners
    //atualiza os widgets que usar esse dado
    notifyListeners();
  }

  //alterar tarefa
  void alterarTarefa(int index){
    _tarefas[index].concluida = !_tarefas[index].concluida;
    notifyListeners();
  }

  //remover tarefa (delete)
  void removerTarefa(int index){
    //void => função que não tem return, não retorna nada
    //busca a tarefa e remove da lista
    _tarefas.removeAt(index);
    notifyListeners();
  }

  //Criar métricas para usar no DashboardPage
  //Calcular o Total de Tarefas
  // calcula quantas tarefas tem no vetor
  int get totalTarefas => _tarefas.length; //Uma funçaõ que me retorna um numero

  //Total de Tarefas Concluídas
  int get totalTarefasConcluidas => _tarefas.where((tarefa) => tarefa.concluida).length;

  //Total de Tarefas Pendentes
  int get totalTarefasPendente => _tarefas.where((tarefa) => !tarefa.concluida).length;

  //Porcentagem de Tarefas Concluídas
  double get porcentagemTarefasConcluidas {
    if (_tarefas.isEmpty) return 0;
    return (totalTarefasConcluidas / totalTarefas) * 100;
  }
  }