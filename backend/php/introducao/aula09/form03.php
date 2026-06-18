<html lang="en">
<head>
    <meta content="width=device-width, initial-scale=1.0">
    <title>Cadastro Cliente</title>
</head>
<body>
    <form method="POST">
        <label>Nome: </label>
        <input type="text" name="nome" id="nome"> <br>
        <label>E-mail: </label>
        <input type="email" name="email" id="email"> <br>
        <label>Mensagem: </label>
        <input type="text" name="msg" id="msg"> <br>
        <input type="reset" value="Limpar">
        <input type="submit" value="Enviar">

    </form>
    <?php
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $mensagem = $_POST["msg"];

        echo "<h2>Dados recebidos</h2>";
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "Mensagem: $mensagem";
    ?>

</body>