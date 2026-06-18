<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
</head>
<body>

<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $valor = $_POST["valor"] ?? 0;

    $Inicio = date("m-d-Y", strtotime("-7 days"));
    $Fim = date("m-d-Y");

    $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'' . $Inicio . '\'&@dataFinalCotacao=\'' . $Fim . '\'&$top=100&$format=json';

    $dados = json_decode(file_get_contents($url), true);

    $dolar = $dados['value'][0]['cotacaoCompra'];

    $resultado = $valor / $dolar;

    echo "<h2>Resultado da conversão</h2>";

    $padrao_brasil = numfmt_create('pt_BR', NumberFormatter::CURRENCY);
    $padrao_eua = numfmt_create('en_US', NumberFormatter::CURRENCY);

    echo "<p>Valor em Reais (R$): " . numfmt_format_currency($padrao_brasil, $valor, 'BRL') . "</p>";

    echo "<p><strong>Cotação: " . numfmt_format_currency($padrao_eua, $dolar, 'USD') . "</strong></p>";

    echo "<p><strong>Resultado: " . numfmt_format_currency($padrao_eua, $resultado, 'USD') . "</strong></p>";
}
?>

</body>
</html>