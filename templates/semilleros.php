<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semilleros - Repositorio ETITC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/repositorio.css">
</head>
<body>
<div class="container mt-5 semi-transparent-bg">
        <h2>Semilleros</h2>
</div>
        <div class="container mt-5 card-container-semi">
        <div class="row">
            <?php
            $sql = "SELECT * FROM semilleros";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4">';
                    echo '<div class="card card-semi">';
                    echo '<img src="' . $row["imagen"] . '" class="card-img-top-semi" alt="Imagen del semillero">';
                    echo '<div class="card-body card-body-semi">';
                    echo '<h5 class="card-title">' . $row["nombre"] . '</h5>';
                    echo '<p class="card-text">' . $row["descripcion"] . '</p>';
                    echo '<a href="detalle_semillero.php?semillero_id=' . $row["semillero_id"] . '" class="btn btn-primary">Conocer más</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No hay semilleros disponibles.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
</html>
