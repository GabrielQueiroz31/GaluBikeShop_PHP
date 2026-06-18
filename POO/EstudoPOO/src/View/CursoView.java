package View;

import java.util.Scanner;

import Controller.CursoController;
import Model.Aluno;
import Model.Professor;

public class CursoView {
    //Atributo
    //Instanciar obj de professor
    Professor jp = new Professor("João Pereira", "123.456", "10/10/1910", 15000.00);
    //Instanciar obj de CursoController
    CursoController cursoJava = new CursoController("Programação Java", jp);


    //Métodos view (Tela interativa CLI)
    int operacao; //Escolher a ação
    boolean continuar = true; // Continuar a ação
    Scanner sc =new Scanner(System.in); //entrada de dados

    public void menu(){
        while (continuar) {
            System.out.println("===Gerenciamento de Curso===");
            System.out.println("1. Cadastrar Aluno ");
            System.out.println("2. Informação do Curso ");
            System.out.println("3. Lançar Nota dos Alunos ");
            System.out.println("4. Status da turma ");
            System.out.println("5. Sair");
            System.out.println("==Escolha a Opção Desejada==");
            operacao = sc.nextInt();
            switch (operacao) {
                case 1:
                    Aluno aluno = cadastrarAluno();
                    cursoJava.adicionarAluno(aluno);
                    break;
                case 2:
                    cursoJava.infoCurso(); //Exibir informação
                    break;
                case 3:
                    cursoJava.notaAlunos();
                    break;
                case 4:
                    cursoJava.statusCurso();
                    break;
                case 5:
                    System.out.println("Saindo...");
                    continuar = false;
                    break;
                default:
                    System.out.println("Informe uma opção válida!");
                    break;
            }
        }
    }

    private Aluno cadastrarAluno() {
        System.out.println("Digite o nome do aluno: ");
        String nome = sc.next();
        System.out.println("Informe o CPF do aluno: ");
        String cpf = sc.next();
        System.out.println("Informe a data de nascimento do aluno: ");
        String dataNasc = sc.next();
        System.out.println("Informe a matricula do aluno: ");
        String matricula = sc.next();
        return new Aluno(nome, cpf, dataNasc, matricula);
    }
}
