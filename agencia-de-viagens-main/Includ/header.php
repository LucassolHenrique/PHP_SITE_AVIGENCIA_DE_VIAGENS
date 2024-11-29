<?php
session_start(); // Inicia a sessão para verificar login
?>


<!DOCTYPE html>
<<<<<<< HEAD
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title><?php echo $title ?? 'Título Padrão'; ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&amp;display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
</head>
<body>
<header>
    <div class="container">
        <div class="topo">
            <img src="../imagens/local-logo.png" alt="Logo da Agência">
            <a href="index.php">AGÊNCIA DE VIAGENS</a>
        </div>

        <a class="menu" href="#abrir">
            <span class="material-symbols-outlined" id="burguer">menu</span>
        </a>
=======
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Agência de Viagens</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@200;300&amp;display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    </head>
        <header>
          <div class = "container">
          <div class="topo">
            <img src="imagens/local-logo.png" alt="">
            <a href="main.php">AGÊNCIA DE VIAGENS</a>
          </div>

          <a class="menu"href="#abrir"><span class="material-symbols-outlined" id="burguer">menu</span></a>
          
      
          <nav id="itens">
            <a href="Formulario.php">aaaa</a>
            <a href="#sobre">Sobre Nós</a>
            <a href="#ofertas">Ofertas</a>
            <a href="#precos">Preços</a>
            <a href="#contato">Contato</a>
          </nav>
   
          </div>
        </header>
>>>>>>> 9683cf11a1906fe491785d6524d9875f16ad382a

        <nav id="itens">
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Exibe o nome do usuário logado e link de logout -->
                <a href="../Pasta_corpo/index.php">Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
                <a href="../paginas (logins)/logout.php">Sair</a>
            <?php else: ?>
                <!-- Links padrão para visitantes -->
                <a href="/PHP_SITE_AVIGENCIA_DE_VIAGENS/agencia-de-viagens-main/paginas (logins)/login.php">Login</a>
                <a href="/PHP_SITE_AVIGENCIA_DE_VIAGENS/agencia-de-viagens-main/paginas (logins)/Formulario.php">Criar Conta</a>
            <?php endif; ?>

            <!-- Links de navegação geral para todos os usuários -->
            <a href="../Pasta_corpo/index.php">Home</a>
            <a href="sobre.php">Sobre</a>
            <a href="contato.php">Contato</a>
        </nav>
    </div>
</header>
</body>

