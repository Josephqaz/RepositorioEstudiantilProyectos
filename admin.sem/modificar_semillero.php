<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $semillero_id = $conn->real_escape_string($_POST['semillero_id']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = isset($_POST['descripcion']) ? $conn->real_escape_string($_POST['descripcion']) : '';
    $contacto_email = isset($_POST['contacto_email']) ? $conn->real_escape_string($_POST['contacto_email']) : '';
    $imagen = '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorio = '../scr/doc/';
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
        $imagen = $directorio . basename($_FILES['imagen']['name']);
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
            $sql = "UPDATE semilleros SET nombre='$nombre', descripcion='$descripcion', contacto_email='$contacto_email', imagen='$imagen' WHERE semillero_id='$semillero_id'";
        } else {
            echo "Error al subir la imagen.";
            exit;
        }
    } else {
        $sql = "UPDATE semilleros SET nombre='$nombre', descripcion='$descripcion', contacto_email='$contacto_email' WHERE semillero_id='$semillero_id'";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Semillero modificado exitosamente.";
    } else {
        echo "Error al modificar el semillero: " . $conn->error;
    }
}
?>
