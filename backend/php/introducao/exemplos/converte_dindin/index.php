<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Conversor de Moedas</h1>
    <form action="processa.php" method="post">
        
        <label for="valor">Valor em Reais (R$):</label>
        
        <input type="number" id="valor" name="valor" step="0.01" required>
        <br><br>
        <input type="submit" value="Converter">
    </form>
</body>
</html>