<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>

<?php
$docente_id = $_GET['docente_id'];
$sql = "SELECT * FROM docentes WHERE docente_id = $docente_id";
$result = $conn->query($sql);
$docente = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle Docente - Repositorio ETITC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/repositorio.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5 container-detalle">
        <h2><?php echo $docente['nombre']; ?></h2>
        <div class="row">
            <div class="col-md-4">
                <img src="<?php echo $docente['imagen']; ?>" class="img-fluid rounded-start" alt="Imagen del docente">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $docente['nombre']; ?></h5>
                    <p class="card-text"><strong>Cargo:</strong> <?php echo $docente['cargo']; ?></p>
                    <p class="card-text"><strong>Correo:</strong> <a href="mailto:<?php echo $docente['email']; ?>"><?php echo $docente['email']; ?></a></p>
                    <h3>Biografía</h3>
                    <p>Breve biografía del docente...</p>
                    <h3>Proyectos en los que participa</h3>
                    <ul>
                        <?php
                        $sqlProyectos = "SELECT proyectos.nombre FROM proyectos
                                         JOIN docentes_proyectos ON proyectos.proyecto_id = docentes_proyectos.proyecto_id
                                         WHERE docentes_proyectos.docente_id = $docente_id";
                        $resultProyectos = $conn->query($sqlProyectos);
                        while($rowProyecto = $resultProyectos->fetch_assoc()) {
                            echo '<li>' . $rowProyecto['nombre'] . '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
</html>
<?php $conn->close(); ?>
