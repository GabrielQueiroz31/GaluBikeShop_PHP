<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S9_R1_AT1</title>
</head>
<body>
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
            padding: 60px 70px;
            border-radius: 16px;
            width: 100%;
            max-width: 700px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.12);
        }

        .card h1 {
            font-size: 1.8rem;
            margin-bottom: 8px;
            color: #1a1a1a;
        }

        .card .subtitle {
            color: #888;
            font-size: 0.95rem;
            margin-bottom: 36px;
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: bold;
            font-size: 0.9rem;
            color: #444;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 12px 14px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1rem;
            transition: border-color 0.2s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: #28a745;
            box-shadow: 0 0 0 3px rgba(40,167,69,0.15);
        }

        input[type="submit"] {
            margin-top: 30px;
            padding: 14px 0;
            width: 100%;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            letter-spacing: 0.5px;
            transition: background-color 0.2s;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .divider {
            border: none;
            border-top: 1px solid #e8e8e8;
            margin: 40px 0 30px;
        }

        .result h2 {
            font-size: 1.2rem;
            color: #1a1a1a;
            margin-bottom: 16px;
        }

        .result p {
            font-size: 0.97rem;
            color: #555;
            margin: 8px 0;
            padding: 10px 14px;
            background: #f8f9fa;
            border-radius: 6px;
        }

        .result p span {
            font-weight: bold;
            color: #222;
        }
    </style>

    <div class="card">
        <h1>Formulário de Contato</h1>
        <p class="subtitle">Preencha os campos abaixo e clique em Enviar.</p>

        <!-- Formulario com o POST -->
        <form method="POST" action="informacao.php">
            <label>Nome:</label>
            <input type="text" name="nome" id="nome">

            <label>E-mail:</label>
            <input type="email" name="email" id="email">

            <label>Mensagem:</label>
            <input type="text" name="msg" id="msg">

            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>