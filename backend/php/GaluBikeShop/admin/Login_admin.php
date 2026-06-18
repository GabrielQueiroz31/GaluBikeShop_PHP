<?php
session_start();
require_once "../conexao.php";

// Guarda mensagens de erro do login.
$mensagem = "";

// Processa o login quando o formulario e enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Valida se os campos foram preenchidos.
    if (empty($email) || empty($senha)) { $mensagem = "Preencha todos os campos!"; }
    else {
        // Busca o administrador pelo e-mail.
        $sql = "SELECT * FROM administradores WHERE email = :email";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Salva os dados do admin na sessao.
        if ($admin && $senha == $admin["senha"]) {
            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["admin_nome"] = $admin["nome"];
            header("Location: painel_admin.php"); exit;
        } else { $mensagem = "E-mail ou senha incorretos!"; }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - GaluBikeShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="logo"><img src="../img/Logo.png" alt="Logo GaluBikeShop"></div>
        <h1>Admin</h1>
        <p>Acesso restrito ao administrador.</p>
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem erro"><?= $mensagem ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-grupo">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="admin@email.com">
            </div>
            <div class="form-grupo">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="••••••••">
            </div>
            <div class="botao-area"><button type="submit">Entrar</button></div>
        </form>
        <a class="voltar-link" href="../index.php">← Voltar ao início</a>
    </div>
</div>
</body>
</html>
