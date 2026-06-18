<?php
// Inicia a sessao
session_start();
// Inclui a conexao
require_once "../conexao.php";
// Redireciona para o login se nao estiver logado
if (!isset($_SESSION["cliente_id"])) { header("Location: login_cliente.php"); exit; }
// Verifica se o id do produto foi enviado
if (!isset($_GET["id"])) { die("ID do produto não informado."); }
// Pega o id do cliente e do produto
$cliente_id = $_SESSION["cliente_id"];
$produto_id = $_GET["id"];
$mensagem = "";
// Busca as informacoes do produto
$sql = "SELECT * FROM produtos WHERE id = :id";
// Prepara a consulta
$stmt = $conexao->prepare($sql);
// Vincula o parametro
$stmt->bindParam(":id", $produto_id);
// Executa a consulta
$stmt->execute();
// Pega o resultado
$produto = $stmt->fetch(PDO::FETCH_ASSOC);
// Se o produto nao for encontrado
if (!$produto) { die("Produto não encontrado."); }
// Processa a compra
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulario
    $quantidade = $_POST["quantidade"];
    $forma_pagamento = $_POST["pagamento"];
    // Valida a quantidade
    if (empty($quantidade) || $quantidade <= 0) { $mensagem = "Informe uma quantidade válida."; }
    elseif ($quantidade > $produto["quantidade"]) { $mensagem = "Quantidade maior que o estoque disponível."; }
    else {
        // Calcula o valor total
        $valor_total = $produto["preco"] * $quantidade;
        // Registra a venda no banco
        $sqlVenda = "INSERT INTO vendas (cliente_id, produto_id, quantidade, valor_total, forma_pagamento) VALUES (:cliente_id, :produto_id, :quantidade, :valor_total, :forma_pagamento)";
        // Prepara a consulta
        $stmtVenda = $conexao->prepare($sqlVenda);
        // Vincula os parametros
        $stmtVenda->bindParam(":cliente_id", $cliente_id);
        $stmtVenda->bindParam(":produto_id", $produto_id);
        $stmtVenda->bindParam(":quantidade", $quantidade);
        $stmtVenda->bindParam(":valor_total", $valor_total);
        $stmtVenda->bindParam(":forma_pagamento", $forma_pagamento);
        // Se a venda for registrada com sucesso
        if ($stmtVenda->execute()) {
            // Atualiza o estoque do produto diminuindo a quantidade comprada
            $sqlEstoque = "UPDATE produtos SET quantidade = quantidade - :quantidade WHERE id = :produto_id";
            // Prepara a consulta
            $stmtEstoque = $conexao->prepare($sqlEstoque);
            // Vincula os parametros
            $stmtEstoque->bindParam(":quantidade", $quantidade);
            $stmtEstoque->bindParam(":produto_id", $produto_id);
            // Executa a atualizacao do estoque
            $stmtEstoque->execute();
            // Redireciona para a pagina de compras
            header("Location: minhas_compras.php");
            exit;
        }
        // Se der erro
        else {
            $mensagem = "Erro ao registrar compra.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Compra - GaluBikeShop</title>
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
    <div class="compra-card">
        <h1>Confirmar Compra</h1>
        <?php if (!empty($mensagem)): // Se a mensagem nao estiver vazia ?>
            <div class="mensagem erro"><?= $mensagem // Mostra a mensagem de erro ?></div>
        <?php endif; // Fim do if ?>
        <div class="compra-produto-nome"><?= $produto["nome"] // Mostra o nome do produto ?></div>
        <div class="compra-resumo">
            <p><span>Categoria</span><strong><?= $produto["categoria"] // Mostra a categoria ?></strong></p>
            <p><span>Preço unitário</span><strong>R$ <?= number_format($produto["preco"], 2, ",", ".") // Formata e mostra o preco ?></strong></p>
            <p><span>Estoque disponível</span><strong><?= $produto["quantidade"] // Mostra o estoque ?> un.</strong></p>
        </div>
        <form method="POST">
            <div class="form-grupo">
                <label>Quantidade</label>
                <input type="number" name="quantidade" min="1" max="<?= $produto["quantidade"] // Define o maximo como a quantidade em estoque ?>" value="1">
            </div>
            <div class="form-grupo">
                <label>Forma de pagamento</label>
                <select name="pagamento">
                    <option value="PIX">PIX</option>
                    <option value="Cartão">Cartão</option>
                    <option value="Dinheiro">Dinheiro</option>
                </select>
            </div>
            <div class="botao-area"><button type="submit">Confirmar Compra</button></div>
        </form>
        <a class="btn-voltar" href="produtos_cliente.php">← Voltar</a>
    </div>
</div>
</body>
</html>
