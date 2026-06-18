<?php
// Inicia a sessao
session_start();
// Inclui o banco
require_once "../conexao.php";
// Bloqueia o acesso se o cliente nao estiver logado
if (!isset($_SESSION["cliente_id"])) { header("Location: login_cliente.php"); exit; }
// Busca todos os produtos cadastrados
$sql = "SELECT * FROM produtos ORDER BY id ASC";
// Prepara a consulta
$stmt = $conexao->prepare($sql);
// Executa a consulta
$stmt->execute();
// Pega todos os resultados
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Relaciona o nome do produto com a imagem da pasta img
function getImagem($nome) {
    // Mapeia o nome do produto para o nome do arquivo de imagem
    $mapa = ["bicicleta aro 29"=>"bike.webp","capacete"=>"capacete.webp","luva"=>"luva.webp","relógio"=>"relogio.webp","relogio"=>"relogio.webp","sapatilha"=>"sapatilha.webp","lanterna"=>"lanterna.webp"];
    // Retorna o nome do arquivo ou nulo se nao encontrar
    return $mapa[strtolower($nome)] ?? null;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - GaluBikeShop</title>
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
        <h1>Produtos</h1>
        <p>Escolha o produto que deseja comprar.</p>
    </div>
    <div class="produtos-grid">
        <?php foreach ($produtos as $produto): // Loop para cada produto ?>
            <?php $img = getImagem($produto["nome"]); // Pega o nome da imagem ?>
            <div class="produto-card">
                <div class="produto-img-box">
                    <?php if ($img): // Se a imagem existir ?>
                        <img src="../img/<?= $img // Mostra a imagem ?>" alt="<?= $produto["nome"] // Texto alternativo ?>">
                    <?php else: // Se nao existir ?>
                        <span style="color:var(--text-muted);font-size:.85rem">Sem imagem</span>
                    <?php endif; // Fim do if ?>
                </div>
                <div class="produto-info">
                    <div class="produto-nome"><?= $produto["nome"] // Mostra o nome do produto ?></div>
                    <div class="produto-categoria"><?= $produto["categoria"] // Mostra a categoria ?></div>
                    <div class="produto-preco">R$ <?= number_format($produto["preco"], 2, ",", ".") // Formata e mostra o preco ?></div>
                    <div class="produto-estoque">Estoque: <?= $produto["quantidade"] // Mostra o estoque ?> un.</div>
                </div>
                <div class="produto-footer">
                    <?php if ($produto["quantidade"] > 0): // Se houver estoque ?>
                        <a class="btn-comprar" href="comprar_produto.php?id=<?= $produto["id"] // Link para comprar com o id do produto ?>">Comprar</a>
                    <?php else: // Se nao houver estoque ?>
                        <span class="btn-indisponivel">Indisponível</span>
                    <?php endif; // Fim do if ?>
                </div>
            </div>
        <?php endforeach; // Fim do loop ?>
    </div>
    <a class="btn-voltar" href="area_cliente.php">← Voltar</a>
</div>
</body>
</html>
