<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Proyectos - Repositorio ETITC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/repositorio.css">
</head>
<body>
<div class="container mt-5 semi-transparent-bg">
        <h2>Proyectos</h2>
        <div class="row">
            <?php
            $sql = "SELECT proyectos.*, semilleros.nombre AS semillero_nombre FROM proyectos 
                    LEFT JOIN semilleros ON proyectos.semillero_id = semilleros.semillero_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $imagePath = $row["imagen"]; // La ruta completa ya está en la base de datos
                    echo '<div class="col-md-12 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="row g-0">';
                    echo '<div class="col-md-4">';
                    echo '<img src="' . $imagePath . '" class="img-fluid rounded-start" alt="Imagen del proyecto">';
                    echo '</div>';
                    echo '<div class="col-md-8">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                    echo '<p class="card-text"><strong>Semillero:</strong> ' . $row["semillero_nombre"] . '</p>';
                    echo '<p class="card-text">' . $row["descripcion"] . '</p>';
                    echo '<a href="detalle_proyecto.php?proyecto_id=' . $row["proyecto_id"] . '" class="btn btn-primary">Conocer más</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay proyectos disponibles.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
</html>
