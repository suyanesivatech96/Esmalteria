<?php
include "conexao.php";

$email = $_POST['Email'];
$nome = $_POST['Nome'];
$data = $_POST['data'];
$contato = $_POST['Contato'];
$status = $_POST['Status'];
$obs = $_POST['obs'];

$senha_padrao = "123456";
$senha_hash = password_hash($senha_padrao, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (email, nome, data_nascimento, contato, status, observacoes, senha)
        VALUES ('$email', '$nome', '$data', '$contato', '$status', '$obs', '$senha_hash')";

if ($con->query($sql)) {
    echo "<script>alert('Usuário cadastrado com sucesso! Senha padrão: 123456'); 
    window.location.href='inicio.html';</script>";
} else {
    echo "Erro: " . $con->error;
}
?>
