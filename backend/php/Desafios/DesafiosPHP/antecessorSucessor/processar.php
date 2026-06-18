<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>

    <link rel="stylesheet" href="css/processar.css">
</head>
<body>
    <form action="index.php" method="post">
        <div class="card">
            <?php 

            $numero = $_POST['numero'];
            $antecessor = $numero - 1;
            $sucessor = $numero + 1;

            echo "<h2>Resultado:</h2>";
            echo "<p>O número digitado foi: <strong>$numero</strong></p>";
            echo "<p>O seu antecessor é: $antecessor</p>";
            echo "<p>O seu sucessor é: $sucessor</p>";

            ?>

            <button>Voltar</button>
        </div>
    </form>

</body>
</html>