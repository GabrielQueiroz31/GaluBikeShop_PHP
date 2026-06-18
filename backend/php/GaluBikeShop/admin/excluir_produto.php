<?php

session_start();
require_once "../conexao.php";

// Bloqueia o acesso se o admin nao estiver logado.
if (!isset($_SESSION["admin_id"])) {
    header("Location: login_admin.php");
    exit;
}

// Recebe o ID enviado pela confirmacao.
if (isset($_POST["id"])) {
    $id = $_POST["id"];
} elseif (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    die("ID do produto não informado.");
}

try {
    // Exclui vendas e produto dentro da mesma transacao.
    $conexao->beginTransaction();

    $sqlVendas = "DELETE FROM vendas WHERE produto_id = :id";
    $stmtVendas = $conexao->prepare($sqlVendas);
    $stmtVendas->bindParam(":id", $id);
    $stmtVendas->execute();

    $sqlProduto = "DELETE FROM produtos WHERE id = :id";
    $stmtProduto = $conexao->prepare($sqlProduto);
    $stmtProduto->bindParam(":id", $id);
    $stmtProduto->execute();

    $conexao->commit();

    header("Location: listar_produto.php?sucesso=produto_excluido");
    exit;

} catch (PDOException $erro) {
    // Desfaz tudo se algum erro acontecer.
    $conexao->rollBack();

    header("Location: listar_produto.php?erro=erro_excluir");
    exit;
}

?>
