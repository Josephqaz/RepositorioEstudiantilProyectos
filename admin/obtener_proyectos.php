<?php
include("../includes/db.php");

$sql = "SELECT proyecto_id, nombre FROM proyectos";
$result = $conn->query($sql);

$proyectos = [];
while ($row = $result->fetch_assoc()) {
    $proyectos[] = $row;
}

echo json_encode($proyectos);
?>
