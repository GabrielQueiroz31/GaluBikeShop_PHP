<?php
session_start();

if (isset($_POST['nome'])) {
    $_SESSION['nome'] = $_POST['nome'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['mensagem'] = $_POST['mensagem'];

    header('Location: perfil.php');
    exit();
}

$tema = $_COOKIE['tema'] ?? 'claro';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Empresa XPTO</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="<?php echo $tema; ?>">

<div class="card">

    <?php include 'header.php'; ?>

    <p>Sistema de contato</p>

    <form method="POST">

    <input type="text" name="nome" placeholder="Seu nome" required>

    <input type="email" name="email" placeholder="Seu email" required>

    <textarea name="mensagem" placeholder="Digite sua mensagem" required></textarea>

    <button type="submit">
        Enviar
    </button>

</form>

<a class="btn" href="perfil.php">
    Ir para os dados enviados
</a>

</div>

</body>
</html>