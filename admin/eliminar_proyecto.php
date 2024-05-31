<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proyecto_id = isset($_POST['proyecto_id']) ? $conn->real_escape_string($_POST['proyecto_id']) : '';

    // Eliminar relaciones con estudiantes
    $sql = "DELETE FROM proyecto_estudiantes WHERE proyecto_id = '$proyecto_id'";
    $conn->query($sql) or die($conn->error);

    // Eliminar relaciones con docentes
    $sql = "DELETE FROM proyecto_docentes WHERE proyecto_id = '$proyecto_id'";
    $conn->query($sql) or die($conn->error);

    // Eliminar relaciones con semilleros
    $sql = "DELETE FROM proyecto_semilleros WHERE proyecto_id = '$proyecto_id'";
    $conn->query($sql) or die($conn->error);

    // Eliminar el proyecto
    $sql = "DELETE FROM proyectos WHERE proyecto_id = '$proyecto_id'";
    $conn->query($sql) or die($conn->error);

    // Redirigir después de eliminar el proyecto
    header("Location: ../templates/proyectos.php");
    exit();
}
?>
