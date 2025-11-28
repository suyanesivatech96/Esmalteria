<?php
include "../conexao.php";

$sql = $conn->query("
    SELECT DISTINCT cliente 
    FROM agendamentos 
    WHERE cliente <> ''
    ORDER BY cliente
");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Total de Clientes</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<div class="title">
    <h1>Total de Clientes</h1>
    <button class="btn-secundario" onclick="window.location.href='../dashboard.php'">Voltar</button>
</div>

<main>
    <div class="agendamentos">
        <h3>Lista de Clientes</h3>

        <?php if ($sql->num_rows == 0): ?>
            <p>Ainda não há clientes cadastrados.</p>
        <?php endif; ?>

        <?php while ($c = $sql->fetch_assoc()): ?>
            <div class="agendamento-item">
                <h4><?= $c['cliente'] ?></h4>
            </div>
        <?php endwhile; ?>
    </div>
</main>

</body>
</html>
