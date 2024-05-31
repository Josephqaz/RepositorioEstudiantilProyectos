<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>

<?php
$semillero_id = $_GET['semillero_id'];
$sql = "SELECT * FROM semilleros WHERE semillero_id = $semillero_id";
$result = $conn->query($sql);
$semillero = $result->fetch_assoc();
?>
<body>
    <div class="container mt-5 container-detalle">
        <h2><?php echo $semillero['nombre']; ?></h2>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-intro-list" data-bs-toggle="list" href="#list-intro" role="tab" aria-controls="intro">Descripción</a>
                    <a class="list-group-item list-group-item-action" id="list-proyectos-list" data-bs-toggle="list" href="#list-proyectos" role="tab" aria-controls="proyectos">Proyectos Relacionados</a>
                    <a class="list-group-item list-group-item-action" id="list-poster-list" data-bs-toggle="list" href="#list-poster" role="tab" aria-controls="poster">Póster del Proyecto</a>
                    <a class="list-group-item list-group-item-action" id="list-estudiantes-list" data-bs-toggle="list" href="#list-estudiantes" role="tab" aria-controls="estudiantes">Estudiantes Integrantes</a>
                    <a class="list-group-item list-group-item-action" id="list-docentes-list" data-bs-toggle="list" href="#list-docentes" role="tab" aria-controls="docentes">Docentes Líderes</a>
                    <a class="list-group-item list-group-item-action" id="list-contacto-list" data-bs-toggle="list" href="#list-contacto" role="tab" aria-controls="contacto">Contacto</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Descripción -->
                    <div class="tab-pane fade show active" id="list-intro" role="tabpanel" aria-labelledby="list-intro-list">
                        <h3>Descripción</h3>
                        <p><?php echo $semillero['descripcion']; ?></p>
                    </div>
                    <!-- Proyectos Relacionados -->
                    <div class="tab-pane fade" id="list-proyectos" role="tabpanel" aria-labelledby="list-proyectos-list">
                        <h3>Proyectos Relacionados</h3>
                        <div class="row">
                            <?php
                            $sqlProyectos = "SELECT p.proyecto_id, p.nombre, p.descripcion 
                                             FROM proyectos p
                                             JOIN proyecto_semilleros ps ON p.proyecto_id = ps.proyecto_id
                                             WHERE ps.semillero_id = $semillero_id";
                            $resultProyectos = $conn->query($sqlProyectos);
                            while($rowProyecto = $resultProyectos->fetch_assoc()) {
                                echo '<div class="col-md-6">';
                                echo '<div class="card card-relacionado">';
                                echo '<img src="../scr/proy/img_' . $rowProyecto["proyecto_id"] . '.jpg" class="card-img-top" alt="Imagen del proyecto relacionado">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $rowProyecto['nombre'] . '</h5>';
                                echo '<p class="card-text">' . $rowProyecto['descripcion'] . '</p>';
                                echo '<a href="detalle_proyecto.php?proyecto_id=' . $rowProyecto['proyecto_id'] . '" class="btn btn-primary">Conocer más</a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Póster del Proyecto -->
                    <div class="tab-pane fade" id="list-poster" role="tabpanel" aria-labelledby="list-poster-list">
                        <h3>Póster del Proyecto</h3>
                        <img src="https://via.placeholder.com/500" class="poster-img" alt="Póster del proyecto">
                    </div>
                    <!-- Estudiantes Integrantes -->
                    <div class="tab-pane fade" id="list-estudiantes" role="tabpanel" aria-labelledby="list-estudiantes-list">
                        <h3>Estudiantes Integrantes</h3>
                        <ul>
                            <?php
                            $sqlEstudiantes = "SELECT e.nombre 
                                               FROM estudiantes e
                                               JOIN proyecto_estudiantes pe ON e.estudiante_id = pe.estudiante_id
                                               JOIN proyectos p ON pe.proyecto_id = p.proyecto_id
                                               JOIN proyecto_semilleros ps ON p.proyecto_id = ps.proyecto_id
                                               WHERE ps.semillero_id = $semillero_id";
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
                                            JOIN proyectos p ON pd.proyecto_id = p.proyecto_id
                                            JOIN proyecto_semilleros ps ON p.proyecto_id = ps.proyecto_id
                                            WHERE ps.semillero_id = $semillero_id";
                            $resultDocentes = $conn->query($sqlDocentes);
                            while($rowDocente = $resultDocentes->fetch_assoc()) {
                                echo '<li>' . $rowDocente['nombre'] . '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Contacto -->
                    <div class="tab-pane fade" id="list-contacto" role="tabpanel" aria-labelledby="list-contacto-list">
                        <h3>Contacto</h3>
                        <p>Para más información, contacta a: <a href="mailto:<?php echo $semillero['contacto_email']; ?>"><?php echo $semillero['contacto_email']; ?></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
<?php $conn->close(); ?>
