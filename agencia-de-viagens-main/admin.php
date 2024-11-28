<?php
$host = 'localhost';  // ou o endereço do seu servidor MySQL
$dbname = 'agencia_viagens';
$username = 'root';  // padrão no XAMPP
$password = '';  // senha do MySQL (normalmente vazia no XAMPP)

// Criando a conexão
$conn = new mysqli($host, $username, $password, $dbname);

// Checando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Exemplo de consulta (para pegar todos os destinos)
$sql = "SELECT * FROM destinos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibe os resultados
    while($row = $result->fetch_assoc()) {
        echo "Nome: " . $row['nome'] . " - Descrição: " . $row['descricao'] . "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();


// Recupera as imagens existentes do banco
$sql = "SELECT * FROM imagens";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Imagens</title>
</head>
<body>
    <h1>Administração de Imagens</h1>

    <!-- Formulário para upload de nova imagem -->
    <form action="admin.php" method="POST" enctype="multipart/form-data">
        <label for="imagem">Escolha uma imagem:</label>
        <input type="file" name="imagem" required>
        <br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required>
        <br>
        <button type="submit">Enviar Imagem</button>
    </form>

    <h2>Imagens Disponíveis</h2>
    <div class="imagens">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div>
                <img src="<?php echo $row['caminho']; ?>" alt="<?php echo $row['descricao']; ?>" width="200">
                <p><?php echo $row['descricao']; ?></p>
            </div>
        <?php } ?>
    </div>
</body>


<?php
$conn->close();
?>
