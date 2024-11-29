<?php
session_start();
require_once('../conexao/conexao.php');

// Verifica se o usuário é administrador
if ($_SESSION['user_type'] !== 'admin') {
    header('Location: ../Pasta_corpo/index.php');
    exit;
}

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Verifica se o ID é válido
    if ($id > 0) {
        // Prepara a consulta SQL para deletar o usuário
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        // Executa a consulta
        if ($stmt->execute()) {
            echo "<script>alert('Usuário deletado com sucesso!'); window.location.href = 'admin_dashboard.php';</script>";
        } else {
            echo "<script>alert('Erro ao deletar o usuário. Tente novamente.'); window.location.href = 'admin_dashboard.php';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('ID de usuário inválido.'); window.location.href = 'admin_dashboard.php';</script>";
    }
} else {
    echo "<script>alert('ID de usuário não fornecido.'); window.location.href = 'admin_dashboard.php';</script>";
}

$conn->close();
?>
