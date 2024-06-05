<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = isset($_POST['descripcion']) ? $conn->real_escape_string($_POST['descripcion']) : '';
    $contacto_email = isset($_POST['contacto_email']) ? $conn->real_escape_string($_POST['contacto_email']) : '';
    $imagen = '';

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        $directorio = '../scr/semi/';
        if (!is_dir($directorio)) {
            mkdir($directorio, 0777, true);
        }
        $imagen = $directorio . basename($_FILES['imagen']['name']);
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen)) {
            echo "Imagen subida correctamente.";
        } else {
            echo "Error al subir la imagen.";
        }
    }

    $sql = "INSERT INTO semilleros (nombre, descripcion, contacto_email, imagen) VALUES ('$nombre', '$descripcion', '$contacto_email', '$imagen')";
    if ($conn->query($sql) === TRUE) {
        echo "Semillero creado exitosamente.";
        header('Location: ../templates/semilleros.php');
    } else {
        echo "Error al crear el semillero: " . $conn->error;
    }
}
?>
