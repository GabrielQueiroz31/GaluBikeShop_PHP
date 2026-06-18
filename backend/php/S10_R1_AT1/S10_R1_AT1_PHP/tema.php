<?php
$tema = $_GET['modo'] ?? 'claro';

if ($tema != 'claro' && $tema != 'escuro') {
    $tema = 'claro';
}

setcookie(
    'tema',
    $tema,
    time() + (86400 * 30)
);

header('Location: perfil.php?tema=alterado');
exit();
?>