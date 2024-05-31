<?php
include("../includes/db.php");

$query = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$sql = "SELECT semillero_id, nombre FROM semilleros WHERE nombre LIKE '%$query%'";
$result = $conn->query($sql);

$semilleros = [];
while ($row = $result->fetch_assoc()) {
    $semilleros[] = $row;
}

echo json_encode($semilleros);
?>
