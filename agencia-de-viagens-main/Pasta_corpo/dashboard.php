<?php
// Inclui o header
include '../Includ/header.php';
$title = "Criação de conta";
// Verifica se o usuário está logado caso não viai para esta pagina
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: ../Pasta_corpo/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Dashboard</title>
</head>
<body>

    <!-- Exibe o nome do usuário logado -->
    <header>
        <div class="container">
            <div class="topo">
                <h1>Bem-vindo, <?php echo $_SESSION['user_name']; ?>!</h1>
                <!-- Aqui você pode colocar o link de logout ou outras informações -->
                <a href="../logout.php">Sair</a>
            </div>
        </div>
    </header>

    <main>
        <section>
            <h2>Conteúdo exclusivo para você!</h2>
            <!-- Mais conteúdo aqui -->
        </section>
    </main>

</body>
</html>
<?php
//chama o footer
include '../Includ/footer.php';
?>