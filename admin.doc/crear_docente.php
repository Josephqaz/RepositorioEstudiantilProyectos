<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
            echo "Imagen subida correctamente.";
        } else {
            echo "Error al subir la imagen.";
        }
    }

    $sql = "INSERT INTO docentes (nombre, cargo, formacion_academica, email, imagen) VALUES ('$nombre', '$cargo', '$formacion_academica', '$email', '$imagen')";
    if ($conn->query($sql) === TRUE) {
        echo "Docente creado exitosamente.";
        header('Location: ../templates/docentes_investigadores.php');
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
