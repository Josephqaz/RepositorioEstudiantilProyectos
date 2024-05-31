<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proyecto_id = $conn->real_escape_string($_POST['proyecto_id']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $documentacion = $conn->real_escape_string($_POST['documentacion']);

    // Actualizar el proyecto
    $sql = "UPDATE proyectos SET nombre='$nombre', descripcion='$descripcion', documentacion='$documentacion' WHERE proyecto_id='$proyecto_id'";
    if ($conn->query($sql) === TRUE) {
        // Eliminar las relaciones existentes
        $conn->query("DELETE FROM proyecto_estudiantes WHERE proyecto_id='$proyecto_id'");
        $conn->query("DELETE FROM proyecto_docentes WHERE proyecto_id='$proyecto_id'");
        $conn->query("DELETE FROM proyecto_semilleros WHERE proyecto_id='$proyecto_id'");

        // Insertar nuevas relaciones
        if (!empty($_POST['estudiantes'])) {
            foreach ($_POST['estudiantes'] as $estudiante_id) {
                $estudiante_id = $conn->real_escape_string($estudiante_id);
                $conn->query("INSERT INTO proyecto_estudiantes (proyecto_id, estudiante_id) VALUES ('$proyecto_id', '$estudiante_id')");
            }
        }

        if (!empty($_POST['docentes'])) {
            foreach ($_POST['docentes'] as $docente_id) {
                $docente_id = $conn->real_escape_string($docente_id);
                $conn->query("INSERT INTO proyecto_docentes (proyecto_id, docente_id) VALUES ('$proyecto_id', '$docente_id')");
            }
        }

        if (!empty($_POST['semilleros'])) {
            foreach ($_POST['semilleros'] as $semillero_id) {
                $semillero_id = $conn->real_escape_string($semillero_id);
                $conn->query("INSERT INTO proyecto_semilleros (proyecto_id, semillero_id) VALUES ('$proyecto_id', '$semillero_id')");
            }
        }

        echo "Proyecto actualizado exitosamente.";
    } else {
        echo "Error al actualizar el proyecto: " . $conn->error;
    }
}
?>
