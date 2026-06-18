<?php
// Dados de acesso ao banco PostgreSQL.
$host = "localhost";
$porta = "5432";
$banco = "galubikeshop";
$usuario = "postgres";
$senha = "postgres";
// Cria a conexao e ativa erros do PDO.
try {
    // Tenta criar uma nova conexao PDO
    $conexao = new PDO("pgsql:host=$host;port=$porta;dbname=$banco", $usuario, $senha);
    // Define o modo de erro para lancar excecoes
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    // Se a conexao falhar, encerra o script e mostra o erro
    die("Erro na conexão: " . $erro->getMessage());
}
?>
