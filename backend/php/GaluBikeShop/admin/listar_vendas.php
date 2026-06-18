<?php
session_start();
require_once "../conexao.php";

// Bloqueia o acesso se o admin nao estiver logado.
if (!isset($_SESSION["admin_id"])) { header("Location: Login_admin.php"); exit; }

// Busca as vendas junto com cliente e produto.
$sql = "SELECT vendas.id, clientes.nome AS cliente, produtos.nome AS produto, vendas.quantidade, vendas.valor_total, vendas.forma_pagamento, vendas.data_venda
        FROM vendas
        INNER JOIN clientes ON vendas.cliente_id = clientes.id
        INNER JOIN produtos ON vendas.produto_id = produtos.id
        ORDER BY vendas.data_venda DESC";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$vendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas - GaluBikeShop</title>
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
        <h1>Vendas</h1>
        <p>Histórico geral de vendas da loja.</p>
    </div>
    <?php if (count($vendas) > 0): ?>
        <div class="lista-cards">
            <?php foreach ($vendas as $venda): ?>
                <?php $data = date("d/m/Y H:i", strtotime($venda["data_venda"])); ?>
                <div class="info-card">
                    <div class="info-card-topo">
                        <div>
                            <div class="info-card-titulo"><?= $venda["produto"] ?></div>
                            <div class="info-card-sub">Venda #<?= $venda["id"] ?> · <?= $venda["cliente"] ?></div>
                        </div>
                        <div class="info-card-valor">R$ <?= number_format($venda["valor_total"], 2, ",", ".") ?></div>
                    </div>
                    <div class="info-card-grid">
                        <div class="info-dado"><span>Quantidade</span><strong><?= $venda["quantidade"] ?></strong></div>
                        <div class="info-dado"><span>Pagamento</span><strong><?= $venda["forma_pagamento"] ?></strong></div>
                        <div class="info-dado"><span>Data</span><strong><?= $data ?></strong></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="info-card">
            <div class="info-card-titulo">Nenhuma venda realizada</div>
            <div class="info-card-sub">Ainda não há vendas cadastradas no sistema.</div>
        </div>
    <?php endif; ?>
    <a class="btn-voltar" href="painel_admin.php">← Voltar ao painel</a>
</div>
</body>
</html>
