<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Docentes Investigadores - Repositorio ETITC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/repositorio.css">
</head>
<body>
<div class="container mt-5 semi-transparent-bg">
        <h2>Docentes Investigadores</h2>
</div>
        <div class="container mt-5 card-container-inv">
        <div class="row">
            <?php
            $sql = "SELECT * FROM docentes";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card card-inv">';
                    echo '<img src="' . $row["imagen"] . '" class="card-img-top-inv" alt="Foto del docente">';
                    echo '<div class="card-body card-body-inv">';
                    echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                    echo '<p class="card-text"><strong>Cargo:</strong> ' . $row["cargo"] . '</p>';
                    echo '<p class="card-text"><strong>Correo:</strong> <a href="mailto:' . $row["email"] . '">' . $row["email"] . '</a></p>';
                    echo '<a href="https://outlook.office.com/mail/deeplink/compose?to=' . $row["email"] . '" target="_blank" class="btn btn-primary">Enviar Correo</a>';
                    echo '<a href="detalle_docente.php?docente_id=' . $row["docente_id"] . '" class="btn btn-secondary">Conocer más</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay docentes disponibles.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
</html>
