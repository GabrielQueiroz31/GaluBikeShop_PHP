<?php
session_start();
require_once "../conexao.php";

// Bloqueia o acesso se o admin nao estiver logado.
if (!isset($_SESSION["admin_id"])) {
    header("Location: login_admin.php");
    exit;
}

// Busca todos os produtos cadastrados.
$sql = "SELECT * FROM produtos ORDER BY id ASC";
$stmt = $conexao->prepare($sql);
$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - GaluBikeShop</title>

    <link rel="stylesheet" href="../style.css">
</head>
<body>

<nav class="topnav">
    <a href="painel_admin.php" class="topnav-brand">
        <img src="../img/Logo.png" alt="Logo">
        GaluBikeShop
    </a>

    <div class="topnav-right">
        <span class="topnav-badge">Admin</span>
        <span class="topnav-user"><?php echo $_SESSION["admin_nome"]; ?></span>
        <a href="logout_admin.php" class="topnav-logout">Sair</a>
    </div>
</nav>

<div class="page page-nav">

    <div class="page-header">
        <h1>Produtos</h1>
        <p>Gerencie os produtos disponíveis na loja.</p>
    </div>

    <?php if (isset($_GET["erro"]) && $_GET["erro"] == "produto_vendido"): ?>
        <p class="mensagem erro">
            Este produto não pode ser excluído porque já possui vendas registradas.
        </p>
    <?php endif; ?>

    <?php if (isset($_GET["erro"]) && $_GET["erro"] == "erro_excluir"): ?>
        <p class="mensagem erro">
            Erro ao excluir produto.
        </p>
    <?php endif; ?>

    <?php if (isset($_GET["sucesso"]) && $_GET["sucesso"] == "produto_excluido"): ?>
        <p class="mensagem sucesso">
            Produto excluído com sucesso.
        </p>
    <?php endif; ?>

    <div class="acoes-topo">
        <a href="cadastrar_produto.php" class="btn-novo">+ Novo produto</a>
    </div>

    <div class="tabela-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($produtos as $produto): ?>
                    <tr>
                        <td><?php echo $produto["id"]; ?></td>

                        <td>
                            <strong><?php echo $produto["nome"]; ?></strong>
                        </td>

                        <td><?php echo $produto["categoria"]; ?></td>

                        <td>
                            R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?>
                        </td>

                        <td>
                            <?php if ($produto["quantidade"] > 0): ?>
                                <span class="status estoque-ok">
                                    <?php echo $produto["quantidade"]; ?> em estoque
                                </span>
                            <?php else: ?>
                                <span class="status estoque-zero">
                                    Sem estoque
                                </span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <div class="acoes">
                                <a 
                                    href="editar_produto.php?id=<?php echo $produto["id"]; ?>" 
                                    class="acao-editar"
                                >
                                    Editar
                                </a>

                                <a 
                                    href="confirmar_excluir_produto.php?id=<?php echo $produto["id"]; ?>" 
                                    class="acao-excluir"
                                >
                                    Excluir
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a class="btn-voltar" href="painel_admin.php">← Voltar ao painel</a>

</div>

</body>
</html>
