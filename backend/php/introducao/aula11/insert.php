<?php 
require_once 'connect_postgres.php';

$sql = 
"INSERT INTO alunos (
    nome,
    sobrenome,
    data_nascimento,
    turma)

VALUES (
    :nome,
    :sobrenome,
    :data_nascimento,
    :turma)";

$stmt = $conexao->prepare($sql);
$stmt->bindValue(':nome', 'Luan');
$stmt->bindValue(':sobrenome', 'Basani');
$stmt->bindValue(':data_nascimento', '2000-01-01');
$stmt->bindValue(':turma', '3A');
$stmt->execute();

echo "Aluno inserido com sucesso!";