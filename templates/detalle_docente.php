<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>

<?php
$docente_id = $_GET['docente_id'];
$sql = "SELECT * FROM docentes WHERE docente_id = $docente_id";
$result = $conn->query($sql);
$docente = $result->fetch_assoc();
?>

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
                    <h3>Formación Académica</h3>
                    <?php
                    $docente_id = $docente['docente_id'];
                    $sqlFormacion = "SELECT formacion_academica FROM docentes WHERE docente_id = $docente_id";
                    $resultFormacion = $conn->query($sqlFormacion);
                    if ($rowFormacion = $resultFormacion->fetch_assoc()) {
                        echo '<p>' . $rowFormacion['formacion_academica'] . '</p>';
                    }
                    ?>
                    <h3>Proyectos en los que participa</h3>
                    <ul>
                        <?php
                        $sqlProyectos = "SELECT proyectos.nombre FROM proyectos
                                        JOIN proyecto_docentes ON proyectos.proyecto_id = proyecto_docentes.proyecto_id
                                        WHERE proyecto_docentes.docente_id = $docente_id";
                        $resultProyectos = $conn->query($sqlProyectos);
                        while ($rowProyecto = $resultProyectos->fetch_assoc()) {
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