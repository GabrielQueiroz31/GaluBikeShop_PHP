<?php
// Função que calcula o tempo de existência da empresa
function tempoEmpresa($fundacao, $anoAtual) {
    $tempo = $anoAtual - $fundacao;
    return "Tempo de empresa: $tempo anos";
}

// Função que verifica o porte da empresa pela quantidade de funcionários
function porteEmpresa($funcionarios) {
    if ($funcionarios < 100) {
        return "Empresa de Pequeno Porte";
    } elseif ($funcionarios < 500) {
        return "Empresa de Médio Porte";
    } else {
        return "Empresa de Grande Porte";
    }
}

// Reutilizando as funções com dados diferentes
echo tempoEmpresa(2003, 2026) . "<br>";
echo porteEmpresa(400) . "<br><br>";

echo tempoEmpresa(2015, 2026) . "<br>";
echo porteEmpresa(80) . "<br>";
?>