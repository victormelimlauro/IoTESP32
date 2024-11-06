<?php
session_start();
include 'database.php'; // Inclui a conexão com o banco de dados

// Função para login de usuário
function login_usuario($email, $senha) {
    global $conn;
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}

// Verifica se o formulário de login foi enviado
if (isset($_POST['login'])) {
    if (login_usuario($_POST['email'], $_POST['senha'])) {
        $_SESSION['logged_in'] = true;
        header("Location: controle.php");
        exit;
    } else {
        echo "Erro ao logar";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"> <!-- Incluindo CSS opcional -->
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="">
        Email: <input type="email" name="email" required><br>
        Senha: <input type="password" name="senha" required><br>
        <button type="submit" name="login">Login</button>
    </form>
    <p>Ainda não tem uma conta? <a href="index.php">Cadastre-se aqui</a></p>
</body>
</html>