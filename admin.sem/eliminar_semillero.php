<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $semillero_id = $conn->real_escape_string($_POST['semillero_id']);

    $sql = "DELETE FROM semilleros WHERE semillero_id='$semillero_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Semillero eliminado exitosamente.";
        header('Location: ../templates/semilleros.php');
    } else {
        echo "Error al eliminar el semillero: " . $conn->error;
    }
}
?>
