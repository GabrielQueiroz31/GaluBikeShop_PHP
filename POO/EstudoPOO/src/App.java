import View.CursoView;

public class App {
    public static void main(String[] args) throws Exception {
        //instanciando obejtos das classes

        //Ao transfromar a classe em abstrata, não é permitido instancionar objetos dessa classe
        //Pessoa pes1 = new Pessoa("Fulano", "123.456.789-00", "10/10/1910");
        //pes1.exibirInfo();

        new CursoView().menu();
    }
}
