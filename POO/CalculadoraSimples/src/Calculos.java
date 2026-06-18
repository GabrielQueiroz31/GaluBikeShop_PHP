public class Calculos {
    // classe para criar os calculos

    // métodos

    //soma
    public double soma(double a, double b){
        return a+b;
    }

    public double soma3(double a, double b, double c){
        return a+b+c;
    }
    
    //subtração
    public double subtracao(double a, double b){
        return a-b;
    }
    
    //multi
    public double multi(double a, double b){
        return a*b;
    }
    
    //divisão
    public double div(double a, double b){
        return a/b;
    }

    public double raiz(double a){
        return Math.sqrt(a);
    }

    //potencia
    public double potencia(double a, double b){
        return Math.pow(a, b);
    }
}