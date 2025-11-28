<?php
include "db.php";

$dia = $_GET['dia'];
$mes = $_GET['mes'];
$ano = $_GET['ano'];

$data = "$ano-$mes-$dia";

$sql = "SELECT * FROM agendamentos WHERE data = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $data);
$stmt->execute();
$result = $stmt->get_result();

$agendamentos = [];

while($row = $result->fetch_assoc()) {
    $agendamentos[] = $row;
}

header('Content-Type: application/json');
echo json_encode($agendamentos);
?>
