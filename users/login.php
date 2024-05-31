<?php
include("../includes/db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = md5($conn->real_escape_string($_POST['password']));

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['usuario_id'] = $user['usuario_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['rol'] = $user['rol'];
        header("Location: ../templates/index.php");
        exit();
    } else {
        echo "Correo o contraseña incorrectos.";
    }

    $conn->close();
}
?>
