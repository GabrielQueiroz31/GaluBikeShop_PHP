package Model;

public abstract class Pessoa { //encapsulamento
    //atributos - privado - só podem ser acessado pela classe, 
    // outras classes e métodos não conseguem acessar esses
    //atributos
    private String nome;
    private String cpf;
    private String dataNasc;

    //métodos públicos
    //construtor
    public Pessoa(String nome, String cpf, String dataNasc){
        this.nome = nome;
        this.cpf = cpf;
        this.dataNasc = dataNasc;
    }
    //criação dos getter and setter

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getCpf() {
        return cpf;
    }

    public void setCpf(String cpf) {
        this.cpf = cpf;
    }

    public String getDataNasc() {
        return dataNasc;
    }

    public void setDataNasc(String dataNasc) {
        this.dataNasc = dataNasc;
    }

    //exibir informações
    public void exibirInfo(){
        System.out.println("Nome: "+nome);
        System.out.println("CPF: "+cpf);
    }
    

}
