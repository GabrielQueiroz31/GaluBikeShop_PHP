<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: index.php');
    exit();
}

$tema = $_COOKIE['tema'] ?? 'claro';

$visitas = $_COOKIE['visitas'] ?? 0;

if (!isset($_GET['tema'])) {
    $visitas++;

    setcookie(
        'visitas',
        $visitas,
        time() + (86400 * 30)
    );
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Informações Recebidas</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="<?php echo $tema; ?>">

<div class="card">

    <?php include 'header.php'; ?>

    <h1>Informações Recebidas</h1>

    <p>Dados enviados pelo formulário.</p>

    <div class="info">
        <strong>Nome:</strong>
        <?php echo $_SESSION['nome']; ?>
    </div>
    <br>

    <div class="info">
        <strong>E-mail:</strong>
        <?php echo $_SESSION['email']; ?>
    </div>
    <br>

    <div class="info">
        <strong>Mensagem:</strong>
        <?php echo $_SESSION['mensagem']; ?>
    </div>
    <br>

    <div class="info">
        <strong>Visitas:</strong>
        Esta é a <?php echo $visitas; ?>ª vez que você visita o site.
    </div>

    <div class="temas">
        <a class="claro-btn" href="tema.php?modo=claro">Tema Claro</a>
        <a class="escuro-btn" href="tema.php?modo=escuro">Tema Escuro</a>
    </div>

    <a class="btn" href="index.php">Voltar</a>

    <?php include 'footer.php'; ?>

</div>

</body>
</html>