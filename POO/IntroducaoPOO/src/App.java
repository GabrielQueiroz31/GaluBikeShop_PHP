import model.Pessoa;

public class App {
    public static void main(String[] args) throws Exception {
        //aqui eu executos as ações 
        //vamos instaciar(criar um obj) um objeto da classe Pessoa
        Pessoa obj = new Pessoa("123", "José", 30);

        obj.setIdade(20);

        System.out.println("Nome da pessoa: " + obj.getNome());
        System.out.println("Idade da pessoa: "+obj.getIdade());
    }
}
