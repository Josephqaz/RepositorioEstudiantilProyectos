<?php
include("../includes/db.php");

$sql = "SELECT docente_id, nombre FROM docentes";
$result = $conn->query($sql);

$docentes = [];
while ($row = $result->fetch_assoc()) {
    $docentes[] = $row;
}

echo json_encode($docentes);
?>
