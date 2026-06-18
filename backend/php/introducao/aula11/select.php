<?php 

// Importa o arquivo de conexão com o banco de dados
// Esse arquivo precisa ter a variável $conexao criada com PDO
require_once 'connect_postgres.php';

// Comando SQL que busca todos os registros da tabela alunos
$sql = "SELECT * FROM alunos";

// stmt significa "statement"
// No PDO, um statement é o comando SQL preparado para ser executado
$stmt = $conexao->prepare($sql);

// Executa o comando SQL preparado acima
$stmt->execute();

// fetchAll busca todos os registros retornados pelo SELECT
// PDO::FETCH_ASSOC faz o resultado vir como array associativo
// Exemplo: $aluno['nome'], $aluno['turma'], $aluno['id']
$alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Percorre cada aluno encontrado no banco
// A cada volta do foreach, a variável $aluno representa um registro da tabela
foreach ($alunos as $aluno) {

    // Mostra o ID do aluno
    echo "ID: {$aluno['id']}<br>";

    // Mostra o nome e sobrenome do aluno
    echo "Nome: {$aluno['nome']} {$aluno['sobrenome']}<br>";

    // Mostra a data de nascimento do aluno
    echo "Data Nascimento: {$aluno['data_nascimento']}<br>";

    // Mostra a turma do aluno
    echo "Turma: {$aluno['turma']}<br>";

    // Mostra se o aluno está ativo ou não
    echo "Ativo: {$aluno['ativo']}<hr><br>";
}

?>