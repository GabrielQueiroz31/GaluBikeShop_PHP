<?php
// Inicia a sessao
session_start();
// Encerra a sessao do cliente
session_destroy();
// Redireciona para a pagina inicial
header("Location: ../index.php");
// Finaliza a execucao
exit;
?>
