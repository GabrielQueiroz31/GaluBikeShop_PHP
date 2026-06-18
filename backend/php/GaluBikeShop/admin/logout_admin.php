<?php

session_start();

// Encerra a sessao do administrador.
session_destroy();

header("Location: ../index.php");
exit;

?>
