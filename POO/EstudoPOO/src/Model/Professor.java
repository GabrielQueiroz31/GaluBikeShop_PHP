//SubClasse de Pessoa
package Model;

public class Professor extends Pessoa {
    //Atributos
    private double salario;

    //Métodos
    //Construtor
    public Professor(String nome, String cpf, String dataNasc, double salario) {
        super(nome, cpf, dataNasc);
        this.salario = salario;
    }

    //getters and setter
    public double getSalario() {
        return salario;
    }

    public void setSalario(double salario) {
        this.salario = salario;
    }

    //Exebir informações do professor
    @Override 
    public void exibirInfo() {
        super.exibirInfo();
        System.out.println("Salario: R$" + salario);
    }
    
}
