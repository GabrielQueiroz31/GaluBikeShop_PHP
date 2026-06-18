<?php
session_start();
require_once "../conexao.php";
// Bloqueia o acesso se o admin nao estiver logado.
if (!isset($_SESSION["admin_id"])) { header("Location: Login_admin.php"); exit; }
if (!isset($_GET["id"])) { die("ID do produto não informado."); }
$id = $_GET["id"];
// Busca o produto que sera editado.
$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$produto = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$produto) { die("Produto não encontrado."); }
$mensagem = "";
// Atualiza o produto quando o formulario e enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"]; $categoria = $_POST["categoria"];
    $preco = $_POST["preco"]; $quantidade = $_POST["quantidade"];
    // Valida campos obrigatorios e valores numericos.
    if (empty($nome) || empty($categoria) || empty($preco) || $quantidade === "") { $mensagem = "Preencha todos os campos!"; }
    elseif ($preco <= 0) { $mensagem = "O preço deve ser maior que zero!"; }
    elseif ($quantidade < 0) { $mensagem = "A quantidade não pode ser negativa!"; }
    else {
        // Salva as alteracoes no banco.
        $sql = "UPDATE produtos SET nome=:nome, categoria=:categoria, preco=:preco, quantidade=:quantidade WHERE id=:id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":nome", $nome); $stmt->bindParam(":categoria", $categoria);
        $stmt->bindParam(":preco", $preco); $stmt->bindParam(":quantidade", $quantidade);
        $stmt->bindParam(":id", $id);
        if ($stmt->execute()) { header("Location: listar_produto.php"); exit; }
        else { $mensagem = "Erro ao atualizar produto."; }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto - GaluBikeShop</title>
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
    <div class="form-card">
        <h1>Editar Produto</h1>
        <p class="text-muted">Altere os dados do produto selecionado.</p>
        <?php if (!empty($mensagem)): ?><div class="mensagem erro"><?= $mensagem ?></div><?php endif; ?>
        <form method="POST">
            <div class="form-grupo"><label>Nome</label><input type="text" name="nome" value="<?= htmlspecialchars($produto["nome"]) ?>"></div>
            <div class="form-grupo"><label>Categoria</label><input type="text" name="categoria" value="<?= htmlspecialchars($produto["categoria"]) ?>"></div>
            <div class="form-row">
                <div class="form-grupo"><label>Preço (R$)</label><input type="number" step="0.01" name="preco" value="<?= $produto["preco"] ?>"></div>
                <div class="form-grupo"><label>Quantidade</label><input type="number" name="quantidade" value="<?= $produto["quantidade"] ?>"></div>
            </div>
            <div class="botao-area"><button type="submit">Salvar Alterações</button></div>
        </form>
        <a class="btn-voltar" href="listar_produto.php">← Voltar</a>
    </div>
</div>
</body>
</html>
