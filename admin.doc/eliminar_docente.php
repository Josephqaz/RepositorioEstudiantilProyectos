<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $docente_id = $conn->real_escape_string($_POST['docente_id']);

    $sql = "DELETE FROM docentes WHERE docente_id='$docente_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Docente eliminado exitosamente.";
    } else {
        echo "Error al eliminar el docente: " . $conn->error;
    }
}
?>
