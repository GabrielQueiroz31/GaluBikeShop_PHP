<?php
// Inicia a sessao
session_start();
// Inclui a conexao
require_once "../conexao.php";
// Bloqueia o acesso se o admin nao estiver logado.
if (!isset($_SESSION["admin_id"])) { header("Location: Login_admin.php"); exit; }
// Guarda mensagens de validacao.
$mensagem = "";
// Cadastra o produto quando o formulario e enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulario
    $nome = $_POST["nome"]; $categoria = $_POST["categoria"];
    $preco = $_POST["preco"]; $quantidade = $_POST["quantidade"];
    // Valida campos obrigatorios e valores numericos.
    if (empty($nome) || empty($categoria) || empty($preco) || $quantidade === "") { $mensagem = "Preencha todos os campos!"; }
    elseif ($preco <= 0) { $mensagem = "O preço deve ser maior que zero!"; }
    elseif ($quantidade < 0) { $mensagem = "A quantidade não pode ser negativa!"; }
    else {
        // Insere o novo produto no banco.
        $sql = "INSERT INTO produtos (nome, categoria, preco, quantidade) VALUES (:nome, :categoria, :preco, :quantidade)";
        // Prepara a consulta
        $stmt = $conexao->prepare($sql);
        // Vincula os parametros
        $stmt->bindParam(":nome", $nome); $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":preco", $preco); $stmt->bindParam(":quantidade", $quantidade);
        // Se a execucao for bem sucedida
        if ($stmt->execute()) {
            // Redireciona para a lista de produtos
            header("Location: listar_produto.php");
            exit;
        } else {
            // Define a mensagem de erro
            $mensagem = "Erro ao cadastrar produto.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto - GaluBikeShop</title>
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
        <span class="topnav-user"><?= $_SESSION["admin_nome"] // Mostra o nome do admin ?></span>
        <a href="logout_admin.php" class="topnav-logout">Sair</a>
    </div>
</nav>
<div class="page page-nav">
    <div class="form-card">
        <h1>Novo Produto</h1>
        <p class="text-muted">Preencha os dados para adicionar um produto ao estoque.</p>
        <?php if (!empty($mensagem)): // Se a mensagem nao estiver vazia ?><div class="mensagem erro"><?= $mensagem // Mostra a mensagem de erro ?></div><?php endif; // Fim do if ?>
        <form method="POST">
            <div class="form-grupo"><label>Nome</label><input type="text" name="nome" placeholder="Ex: Capacete MTB"></div>
            <div class="form-grupo"><label>Categoria</label><input type="text" name="categoria" placeholder="Ex: Proteção"></div>
            <div class="form-row">
                <div class="form-grupo"><label>Preço (R$)</label><input type="number" step="0.01" name="preco" placeholder="0,00"></div>
                <div class="form-grupo"><label>Quantidade</label><input type="number" name="quantidade" placeholder="0"></div>
            </div>
            <div class="botao-area"><button type="submit">Cadastrar Produto</button></div>
        </form>
        <a class="btn-voltar" href="listar_produto.php">← Voltar</a>
    </div>
</div>
</body>
</html>
