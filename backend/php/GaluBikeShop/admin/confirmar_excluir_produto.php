<?php

session_start();
require_once "../conexao.php";

// Bloqueia o acesso se o admin nao estiver logado.
if (!isset($_SESSION["admin_id"])) {
    header("Location: login_admin.php");
    exit;
}

if (!isset($_GET["id"])) {
    die("ID do produto não informado.");
}

$id = $_GET["id"];

// Busca os dados do produto.
$sql = "SELECT * FROM produtos WHERE id = :id";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();

$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die("Produto não encontrado.");
}

// Conta quantas vendas estao ligadas ao produto.
$sqlVendas = "SELECT COUNT(*) AS total FROM vendas WHERE produto_id = :id";
$stmtVendas = $conexao->prepare($sqlVendas);
$stmtVendas->bindParam(":id", $id);
$stmtVendas->execute();

$resultado = $stmtVendas->fetch(PDO::FETCH_ASSOC);
$totalVendas = $resultado["total"];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Confirmar Exclusão - GaluBikeShop</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<div class="container">
    <div class="card">

        <h1>Excluir Produto</h1>

        <p>Você está prestes a excluir:</p>

        <br>

        <div class="info-dado">
            <span>Produto</span>
            <strong><?php echo $produto["nome"]; ?></strong>
        </div>

        <br>

        <div class="info-dado">
            <span>Categoria</span>
            <strong><?php echo $produto["categoria"]; ?></strong>
        </div>

        <br>

        <div class="info-dado">
            <span>Preço</span>
            <strong>R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?></strong>
        </div>

        <br>

        <?php if ($totalVendas > 0): ?>
            <p class="mensagem erro">
                Atenção: este produto possui <?php echo $totalVendas; ?> venda(s).
                Se confirmar, as vendas relacionadas também serão apagadas.
            </p>
        <?php else: ?>
            <p class="mensagem sucesso">
                Este produto não possui vendas registradas.
            </p>
        <?php endif; ?>

        <form method="POST" action="excluir_produto.php">
            <input type="hidden" name="id" value="<?php echo $produto["id"]; ?>">

            <button type="submit">
                Confirmar Exclusão
            </button>
        </form>

        <a href="listar_produto.php" class="btn-voltar">
            Cancelar
        </a>

    </div>
</div>

</body>
</html>
