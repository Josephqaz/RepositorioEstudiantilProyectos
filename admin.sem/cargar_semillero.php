<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $semillero_id = isset($_GET['semillero_id']) ? $conn->real_escape_string($_GET['semillero_id']) : '';

    // Obtener los datos del semillero
    $sql = "SELECT * FROM semilleros WHERE semillero_id = '$semillero_id'";
    $result = $conn->query($sql);
    $semillero = $result->fetch_assoc();

    // Devolver los datos como JSON
    echo json_encode($semillero);
}
?>
