<?php
session_start();
include "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

// Consulta
$sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifica senha
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario'] = $user['nome'];
        header("Location: dashboard.php");
        exit;
    } else {
        echo "<script>alert('Senha incorreta!'); history.back();</script>";
    }

} else {
    echo "<script>alert('Usuário não encontrado!'); history.back();</script>";
}
?>