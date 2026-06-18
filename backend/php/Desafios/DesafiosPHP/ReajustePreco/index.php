<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reajustador de Preços</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <h1>Reajustador de Preços</h1>

        <?php
        $percentual = $_POST['percentual'] ?? 15;
        ?>

        <form method="POST">

            <p>Preço do Produto:</p>
            <input type="number" name="preco" step="0.01" required>

            <p>
                Percentual de Reajuste:
                <strong id="valorPercentual"><?= $percentual ?>%</strong>
            </p>

            <input 
                type="range"
                name="percentual"
                min="0"
                max="100"
                value="<?= $percentual ?>"
                oninput="valorPercentual.innerText = this.value + '%'"
            >

            <button type="submit">Calcular Reajuste</button>

        </form>

        <hr>

        <?php

            if (isset($_POST['preco']) && $_POST['preco'] !== "") {

                $preco = floatval($_POST['preco']);
                $percentual = floatval($_POST['percentual']);

                $novoPreco = $preco + ($preco * $percentual / 100);

                $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY);

                echo "<div class='resultado'>";

                echo "<h2>Resultado do Reajuste</h2>";

                echo "<p>O produto que custava <strong>"
                    . numfmt_format_currency($padrao, $preco, "BRL")
                    . "</strong> com um reajuste de <strong>"
                    . number_format($percentual, 2, ',', '.')
                    . "%</strong> passará a custar <strong>"
                    . numfmt_format_currency($padrao, $novoPreco, "BRL")
                    . "</strong>.</p>";

                echo "</div>";
            }

            ?>

    </div>

</body>
</html>