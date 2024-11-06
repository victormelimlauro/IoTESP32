<?php
include 'database.php'; // Inclui a conexão com o banco de dados

// Função para cadastro de usuário
function cadastrar_usuario($nome, $email, $senha) {
    global $conn;
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
    $conn->query($sql);
}

// Verifica se o formulário de cadastro foi enviado
if (isset($_POST['cadastrar'])) {
    cadastrar_usuario($_POST['nome'], $_POST['email'], $_POST['senha']);
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css"> <!-- Incluindo CSS opcional -->
</head>
<body>
    <h2>Cadastro de Usuário</h2>
    <form method="POST" action="">
        Nome: <input type="text" name="nome" required><br>
        Email: <input type="email" name="email" required><br>
        Senha: <input type="password" name="senha" required><br>
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    <p>Já tem uma conta? <a href="login.php">Faça login aqui</a></p>
</body>
</html>