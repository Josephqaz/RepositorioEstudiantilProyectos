<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : '';
    $descripcion = isset($_POST['descripcion']) ? $conn->real_escape_string($_POST['descripcion']) : '';
    $documentacion = isset($_POST['documentacion']) ? $conn->real_escape_string($_POST['documentacion']) : '';
    $semillero_ids = isset($_POST['semilleros']) ? $_POST['semilleros'] : [];

    // Manejo de la imagen
    $imagen = '';
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $imagen = '../scr/doc/' . basename($_FILES['imagen']['name']);
        move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);
    }

    // Insertar en la tabla de proyectos
    $sql = "INSERT INTO proyectos (nombre, descripcion, documentacion, imagen) 
            VALUES ('$nombre', '$descripcion', '$documentacion', '$imagen')";
    $conn->query($sql) or die($conn->error);

    // Obtener el ID del proyecto recién creado
    $proyecto_id = $conn->insert_id;

    // Insertar estudiantes asociados
    if (isset($_POST['estudiantes'])) {
        foreach ($_POST['estudiantes'] as $estudiante_id) {
            $estudiante_id = $conn->real_escape_string($estudiante_id);
            $sql = "INSERT INTO proyecto_estudiantes (proyecto_id, estudiante_id) 
                    VALUES ('$proyecto_id', '$estudiante_id')";
            $conn->query($sql) or die($conn->error);
        }
    }

    // Insertar docentes asociados
    if (isset($_POST['docentes'])) {
        foreach ($_POST['docentes'] as $docente_id) {
            $docente_id = $conn->real_escape_string($docente_id);
            $sql = "INSERT INTO proyecto_docentes (proyecto_id, docente_id) 
                    VALUES ('$proyecto_id', '$docente_id')";
            $conn->query($sql) or die($conn->error);
        }
    }

    // Insertar semilleros asociados
    if (!empty($semillero_ids)) {
        foreach ($semillero_ids as $semillero_id) {
            $semillero_id = $conn->real_escape_string($semillero_id);
            $sql = "INSERT INTO proyecto_semilleros (proyecto_id, semillero_id) 
                    VALUES ('$proyecto_id', '$semillero_id')";
            $conn->query($sql) or die($conn->error);
        }
    }

    // Redirigir después de crear el proyecto
    header("Location: ../templates/proyectos.php");
    exit();
}
?>
