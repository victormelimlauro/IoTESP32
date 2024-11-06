<?php
$servername = "localhost"; // Altere se necessário
$username = "door_user"; // Seu nome de usuário do MySQL
$password = "password"; // Sua senha do MySQL
$dbname = "door_status"; // Nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>