<?php
function calcularTempoEmpresa($anoFundacao, $anoAtual) {

	$tempo = $anoAtual - $anoFundacao;
    return "Tempo de empresa: $tempo anos";
}

calcularTempoEmpresa(2015, 2026);

?>
