import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-home',
  imports: [FormsModule],
  templateUrl: './home.html',
  styleUrl: './home.css',
})
export class Home {
  //Exemplo de Interpolação (Data Binding)
  //Comunicação unidirecional entre TS -> Html
  // A interpolação é dada usando {{ elemento }}
  nome: String = 'Maria';

  //Property Binding -> Unidirecional: TS -> HTML
  //Manipula propriedade do HTML
  // a Property Binding é usada com [] em volta do Elemento
  imgUrl: String =
    'https://stories.cnnbrasil.com.br/wp-content/uploads/sites/9/2026/04/diniz-tecnico-corinthians.jpg';

  botaoDesabilitado: boolean = false;

  //Classe e Style Binding
  classeAlerta: String = "alet-success"
}

