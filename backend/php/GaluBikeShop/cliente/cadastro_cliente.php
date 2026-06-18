<?php
// Inclui o arquivo de conexao
require_once "../conexao.php";
// Guarda mensagens de validacao do cadastro
$mensagem = "";
// Cadastra o cliente quando o formulario e enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulario
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];
    // Verifica campos obrigatorios
    if (empty($nome) || empty($email) || empty($telefone) || empty($senha)) {
        // Define a mensagem de erro
        $mensagem = "Preencha todos os campos!";
    } else {
        // Confere se o e-mail ja existe
        $sqlVerificar = "SELECT id FROM clientes WHERE email = :email";
        // Prepara a consulta
        $stmtVerificar = $conexao->prepare($sqlVerificar);
        // Vincula o parametro
        $stmtVerificar->bindParam(":email", $email);
        // Executa a consulta
        $stmtVerificar->execute();
        // Se encontrou um resultado
        if ($stmtVerificar->rowCount() > 0) {
            // Define a mensagem de erro
            $mensagem = "Este e-mail já está cadastrado!";
        } else {
            // Criptografa a senha antes de salvar
            $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
            // SQL para inserir o novo cliente
            $sql = "INSERT INTO clientes (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)";
            // Prepara a consulta
            $stmt = $conexao->prepare($sql);
            // Vincula os parametros
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":senha", $senhaCriptografada);
            // Se a execucao for bem sucedida
            if ($stmt->execute()) {
                // Redireciona para a pagina de login
                header("Location: login_cliente.php");
                exit;
            }
            // Se der erro
            else {
                $mensagem = "Erro ao cadastrar cliente!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta - GaluBikeShop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="logo"><img src="../img/Logo.png" alt="Logo GaluBikeShop"></div>
        <h1>Criar Conta</h1>
        <p>Preencha os dados para se cadastrar.</p>
        <?php if (!empty($mensagem)): // Se a mensagem nao estiver vazia ?>
            <div class="mensagem erro"><?= $mensagem // Mostra a mensagem de erro ?></div>
        <?php endif; // Fim do if ?>
        <form method="POST">
            <div class="form-grupo">
                <label>Nome completo</label>
                <input type="text" name="nome" placeholder="Seu nome">
            </div>
            <div class="form-grupo">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="seu@email.com">
            </div>
            <div class="form-grupo">
                <label>Telefone</label>
                <input type="text" name="telefone" placeholder="(19) 99999-9999">
            </div>
            <div class="form-grupo">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="••••••••">
            </div>
            <div class="botao-area"><button type="submit">Criar conta</button></div>
        </form>
        <div class="link" style="margin-top:16px"><a href="login_cliente.php">Já tenho uma conta</a></div>
        <a class="voltar-link" href="../index.php">← Voltar ao início</a>
    </div>
</div>
</body>
</html>
