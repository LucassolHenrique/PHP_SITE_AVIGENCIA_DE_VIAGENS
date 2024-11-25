<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Usuário padrão do XAMPP
$password = ""; // Senha padrão do XAMPP
$dbname = "agencia_viagens";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $partida = $_POST['partida'];
    $chegada = $_POST['chegada'];
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $infantil = $_POST['infantil'];
    $preferencias = isset($_POST['preferencias']) ? implode(", ", $_POST['preferencias']) : "";

    // Inserir no banco de dados
    $sql = "INSERT INTO formularios (nome, email, celular, partida, chegada, origem, destino, infantil, preferencias)
            VALUES ('$nome', '$email', '$celular', '$partida', '$chegada', '$origem', '$destino', '$infantil', '$preferencias')";

    if ($conn->query($sql) === TRUE) {
        echo "Formulário enviado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
$conn->close();
?>

<?php
// Inclui o header
include 'Includ/header.php'; 
?>

<main>
        <section class="formulario" id="orcamento">
            <div class="orcamento limitar-secao">
            <img src="imagens/aviao.png" alt="">
                <p>Solicite um orçamento</p>
            </div>
            <div class="dados limitar-secao">
                <div class="limitar-largura">
                    <h1>Insira seus dados</h1>
                </div>
            <form method="post" action="" class="limitar-largura">
            <div class="label">
                 <label for="username">Nome de usuário:</label>
            </div>
            <div class="label">
                <input type="text" id="username" name="username" required>
            </div>
                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>
    
    <button type="submit">Login</button>
</form>

            </div>
        </section>
    </main>

<?php
//chama o footer
include 'Includ/footer.php';
?>