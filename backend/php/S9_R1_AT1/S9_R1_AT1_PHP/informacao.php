<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informações Recebidas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            background-color: #f0f2f5;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
            box-sizing: border-box;
        }

        .card {
            background: #fff;
            padding: 50px 60px;
            border-radius: 16px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.12);
        }

        h1 {
            color: #1a1a1a;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .info {
            background: #f8f9fa;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: #555;
        }

        .info span {
            font-weight: bold;
            color: #222;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="card">

        <h1>Informações Recebidas</h1>
        <p class="subtitle">Dados enviados pelo formulário.</p>

        <?php

            $nome = $_POST["nome"] ?? "";
            $email = $_POST["email"] ?? "";
            $msg = $_POST["msg"] ?? "";

            echo "<div class='info'><span>Nome:</span> $nome</div>";
            echo "<div class='info'><span>E-mail:</span> $email</div>";
            echo "<div class='info'><span>Mensagem:</span> $msg</div>";

        ?>

        <a href="index.php" class="btn">Voltar</a>

    </div>

</body>
</html>