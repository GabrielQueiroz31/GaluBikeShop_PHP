<?php
// Inicia a sessao
session_start();
// Inclui o banco
require_once "../conexao.php";
// Bloqueia o acesso se nao estiver logado
if (!isset($_SESSION["cliente_id"])) { header("Location: login_cliente.php"); exit; }
// Pega o id do cliente da sessao
$cliente_id = $_SESSION["cliente_id"];
// Busca o historico de vendas do cliente atual
$sql = "SELECT vendas.id, produtos.nome AS produto, vendas.quantidade, vendas.valor_total, vendas.forma_pagamento, vendas.data_venda
        FROM vendas INNER JOIN produtos ON vendas.produto_id = produtos.id
        WHERE vendas.cliente_id = :cliente_id ORDER BY vendas.data_venda DESC";
// Prepara a consulta
$stmt = $conexao->prepare($sql);
// Vincula o parametro
$stmt->bindParam(":cliente_id", $cliente_id);
// Executa a consulta
$stmt->execute();
// Pega todos os resultados
$compras = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Compras - GaluBikeShop</title>
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
        <h1>Minhas Compras</h1>
        <p>Histórico de todas as suas compras.</p>
    </div>
    <?php if (count($compras) > 0): // Se houver compras ?>
        <div class="lista-cards">
            <?php foreach ($compras as $compra): // Loop para cada compra ?>
                <?php $data = date("d/m/Y H:i", strtotime($compra["data_venda"])); // Formata a data ?>
                <div class="info-card">
                    <div class="info-card-topo">
                        <div>
                            <div class="info-card-titulo"><?= $compra["produto"] // Mostra o nome do produto ?></div>
                            <div class="info-card-sub">Compra #<?= $compra["id"] // Mostra o id da compra ?> · <?= $data // Mostra a data formatada ?></div>
                        </div>
                        <div class="info-card-valor">R$ <?= number_format($compra["valor_total"], 2, ",", ".") // Formata e mostra o valor total ?></div>
                    </div>
                    <div class="info-card-grid">
                        <div class="info-dado"><span>Quantidade</span><strong><?= $compra["quantidade"] // Mostra a quantidade ?></strong></div>
                        <div class="info-dado"><span>Pagamento</span><strong><?= $compra["forma_pagamento"] // Mostra a forma de pagamento ?></strong></div>
                        <div class="info-dado"><span>Data</span><strong><?= $data // Mostra a data formatada ?></strong></div>
                    </div>
                </div>
            <?php endforeach; // Fim do loop ?>
        </div>
    <?php else: // Se nao houver compras ?>
        <div class="info-card">
            <div class="info-card-titulo">Nenhuma compra encontrada</div>
            <div class="info-card-sub">Você ainda não realizou nenhuma compra.</div>
        </div>
    <?php endif; // Fim do if ?>
    <a class="btn-voltar" href="area_cliente.php">← Voltar</a>
</div>
</body>
</html>
