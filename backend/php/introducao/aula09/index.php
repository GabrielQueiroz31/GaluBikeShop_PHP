<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <label name="nome">Nome:</label>
        <input type="text" name="nome">
        <input type="submit" value="Enviar">
    </form>

    <?php
        $nome = $_GET["nome"];
        var_dump($_GET);
        echo "Nome informado: $nome";
        
    ?>


</body>
</html>