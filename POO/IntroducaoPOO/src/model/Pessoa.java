package model;

public class Pessoa {
    //Atributos
    String cpf;
    String nome;
    int idade;

    //Métodos
    //Construtor
    //Método que tem o mesmo nome da classe 
    public Pessoa(String cpf, String nome, int idade) {
        this.cpf = cpf;
        this.nome=nome;
        this.idade=idade;
    }
    //Getters and Setters
    public void setNome(String nome){
        this.nome = nome; 
    }

    public String getNome(){
        return this.nome;
    }

    public void setIdade(int idade){
        this.idade = idade;
    }

    public int getIdade(){
        return this.idade;
    }
}