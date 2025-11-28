<?php
include "../conexao.php";

$hoje = date("Y-m-d");

$sql = $conn->query("
    SELECT * FROM agendamentos 
    WHERE data >= '$hoje'
    ORDER BY data, hora_inicio
");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Próximos Agendamentos</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

<div class="title">
    <h1>Próximos Agendamentos</h1>
    <button class="btn-secundario" onclick="window.location.href='../dashboard.php'">Voltar</button>
</div>

<main>
    <div class="agendamentos">
        <h3>Próximos Agendamentos</h3>

        <?php if ($sql->num_rows == 0): ?>
            <p>Nenhum agendamento futuro encontrado.</p>
        <?php endif; ?>

        <?php while ($ag = $sql->fetch_assoc()): ?>
            <div class="agendamento-item">
                <h4><?= $ag['titulo'] ?></h4>
                <p>
                    <?= $ag['cliente'] ?><br>
                    <?= date("d/m/Y", strtotime($ag['data'])) ?><br>
                    <?= substr($ag['hora_inicio'],0,5) ?> - <?= substr($ag['hora_fim'],0,5) ?><br>
                    <b>Status:</b> <?= ucfirst($ag['status']) ?>
                </p>
            </div>
        <?php endwhile; ?>
    </div>
</main>

</body>
</html>
