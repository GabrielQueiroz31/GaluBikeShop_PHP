class Produto {
    nome;
    preco;
    estoque;

    constructor(nome, preco, estoque) {
        this.nome = nome;
        this.preco = preco;
        this.estoque = estoque;
    }

    vender(quantidade) {
        if (this.estoque >= quantidade) {
            this.estoque -= quantidade;
            console.log(`Venda realizada. Estoque restante: ${this.estoque}`);
        } else {
            console.log("Estoque insuficiente para realizar a venda.");
        }
    }

    repor(quantidade) {
        this.estoque += quantidade;
        console.log(`Estoque atualizado: ${this.estoque}`);
    }

    exibirInfo() {
        console.log(`Produto: ${this.nome}, Preço: R$ ${this.preco}, Estoque: ${this.estoque}`);
    }
}

let produto1 = new Produto("Notebook", 5000, 4);

produto1.exibirInfo();
produto1.vender(2);
produto1.repor(3);
produto1.exibirInfo();