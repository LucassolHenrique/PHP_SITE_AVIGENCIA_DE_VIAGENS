<?php
// Inclui o header
include '../Includ/header.php';
$title = "ADM FOTO";
?>

<?php
require_once '../conexao/conexao.php';

// Verifica se o usuário está logado e é administrador
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: ../index.php');
    exit;
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

// Busca todos os usuários para permitir que o admin escolha um
$stmt = $pdo->prepare("SELECT id, nome, foto_perfil FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Admin - Alterar Foto de Perfil</title>
</head>
<body>
    <h1>Dashboard do Administrador</h1>

    <h2>Alterar Foto de Perfil</h2>

    <!-- Formulário para escolher um usuário e alterar sua foto -->
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

    <h2>Sua Foto de Perfil</h2>
    <?php
    $admin_id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT foto_perfil FROM users WHERE id = :id");
    $stmt->bindParam(':id', $admin_id);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    $foto_admin = isset($admin['foto_perfil']) ? $admin['foto_perfil'] : '../imagens/default-avatar.png';
    ?>
    <img src="<?php echo $foto_admin; ?>" alt="Foto de Perfil Admin" style="width: 100px; height: 100px; border-radius: 50%;">
</body>
</html>