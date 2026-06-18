<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador de Números</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>Sorteador de Números</h1>

        <?php 

        // Número aleatórios
        $numero = mt_rand(1, 100);

        echo "<p>Número sorteado:</p>";
        echo "<strong>$numero</strong>";

        echo "<hr>";

        // Mega-Sena
        echo "<h2>Mega-Sena</h2>";

        $numeros = [];

        while (count($numeros) < 6) {

            $sorteio = mt_rand(1, 60);

            if (!in_array($sorteio, $numeros)) {

                $numeros[] = $sorteio;
            }
        }

        sort($numeros);

        foreach ($numeros as $n) {

            echo str_pad($n, 2, "0", STR_PAD_LEFT) . " ";
        }

        ?>

        <br><br>

        <form method="POST">
            <button type="submit">Sortear Novamente</button>
        </form>

    </div>

</body>
</html>