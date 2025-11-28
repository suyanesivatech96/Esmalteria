<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: inicio.html");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>
<h1>Bem-vindo, <?php echo $_SESSION['usuario']; ?>!</h1>
<a href="logout.php">Sair</a>
</body>
</html>
