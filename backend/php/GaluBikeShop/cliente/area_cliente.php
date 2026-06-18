<?php
// Inicia a sessao
session_start();
// Bloqueia o acesso se o cliente nao estiver logado
if (!isset($_SESSION["cliente_id"])) { header("Location: login_cliente.php"); exit; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Cliente - GaluBikeShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<nav class="topnav">
    <a href="area_cliente.php" class="topnav-brand">
        <img src="../img/Logo.png" alt="Logo"> GaluBikeShop
    </a>
    <div class="topnav-right">
        <span class="topnav-user"><?= $_SESSION["cliente_nome"] // Mostra o nome do cliente ?></span>
        <a href="logout_cliente.php" class="topnav-logout">Sair</a>
    </div>
</nav>
<div class="page page-nav">
    <div class="page-header">
        <h1>Olá, <?= $_SESSION["cliente_nome"] // Mostra o nome do cliente ?>!</h1>
        <p>O que você quer fazer hoje?</p>
    </div>
    <ul class="menu-painel">
        <li><a href="produtos_cliente.php">Ver Produtos</a></li>
        <li><a href="minhas_compras.php">Minhas Compras</a></li>
    </ul>
</div>
</body>
</html>
