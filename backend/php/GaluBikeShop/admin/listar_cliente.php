<?php
session_start();
require_once "../conexao.php";

// Bloqueia o acesso se o admin nao estiver logado.
if (!isset($_SESSION["admin_id"])) { header("Location: Login_admin.php"); exit; }

// Busca os clientes cadastrados.
$sql = "SELECT id, nome, email, telefone FROM clientes ORDER BY id ASC";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - GaluBikeShop</title>
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
        <h1>Clientes</h1>
        <p>Clientes cadastrados no sistema.</p>
    </div>
    <div class="lista-cards">
        <?php foreach ($clientes as $cliente): ?>
            <div class="info-card">
                <div class="info-card-topo">
                    <div>
                        <div class="info-card-titulo"><?= $cliente["nome"] ?></div>
                        <div class="info-card-sub">Cliente #<?= $cliente["id"] ?></div>
                    </div>
                </div>
                <div class="info-card-grid">
                    <div class="info-dado"><span>E-mail</span><strong><?= $cliente["email"] ?></strong></div>
                    <div class="info-dado"><span>Telefone</span><strong><?= $cliente["telefone"] ?></strong></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a class="btn-voltar" href="painel_admin.php">← Voltar ao painel</a>
</div>
</body>
</html>
