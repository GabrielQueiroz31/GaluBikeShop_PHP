<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaluBikeShop</title>
    <!-- Versao no CSS para forcar o navegador a carregar o estilo atualizado. -->
    <link rel="stylesheet" href="style.css?v=4">
</head>
<body>

<div class="split-layout">

    <!-- Lado esquerdo -->
    <div class="split-visual">

        <div class="home-brand-logo">
            <img src="img/Logo.png" alt="Logo GaluBikeShop">
            <span>GaluBikeShop</span>
        </div>

        <div class="split-visual-overlay">
            <span class="split-visual-tag">Sua loja de bikes</span>

            <h2 class="split-visual-headline">
                Peças e<br> acessórios<br>de <span>qualidade.</span>
            </h2>

            <p class="split-visual-sub">
                Tudo que você precisa para pedalar com estilo, segurança e praticidade.
            </p>
        </div>

    </div>

    <!-- Lado direito -->
    <div class="split-access">
        <div class="access-inner">

            <h1 class="access-title">GaluBikeShop</h1>

            <p class="access-sub">Acesse sua área para continuar.</p>

            <div class="access-divider">
                <div class="access-divider-line"></div>
                <span class="access-divider-label">Selecione seu acesso</span>
                <div class="access-divider-line"></div>
            </div>

            <div class="access-buttons">
                <!-- Botao para acessar a area do cliente. -->
                <a href="cliente/login_cliente.php" class="btn-access-primary">
                    <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg> Área do Cliente
                </a>

                <!-- Botao para acessar a area do administrador. -->
                <a href="admin/login_admin.php" class="btn-access-secondary">
                    <svg class="btn-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" 
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg> Área do Admin
                </a>
            </div>

            <p class="access-footer">
                
                GaluBikeShop &copy; <?php echo date('Y'); // Mostra o ano atual automaticamente ?>
            </p>

        </div>
    </div>

</div>

</body>
</html>
