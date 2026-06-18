class conta{
    titular;
    saldo;

    constructor(titular, saldo){
        this.titular = titular;
        this.saldo = saldo;
    }

    depositar(valor){
        this.saldo += valor;
        console.log(`Depósito realizado. Saldo atual: R$ ${this.saldo}`);
    }

    sacar(valor){
        if(this.saldo >= valor){
            this.saldo -= valor;
            console.log(`Saque realizado. Saldo atual: R$ ${this.saldo}`);
        } else {
            console.log("Saldo insuficiente para realizar o saque.");
        }
    }

    exibirSaldo(){
        console.log(`Titular: ${this.titular}, Saldo: R$ ${this.saldo}`);
    }
}

let conta1 = new conta("João", 1000);

conta1.exibirSaldo();
conta1.depositar(500);
conta1.sacar(200);
conta1.exibirSaldo();