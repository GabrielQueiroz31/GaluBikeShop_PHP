<?php
session_start();

// Bloqueia o acesso se o admin nao estiver logado.
if (!isset($_SESSION["admin_id"])) { header("Location: Login_admin.php"); exit; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Admin - GaluBikeShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<nav class="topnav">
    <a href="painel_admin.php" class="topnav-brand">
        <img src="../img/Logo.png" alt="Logo"> GaluBikeShop
    </a>
    <div class="topnav-right">
        <span class="topnav-badge">Admin</span>
        <span class="topnav-user"><?= $_SESSION["admin_nome"] ?></span>
        <a href="logout_admin.php" class="topnav-logout">Sair</a>
    </div>
</nav>
<div class="page page-nav">
    <div class="page-header">
        <h1>Painel</h1>
        <p>Bem-vindo, <?= $_SESSION["admin_nome"] ?>. O que deseja gerenciar?</p>
    </div>
    <ul class="menu-painel">
        <li><a href="listar_cliente.php">Clientes</a></li>
        <li><a href="listar_produto.php">Produtos</a></li>
        <li><a href="listar_vendas.php">Vendas</a></li>
        <li><a href="logout_admin.php" class="sair-link">Sair</a></li>
    </ul>
</div>
</body>
</html>
