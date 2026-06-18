<?php
// Inicia a sessao
session_start();
// Inclui a conexao com o banco
require_once "../conexao.php";
$mensagem = "";
// Realiza o login quando o formulario for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulario
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    // Verifica se os campos estao vazios
    if (empty($email) || empty($senha)) {
        // Define a mensagem de erro
        $mensagem = "Preencha todos os campos!";
    } else {
        // Busca o cliente pelo email no banco
        $sql = "SELECT * FROM clientes WHERE email = :email";
        // Prepara a consulta
        $stmt = $conexao->prepare($sql);
        // Vincula o parametro
        $stmt->bindParam(":email", $email);
        // Executa a consulta
        $stmt->execute();
        // Pega o resultado
        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        // Confere se o cliente existe e se a senha esta correta
        if ($cliente && password_verify($senha, $cliente["senha"])) {
            // Salva os dados na sessao e redireciona
            $_SESSION["cliente_id"] = $cliente["id"];
            $_SESSION["cliente_nome"] = $cliente["nome"];
            // Redireciona para a area do cliente
            header("Location: area_cliente.php");
            exit;
        }
        // Se o login falhar
        else {
            // Define a mensagem de erro
            $mensagem = "E-mail ou senha incorretos!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GaluBikeShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="logo"><img src="../img/Logo.png" alt="Logo GaluBikeShop"></div>
        <h1>Entrar</h1>
        <p>Acesse sua conta de cliente.</p>
        <?php if (!empty($mensagem)): // Se a mensagem nao estiver vazia ?>
            <div class="mensagem erro"><?= $mensagem // Mostra a mensagem de erro ?></div>
        <?php endif; // Fim do if ?>
        <form method="POST">
            <div class="form-grupo">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="seu@email.com">
            </div>
            <div class="form-grupo">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="••••••••">
            </div>
            <div class="link"><a href="cadastro_cliente.php">Criar conta</a></div>
            <div class="botao-area"><button type="submit">Entrar</button></div>
        </form>
        <a class="voltar-link" href="../index.php">← Voltar ao início</a>
    </div>
</div>
</body>
</html>
