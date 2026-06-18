<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Configurações da página -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título da aba -->
    <title>Análise de Salário</title>

    <!-- Arquivo CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <!-- Título principal -->
    <h1>Análise de Salário</h1>

    <!-- Card principal -->
    <div class="card">

        <!-- Formulário usando método POST -->
        <form method="POST">

        <!-- Campo para digitar o salário -->
        <label>Salário:</label>

        <!-- Input numérico -->
        <input type="number" name="salario" step="0.01">

        <!-- Botão para enviar -->
        <input type="submit" value="Analisar">
        
        <?php

        // Valor do salário mínimo
        $salarioMinimo = 1621.00;

        // Verifica se o formulário foi enviado
        if (isset($_POST['salario'])) {

            // Recebe o salário digitado
            $salario = $_POST['salario'];

            // Calcula quantos salários mínimos cabem no valor
            $quantidadeSalarios = floor($salario / $salarioMinimo);

            // Calcula o valor que sobra
            $resto = $salario - ($quantidadeSalarios * $salarioMinimo); 

            // Configura o formato de moeda brasileira
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

            // Exibe o título do resultado
            echo "<h2>Resultado da Análise</h2>";

            // Mostra o salário informado
            echo "<p>Salário: "  
                . numfmt_format_currency($padrao, $salario, "BRL") 
                . "</p>";

            // Mostra o salário mínimo
            echo "<p>Salário Mínimo: " 
                . numfmt_format_currency($padrao, $salarioMinimo, "BRL") 
                . "</p>";

            // Mostra o valor que sobra
            echo "<p>Sobra: " 
                . numfmt_format_currency($padrao, $resto, "BRL") 
                . "</p>";
        }

        ?>

        </form>

    </div>

</body>
</html>