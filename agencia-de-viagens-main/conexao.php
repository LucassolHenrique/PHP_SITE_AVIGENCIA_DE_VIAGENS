<?php
$host = 'localhost';  // Ou o IP do servidor MySQL
$dbname = 'agencia_viagens';
$username = 'root';   // Seu usuário do MySQL
$password = '';       // Sua senha do MySQL

// Criando a conexão
$conn = new mysqli($host, $username, $password, $dbname);

// Checando se houve erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

<!-- nome do banco agencia_viagens -->