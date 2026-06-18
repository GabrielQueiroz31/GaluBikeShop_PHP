package com.example.escola_xyz.Model;


import java.io.Serializable;
import jakarta.persistence.*;


@Entity
public class VerificaCadastroAdm implements Serializable {
    //atributos
    @Id
    private String cpf;
    private String nome;
    //métodos
    //getters setters
    public String getCpf() {
        return cpf;
    }
    public void setCpf(String cpf) {
        this.cpf = cpf;
    }
    public String getNome() {
        return nome;
    }
    public void setNome(String nome) {
        this.nome = nome;
    }
    

}
