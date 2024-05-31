<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>

<?php
$proyecto_id = $_GET['proyecto_id'];
$sql = "SELECT * FROM proyectos WHERE proyecto_id = $proyecto_id";
$result = $conn->query($sql);
$proyecto = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle Proyecto - Repositorio ETITC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/repositorio.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5 container-detalle">
        <h2><?php echo $proyecto['nombre']; ?></h2>
        <img src="<?php echo $proyecto['imagen']; ?>" class="img-fluid mb-4" alt="Imagen del proyecto">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-desc-list" data-bs-toggle="list" href="#list-desc" role="tab" aria-controls="desc">Descripción</a>
                    <a class="list-group-item list-group-item-action" id="list-doc-list" data-bs-toggle="list" href="#list-doc" role="tab" aria-controls="doc">Documentación</a>
                    <a class="list-group-item list-group-item-action" id="list-estudiantes-list" data-bs-toggle="list" href="#list-estudiantes" role="tab" aria-controls="estudiantes">Estudiantes Integrantes</a>
                    <a class="list-group-item list-group-item-action" id="list-docentes-list" data-bs-toggle="list" href="#list-docentes" role="tab" aria-controls="docentes">Docentes Líderes</a>
                    <a class="list-group-item list-group-item-action" id="list-semillero-list" data-bs-toggle="list" href="#list-semillero" role="tab" aria-controls="semillero">Semillero(s)</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Descripción -->
                    <div class="tab-pane fade show active" id="list-desc" role="tabpanel" aria-labelledby="list-desc-list">
                        <h3>Descripción</h3>
                        <p><?php echo $proyecto['descripcion']; ?></p>
                    </div>
                    <!-- Documentación -->
                    <div class="tab-pane fade" id="list-doc" role="tabpanel" aria-labelledby="list-doc-list">
                        <h3>Documentación</h3>
                        <a href="<?php echo $proyecto['documentacion']; ?>" class="btn btn-primary" target="_blank">Ver Documentación</a>
                    </div>
                    <!-- Estudiantes Integrantes -->
                    <div class="tab-pane fade" id="list-estudiantes" role="tabpanel" aria-labelledby="list-estudiantes-list">
                        <h3>Estudiantes Integrantes</h3>
                        <ul>
                            <?php
                            $sqlEstudiantes = "SELECT e.nombre 
                                               FROM estudiantes e
                                               JOIN proyecto_estudiantes pe ON e.estudiante_id = pe.estudiante_id 
                                               WHERE pe.proyecto_id = $proyecto_id";
                            $resultEstudiantes = $conn->query($sqlEstudiantes);
                            while($rowEstudiante = $resultEstudiantes->fetch_assoc()) {
                                echo '<li>' . $rowEstudiante['nombre'] . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Docentes Líderes -->
                    <div class="tab-pane fade" id="list-docentes" role="tabpanel" aria-labelledby="list-docentes-list">
                        <h3>Docentes Líderes</h3>
                        <ul>
                            <?php
                            $sqlDocentes = "SELECT d.nombre 
                                            FROM docentes d
                                            JOIN proyecto_docentes pd ON d.docente_id = pd.docente_id 
                                            WHERE pd.proyecto_id = $proyecto_id";
                            $resultDocentes = $conn->query($sqlDocentes);
                            while($rowDocente = $resultDocentes->fetch_assoc()) {
                                echo '<li>' . $rowDocente['nombre'] . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Semillero(s) -->
                    <div class="tab-pane fade" id="list-semillero" role="tabpanel" aria-labelledby="list-semillero-list">
                        <h3>Semillero(s)</h3>
                        <div class="row">
                            <?php
                            $sqlSemilleros = "SELECT s.semillero_id, s.nombre, s.descripcion, s.imagen 
                                              FROM semilleros s
                                              JOIN proyecto_semilleros ps ON s.semillero_id = ps.semillero_id 
                                              WHERE ps.proyecto_id = $proyecto_id";
                            $resultSemilleros = $conn->query($sqlSemilleros);
                            while($rowSemillero = $resultSemilleros->fetch_assoc()) {
                                echo '<div class="col-md-6">';
                                echo '<div class="card card-semillero">';
                                echo '<img src="' . $rowSemillero['imagen'] . '" class="card-img-top-semillero" alt="Imagen del semillero">';
                                echo '<div class="card-body card-body-semillero">';
                                echo '<h5 class="card-title">' . $rowSemillero['nombre'] . '</h5>';
                                echo '<p class="card-text">' . $rowSemillero['descripcion'] . '</p>';
                                echo '<a href="detalle_semillero.php?semillero_id=' . $rowSemillero['semillero_id'] . '" class="btn btn-primary">Conocer más</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
</html>
<?php $conn->close(); ?>
