import java.util.Scanner;

public class Menu {

    // atributos
    double num1, num2, resultado;
    String operacao;
    boolean continuar = true;

    // métodos

    public void calculadora() {
        // para usar a calculadora - biblioteca de Scanner
        Scanner sc = new Scanner(System.in); // permite entrada de dados
        // usar um laço de repetição
        // do - while
        do {
            System.out.println("===Calculador Simples===");
            System.out.println("===Escolha a Operação");
            System.out.println("1. Soma");
            System.out.println("2. Subtração");
            System.out.println("3. Multiplicação");
            System.out.println("4. Divisão");
            System.out.println("5. Soma de 3 Números");
            System.out.println("6. Raiz quadrada");
            System.out.println("7. Potência");
            System.out.println("8. Sair");
            System.out.println("=========================");
            // le o que o usuário digitou
            operacao = sc.next();
            // Escolhi a Operação -> Decisão
            Calculos cl = new Calculos();
            switch (operacao) {
                case "1":
                    digiteNumeros();
                    resultado = cl.soma3(num1, num2, num3);
                    System.out.println("O Resultado é " + resultado);
                    break;
                case "2":
                    digiteNumeros();
                    resultado = cl.subtracao(num1, num2);
                    System.out.println("O Resultado é " + resultado);
                    break;
                case "3":
                    digiteNumeros();
                    resultado = cl.multi(num1, num2);
                    System.out.println("O Resultado é " + resultado);
                    break;
                case "4":
                    digiteNumeros();
                    // verificar se o nº 2 não é zero
                    if (num2 == 0) {
                        System.out.println("Não Dividirás por Zero");
                    } else {
                        resultado = cl.div(num1, num2);
                        System.out.println("O Resultado é " + resultado);
                    }
                    break;
                case "5":
                    digiteNumeros();
                    double num3;
                    System.out.println("Informe o Nº 3");
                    num3 = sc.nextDouble();
                    cl.soma3(num1, num2, num3);
                    break;
                case "6":
                    //Só precisa de um n°
                    System.out.println("Digite o n°");
                    num1 = sc.nextDouble();
                    resultado = cl.raiz(num1);
                    System.out.println("O resultado é " + resultado);
                    break;
                case "7":
                    digiteNumeros();
                    resultado = cl.potencia(num1, num2);
                    System.out.println("O resultado é " + resultado);
                    break;
                case "8":
                    continuar = false;
                    System.out.println("Saindo...");
                    break;
                default:
                    System.out.println("Escolha uma Operação Válida");
                    break;
            }

        } while (continuar);
        sc.close();
    }

    public void digiteNumeros() {
        Scanner sc = new Scanner(System.in);
        System.out.println("Informe o Nº 1");
        num1 = sc.nextDouble();// le o valor e converte em double
        System.out.println("Informe o Nº 2");
        num2 = sc.nextDouble();
        
    }
}
