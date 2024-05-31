<?php
include("../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    $mensaje = $conn->real_escape_string($_POST['mensaje']);

    $sql = "INSERT INTO contactos (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        header("Location: contacto_confirmacion.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo "Método de solicitud no válido";
}
?>
