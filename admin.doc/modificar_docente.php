<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $docente_id = $conn->real_escape_string($_POST['docente_id']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $cargo = isset($_POST['cargo']) ? $conn->real_escape_string($_POST['cargo']) : '';
    $formacion_academica = $conn->real_escape_string($_POST['formacion_academica']);
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : '';
    $imagen = '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorio = '../scr/docen/';
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
        $imagen = $directorio . basename($_FILES['imagen']['name']);
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
            $sql = "UPDATE docentes SET nombre='$nombre', cargo='$cargo', formacion_academica='$formacion_academica', email='$email', imagen='$imagen' WHERE docente_id='$docente_id'";
        } else {
            echo "Error al subir la imagen.";
            exit;
        }
    } else {
        $sql = "UPDATE docentes SET nombre='$nombre', cargo='$cargo', formacion_academica='$formacion_academica', email='$email' WHERE docente_id='$docente_id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Docente modificado exitosamente.";
        header('Location: ../templates/docentes_investigadores.php');
    } else {
        echo "Error al modificar el docente: " . $conn->error;
    }
}
?>
