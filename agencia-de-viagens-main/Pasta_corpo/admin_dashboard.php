<?php
// inclui o header
include '../Includ/header.php';
$title = "Conta Admin";
?>

<?php
require_once '../conexao/conexao.php';

// Verifica se o usuário logado é admin
if ($_SESSION['user_type'] !== 'admin') {
    header('Location: ../index.php'); // Redireciona se não for admin
    exit;
}

// Deletar usuário se o parâmetro 'delete' for passado
if (isset($_GET['delete'])) {
    $delete_id = (int) $_GET['delete'];

    // Prepara e executa a query de deleção
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $delete_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>alert('Usuário deletado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao deletar usuário. Tente novamente.');</script>";
    }
}

// Busca todos os usuários do banco
$stmt = $pdo->prepare("SELECT id, nome, email, user_type FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Dashboard do Administrador</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['nome']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['user_type']); ?></td>
                    <td>
                        <!-- Link para deletar o usuário -->
                        <a href="admin_dashboard.php?delete=<?php echo $user['id']; ?>" onclick="return confirm('Tem certeza que deseja deletar este usuário?');">Deletar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

<?php
//chama o footer
include '../Includ/footer.php';
?>
