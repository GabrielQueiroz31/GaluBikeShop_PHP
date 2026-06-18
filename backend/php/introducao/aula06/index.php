<!-- Crie uma algoritmo em PHP usando o for para fazer a tabuada de um numero. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>Tabuada do cinco</thead>
        <tr>
            <th>Número</th>
            <th>Resultado</th>
        </tr>
        <?php 
        for ($i = 1; $i <= 10; $i++){
            echo "<tr><td>$i x 5</td><td>" . $i*5 . "</td></tr>";
        }
        ?>
    </table>
</body>
</html>