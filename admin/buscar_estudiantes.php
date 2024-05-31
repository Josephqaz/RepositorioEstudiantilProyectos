<?php
include("../includes/db.php");

$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$sql = "SELECT estudiante_id, nombre FROM estudiantes WHERE nombre LIKE '%$query%'";
$result = $conn->query($sql);

$estudiantes = [];
while ($row = $result->fetch_assoc()) {
    $estudiantes[] = $row;
}

echo json_encode($estudiantes);
?>
