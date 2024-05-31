<?php
include("../includes/db.php");

$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$sql = "SELECT docente_id, nombre FROM docentes WHERE nombre LIKE '%$query%'";
$result = $conn->query($sql);

$docentes = [];
while ($row = $result->fetch_assoc()) {
    $docentes[] = $row;
}

echo json_encode($docentes);
?>
