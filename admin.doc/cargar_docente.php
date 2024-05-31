<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $docente_id = isset($_GET['docente_id']) ? $conn->real_escape_string($_GET['docente_id']) : '';

    // Obtener los datos del docente
    $sql = "SELECT * FROM docentes WHERE docente_id = '$docente_id'";
    $result = $conn->query($sql);
    $docente = $result->fetch_assoc();

    // Devolver los datos como JSON
    echo json_encode($docente);
}
?>
