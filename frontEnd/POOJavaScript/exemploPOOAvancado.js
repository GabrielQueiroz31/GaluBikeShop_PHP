// Estudos Avançados de POO em JS

//Criação de uma Classe

class Pessoa{ //Abstract class somente funciona no TypeScript
    //atributos Privado (encapsulamento)
    #nome;
    #idade;
    #cpf;

    //constructor
    constructor(nome, idade, cpf){
        this.#nome = nome;
        this.#idade = idade;
        this.#cpf = cpf;
    }

    // getters and setters publics
    getNome(){ //pegam o valor do atributo privado
        return this.#nome;
    }

    getIdade(){
        return this.#idade;
    }

    getCpf(){
        return this.#cpf;
    }

    setNome(nome){
        this.#nome = nome;
    }

    setIdade(idade){
        this.#idade = idade;
    }

    //método de Acesso
    exibirInfo(){
        console.log(
            `Nome: ${this.#nome}\nIdade: ${this.#idade}\nCPF: ${this.#cpf}`
        );
    }
}

//Instanciar Obj de Pessoas
let pessoa1 = new Pessoa("João", 25, "123.456.789.00");
let pessoa2 = new Pessoa("Maria", 30, "987.654.321-00");

pessoa1.exibirInfo();
pessoa2.exibirInfo();

//alterar a idade da pessoa1

pessoa1.idade(26);
pessoa1.exibirInfo();

//herança em POO (Extends)

class Funcionario extends Pessoa{
    //funcionario herda as caracteristicas de Pessoa
    //novo atributos para funcionário
    #cargo;
    #salario;

    //cosntrutor
    constructor(nome, idade, cpf, cargo, salario){
        super(nome, idade, cpf); //chama os atributos da superclasse
        this.#cargo = cargo;
        this.#salario = salario;
    }

    //métodos que estão faltando
    getCargo(){
        return this.#cargo;
    }

    getSalario(){
        return this.#salario;
    }

    setCargo(cargo){
        this.#cargo = cargo;
    }

    setSalario(novoSalario){
        this.#salario = novoSalario;
    }

    //método de acesso
    exibirInfo(){//polimorfismo
        super.exibirInfo();
        console.log(`Cargo: ${this.#cargo}\nSalário: ${this.#salario}`);
    }
}

//instanciar OBJ de Funcionário

let funcionario1 = new Funcionario("Pedro", 27, "321.654.987-00","Motorista", 3500);

funcionario1.exibirInfo();
funcionario1.setSalario(4000);
funcionario1.exibirInfo();