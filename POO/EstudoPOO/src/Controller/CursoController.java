package Controller;

import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

import Model.Aluno;
import Model.Professor;

public class CursoController {
    //Classe que vai realizar interação entre os modelos e as interfaces view 
    
    //Atributos
    private String nomeCurso;
    private Professor professor; //Instanciar um OBJ da classe Professor
    private List<Aluno> alunosList;

    //Métodos
    //Construtor
    //Na criação do curso, deve-se passar o nome do curso e o porfessor do curso
    public CursoController(String nomeCurso, Professor professor){
        this.nomeCurso = nomeCurso;
        this.professor = professor;
        this.alunosList = new ArrayList<>(); //Vetor de objetos Alunos
    }

    //Crud (Create, Read, Update, Delete)

    //Adicionar um aluno (Create)
    public void adicionarAluno (Aluno aluno) {
        alunosList.add(aluno);
    }

    //ExibirCurso (Read)
    public void infoCurso() {
        System.out.println("Nome Curso: " + nomeCurso);
        System.out.println("Professor: " + professor.getNome());
        System.out.println("==================================");
        //Imprimir a Lista de alunos
        for (Aluno aluno : alunosList) {
            System.out.println(aluno.getNome());
        }
        System.out.println("==================================");
    }

    //Update (Lançar Notas)
    //Lançar nota de aluno por aluno já cadastrado
    public void notaAlunos(){
        //colocar o scanner aqui
        Scanner sc = new Scanner(System.in); //Ler o terminal
        for (Aluno aluno : alunosList) {
            System.out.println("Informe a nota do Aluno " + aluno.getNome());
            aluno.setNota(sc.nextDouble());
        }
    }
    //Ver notas dos alunos
    public void statusCurso() {
        System.out.println("Nome Curso: " + nomeCurso);
        System.out.println("Professor: " + professor.getNome());
        System.out.println("==================================");
        //Imprimir a Lista de alunos
        for (Aluno aluno : alunosList) {
            System.out.println(aluno.getNome() + " - Nota: " + aluno.getNota());
        }
        System.out.println("==================================");
    }

    //delete

}
