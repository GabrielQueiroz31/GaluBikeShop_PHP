class funcionario{
    nome;
    salario;
    cargo;

    constructor(nome, salario, cargo){
        this.nome = nome;
        this.salario = salario;
        this.cargo = cargo;
    }

    aumentarSalario(percentual){
        this.salario += this.salario * (percentual / 100);
        console.log(`Salário atualizado: R$ ${this.salario}`);
    }

    exibirInfo(){
        console.log(`Nome: ${this.nome}, Cargo: ${this.cargo}, Salário: R$ ${this.salario}`);
    }
}

let funcionario1 = new funcionario("Gustavo", 7000, "Analista de Banco de Dados");

funcionario1.exibirInfo();
funcionario1.aumentarSalario(10);
funcionario1.exibirInfo();