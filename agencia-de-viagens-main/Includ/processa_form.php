<?php
require '../conexao/conexao.php'; // Conecta ao banco

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura e sanitiza os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Criptografa a senha
    $user_type = filter_input(INPUT_POST, 'user_type', FILTER_SANITIZE_STRING);

    // Verificar se o e-mail já está registrado
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // E-mail já está cadastrado
        echo "Erro: Este e-mail já está registrado. Tente outro.";
    } else {
        // Se o e-mail não existir, insere os dados no banco
        $sql = "INSERT INTO users (nome, email, password, user_type) VALUES (:nome, :email, :password, :user_type)";
        $stmt = $pdo->prepare($sql);

        // Vincula os parâmetros à consulta
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':user_type', $user_type);

        // Executa a consulta no banco de dados
        try {
            $stmt->execute(); // Executa a inserção
            header("Location: ../logins/login.php");
            exit();            
        } catch (PDOException $e) {
            // Em caso de erro, exibe a mensagem de erro
            echo "Erro ao cadastrar o usuário: " . $e->getMessage();
        }
    }
}
?>
