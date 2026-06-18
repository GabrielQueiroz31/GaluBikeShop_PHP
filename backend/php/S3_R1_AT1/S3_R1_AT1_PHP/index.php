<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corinthians</title>
    <!-- CSS BASICO -->
    <style>
        body {
            text-align: center;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #000;
        }
        p {
            font-size: 1.2em;
        }
        
    </style>
</head>
<body>
    <?php
        //Declaração de variaveis
        $empresa = "Sport Clube Corinthians Paulista"; 
        $anoFundacao = 1910; 
        $qtdfuncionarios = 10000;
        $faturamento = 20000000.00; 
        $empresaAtiva = true; 

        //Exibição
        echo "<h1>$empresa</h1>";
        echo "<p>Ano de fundação: $anoFundacao</p>";
        echo "<p>Quantidade de funcionários: $qtdfuncionarios</p>";
        echo "<p>Faturamento: $faturamento</p>";
        echo "<p>A empresa está: " . ($empresaAtiva ? "Ativa" : "Desativada");
    ?>
</body>
</html>