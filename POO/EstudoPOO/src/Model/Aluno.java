//SubClasse de Pessoa
package Model;

public class Aluno extends Pessoa{
    //ATRIBUTOS
    //Já tem os atributos (nome, cpf e dataNasc) da SuperClasse Pessoa
    private String matricula;
    private double nota;

    //Métodos
    //Contrutor
    public Aluno (String nome, String cpf, String dataNasc, String matricula) {
        super(nome, cpf, dataNasc);
        this.matricula = matricula;
    }

    //getters and setter
    public String getMatricula() {
        return matricula;
    }

    public void setMatricula(String matricula) {
        this.matricula = matricula;
    }

    public double getNota() {
        return nota;
    }

    public void setNota(double nota) {
        this.nota = nota;
    }
    //Exebir informações do aluno
    @Override //Polimorfismo de Classe
    public void exibirInfo(){
        super.exibirInfo();
        System.out.println("Matricula: " + matricula);
        System.out.println("Nota: " + nota);

    }
    

}
