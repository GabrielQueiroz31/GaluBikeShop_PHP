class Veiculo{
    marca;
    modelo;
    ano;

    constructor(marca, modelo, ano){
        this.marca = marca;
        this.modelo = modelo;
        this.ano = ano;
    }

    exibirInfo(){
        console.log(`Marca: ${this.marca}, Modelo${this.modelo} e Ano: ${this.ano}`)
    }
}

let veiculo1 = new Veiculo("volkswagen", "Jetta GLI", 2025);

//Subclasse Carro que herda da classe Veiculo
class Carro extends Veiculo{
    quantidadePorta;

    constructor(marca, modelo, ano, quantidadePorta){
        super(marca, modelo, ano);
        this.quantidadePorta = quantidadePorta;
        //Método exibirInfo(), sobrescrevendo o da classe pai para incluir as portas.
        this.exibirInfo = function() {
            console.log(`Marca: ${this.marca}, Modelo: ${this.modelo}, Ano: ${this.ano}, Portas: ${this.quantidadePorta}`);
        };
    }
}

let carro1 = new Carro("Chevrolet", "Monza", 2003, 4)

veiculo1.exibirInfo();
carro1.exibirInfo();