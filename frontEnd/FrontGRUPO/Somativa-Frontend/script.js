const ligar = document.getElementById("ligar");
const desligar = document.getElementById("desligar");
const quebrar = document.getElementById("quebrar");
const trocar = document.getElementById("trocar");

const lampada = document.getElementById("lampada");

let quebrada = false; // controla se a lâmpada está quebrada

function ligarLampada() {
  if (!quebrada) {
    lampada.src = "img/lampada-acesa.png";
  }
}

function desligarLampada() {
  if (!quebrada) {
    lampada.src = "img/lampada-apagada.png";
  }
}

ligar.addEventListener("click", ligarLampada);
desligar.addEventListener("click", desligarLampada);

quebrar.addEventListener("click", function () {
  lampada.src = "img/lampada-quebrada.png";
  lampada.classList.add("lampada-quebrada");
  quebrada = true; // agora não pode ligar nem desligar
});

trocar.addEventListener("click", function () {
  lampada.src = "img/lampada-apagada.png";
  lampada.classList.remove("lampada-quebrada");
  quebrada = false; // volta a funcionar
});
