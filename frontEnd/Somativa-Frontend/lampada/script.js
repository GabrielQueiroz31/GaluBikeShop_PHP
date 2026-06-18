// Seleciona os botões pelo ID
const ligar = document.getElementById("ligar");
const desligar = document.getElementById("desligar");
const quebrar = document.getElementById("quebrar");
const trocar = document.getElementById("trocar");

// Agrupa todos os botões em um array
let opcoes = [ligar, desligar, quebrar, trocar];

// Controla o estado da lâmpada
let quebrada = false;

// Função para ligar a lâmpada (só funciona se não estiver quebrada)
function ligarLampada() {
  if (!quebrada) {
    lampada.src = "img/lampada-acesa.png";
  }
}

// Função para desligar a lâmpada
function desligarLampada() {
  if (!quebrada) {
    lampada.src = "img/lampada-apagada.png";
  }
}

// Eventos de clique para ligar e desligar
ligar.addEventListener("click", ligarLampada);
desligar.addEventListener("click", desligarLampada);

// Evento para quebrar a lâmpada
quebrar.addEventListener("click", function () {
  lampada.src = "img/lampada-quebrada.png";

  // Esconde todos os botões, exceto o de trocar
  opcoes.forEach(botao => {
    if (botao !== trocar){
      botao.style.display = "none";
    }
  });

  quebrada = true; 
});

// Evento para trocar (resetar) a lâmpada
trocar.addEventListener("click", function () {
  lampada.src = "img/lampada-apagada.png";

  // Mostra novamente todos os botões
  opcoes.forEach(botao => {
    botao.style.display = "inline-block";
  });

  quebrada = false; 
});