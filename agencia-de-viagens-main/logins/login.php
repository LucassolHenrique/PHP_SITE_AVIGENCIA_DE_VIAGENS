<?php
// Inclui o header
include '../Includ/header.php';
$title = "Criação de conta";
?>

<?php
require '../conexao/conexao.php'; // Incluir a conexão com o banco de dados

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Debug: Verificar se os dados do formulário estão chegando corretamente
    var_dump($email, $password); // Remova depois que verificar se está funcionando

    // Consultar o banco para verificar o usuário
    $sql = "SELECT id, nome, email, password, user_type FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debug: Verificar se o usuário foi encontrado
    var_dump($user); // Remova depois que verificar

    if ($user && password_verify($password, $user['password'])) {
        // Armazena as informações do usuário na sessão
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nome'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_type'] = $user['user_type'];

        // Redireciona para a página adequada
        if ($user['user_type'] === 'admin') {
            header("Location: ../Pasta_corpo/admin_dashboard.php");
        } else {
            header("Location: ../Pasta_corpo/dashboard.php");
        }
        exit();
    } else {
        $error = "Credenciais inválidas.";
    }
}
?>



<body>
    <section class="formulario" id="orcamento">
        <div class="orcamento limitar-secao">
            <img src="../imagens/aviao.png" alt="">
            <p>efetue seu login</p>
        </div>
        <div class="dados limitar-secao">
            <div class="limitar-largura">
                <h1>Insira seus dados</h1>
            </div>
            <!-- Formulário de Login -->
            <form action="../logins/login.php" method="POST">
                <?php if (isset($error)) {
                    echo "<p class='error'>$error</p>";
                } ?>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required><br><br>

                <button type="submit">Entrar</button>
            </form>
        </div>
        </section>
</body>

</html>

<?php
//chama o footer
include '../Includ/footer.php';
?>