<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $setor = "TI";

    switch ($setor) {
        case "TI":
            echo "Setor de Tecnologia";
            break;
        case "RH":
            echo "Recursos Humanos";
            break;
        case "Financeiro":
            echo "Setor Financeiro";
            break;
        default:
            echo "Setor não identificado";
    }
    ?>

</body>
</html>