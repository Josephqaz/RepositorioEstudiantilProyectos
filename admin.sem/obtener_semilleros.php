<?php
include("../includes/db.php");

$sql = "SELECT semillero_id, nombre FROM semilleros";
$result = $conn->query($sql);

$semilleros = [];
while ($row = $result->fetch_assoc()) {
    $semilleros[] = $row;
}

echo json_encode($semilleros);
?>
