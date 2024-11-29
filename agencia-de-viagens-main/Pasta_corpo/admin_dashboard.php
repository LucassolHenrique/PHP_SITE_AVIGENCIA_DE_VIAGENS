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

// Processa o envio da foto de perfil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['foto_perfil'])) {
    $user_id = $_POST['user_id'];  // ID do usuário que teve a foto alterada

    // Valida o arquivo de imagem
    if ($_FILES['foto_perfil']['error'] === UPLOAD_ERR_OK) {
        $diretorio = '../uploads/';
        
        // Verifica se o diretório existe, se não, cria
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0777, true);
        }

        // Move o arquivo para o diretório
        $arquivo_temp = $_FILES['foto_perfil']['tmp_name'];
        $nome_arquivo = basename($_FILES['foto_perfil']['name']);
        $caminho_arquivo = $diretorio . $nome_arquivo;

        if (move_uploaded_file($arquivo_temp, $caminho_arquivo)) {
            // Atualiza o banco de dados com a nova foto de perfil
            $stmt = $pdo->prepare("UPDATE users SET foto_perfil = :foto_perfil WHERE id = :id");
            $stmt->bindParam(':foto_perfil', $caminho_arquivo);
            $stmt->bindParam(':id', $user_id);
            if ($stmt->execute()) {
                echo "<script>alert('Foto de perfil atualizada com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao atualizar foto de perfil.');</script>";
            }
        } else {
            echo "<script>alert('Erro ao fazer upload da foto.');</script>";
        }
    }
}

// Busca todos os usuários do banco
$stmt = $pdo->prepare("SELECT id, nome, email, user_type, foto_perfil FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <h1>Dashboard do Administrador</h1>

    <!-- Formulário de upload de foto de perfil -->
    <h2>Alterar Foto de Perfil</h2>
    <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
        <label for="user_id">Escolha o usuário:</label>
        <select name="user_id" id="user_id" required>
            <?php foreach ($users as $user): ?>
                <option value="<?php echo $user['id']; ?>"><?php echo htmlspecialchars($user['nome']); ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <label for="foto_perfil">Escolha a nova foto de perfil:</label><br>
        <input type="file" name="foto_perfil" id="foto_perfil" required><br><br>

        <button type="submit">Alterar Foto</button>
    </form>

    <!-- Tabela de usuários com opção de deletar -->
    <h2>Usuários Cadastrados</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Foto de Perfil</th>
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
                        <img src="<?php echo $user['foto_perfil'] ? $user['foto_perfil'] : '../imagens/default-avatar.png'; ?>" alt="Foto de Perfil" style="width: 50px; height: 50px; border-radius: 50%;">
                    </td>
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
// chama o footer
include '../Includ/footer.php';
?>
