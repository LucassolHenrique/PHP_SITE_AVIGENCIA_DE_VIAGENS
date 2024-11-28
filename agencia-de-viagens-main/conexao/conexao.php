<?php
// Configuração do banco de dados
$host = 'localhost';
$dbname = 'agencia_viagens'; // Nome do banco de dados
$username = 'root'; // Usuário do banco de dados
$password = ''; // Senha do banco de dados

// Tenta estabelecer a conexão com o banco de dados
try {
    // Cria uma nova instância do PDO para conexão
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Define o modo de erro para exceções
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibe uma mensagem de erro caso a conexão falhe
    die("Erro de conexão com o banco de dados: " . $e->getMessage());
}
?>


