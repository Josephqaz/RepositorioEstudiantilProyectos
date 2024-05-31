<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>

<?php
function getFinanciamientoContent($section) {
    global $conn;
    $sql = "SELECT * FROM financiamiento_$section";
    $result = $conn->query($sql);
    $content = [];
    while ($row = $result->fetch_assoc()) {
        $content[] = $row;
    }
    return $content;
}

function addFinanciamientoContent($section, $data) {
    global $conn;
    $title = $conn->real_escape_string($data['title']);
    $description = $conn->real_escape_string($data['description']);
    $document = $conn->real_escape_string($data['document']);
    $video_url = $conn->real_escape_string($data['video_url']);
    $sql = "INSERT INTO financiamiento_$section (title, description, document, video_url) VALUES ('$title', '$description', '$document', '$video_url')";
    $conn->query($sql);
}

function deleteFinanciamientoContent($section, $id) {
    global $conn;
    $sql = "DELETE FROM financiamiento_$section WHERE id = $id";
    $conn->query($sql);
}
?>
<body>
    <div class="container mt-5">
        <h2>Administrar Financiamiento</h2>
        <div class="row">
            <div class="col-md-3 menu-container">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-semi-list" data-bs-toggle="list" href="#list-semi" role="tab" aria-controls="semi">Semillero</a>
                    <a class="list-group-item list-group-item-action" id="list-indep-list" data-bs-toggle="list" href="#list-indep" role="tab" aria-controls="indep">Proyecto Independiente</a>
                    <a class="list-group-item list-group-item-action" id="list-invest-list" data-bs-toggle="list" href="#list-invest" role="tab" aria-controls="invest">Proyecto de Investigación</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content content-container" id="nav-tabContent">
                    <!-- Semillero -->
                    <div class="tab-pane fade show active" id="list-semi" role="tabpanel" aria-labelledby="list-semi-list">
                        <h3>Semillero</h3>
                        <form action="guardar_financiamiento.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="semiTitle" class="form-label">Título</label>
                                <input type="text" class="form-control" id="semiTitle" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="semiDescription" class="form-label">Descripción</label>
                                <textarea class="form-control" id="semiDescription" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="semiDocument" class="form-label">Documento</label>
                                <input type="file" class="form-control" id="semiDocument" name="document">
                            </div>
                            <div class="mb-3">
                                <label for="semiVideoURL" class="form-label">URL del Video</label>
                                <input type="text" class="form-control" id="semiVideoURL" name="video_url">
                            </div>
                            <button type="submit" class="btn btn-primary" name="addSemi">Agregar Semillero</button>
                        </form>
                        <h4 class="mt-4">Contenido Actual</h4>
                        <ul class="list-group">
                            <?php
                            $semis = getFinanciamientoContent('semi');
                            foreach ($semis as $semi) {
                                echo '<li class="list-group-item">';
                                echo '<h5>' . $semi['title'] . '</h5>';
                                echo '<p>' . $semi['description'] . '</p>';
                                echo '<a href="' . $semi['document'] . '" class="btn btn-primary btn-sm" target="_blank">Ver Documento</a> ';
                                echo '<a href="' . $semi['video_url'] . '" class="btn btn-secondary btn-sm" target="_blank">Ver Video</a> ';
                                echo '<form action="guardar_financiamiento.php" method="POST" class="d-inline">';
                                echo '<input type="hidden" name="id" value="' . $semi['id'] . '">';
                                echo '<button type="submit" class="btn btn-danger btn-sm" name="deleteSemi">Eliminar</button>';
                                echo '</form>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Proyecto Independiente -->
                    <div class="tab-pane fade" id="list-indep" role="tabpanel" aria-labelledby="list-indep-list">
                        <h3>Proyecto Independiente</h3>
                        <form action="guardar_financiamiento.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="indepTitle" class="form-label">Título</label>
                                <input type="text" class="form-control" id="indepTitle" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="indepDescription" class="form-label">Descripción</label>
                                <textarea class="form-control" id="indepDescription" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="indepDocument" class="form-label">Documento</label>
                                <input type="file" class="form-control" id="indepDocument" name="document">
                            </div>
                            <div class="mb-3">
                                <label for="indepVideoURL" class="form-label">URL del Video</label>
                                <input type="text" class="form-control" id="indepVideoURL" name="video_url">
                            </div>
                            <button type="submit" class="btn btn-primary" name="addIndep">Agregar Proyecto Independiente</button>
                        </form>
                        <h4 class="mt-4">Contenido Actual</h4>
                        <ul class="list-group">
                            <?php
                            $indeps = getFinanciamientoContent('indep');
                            foreach ($indeps as $indep) {
                                echo '<li class="list-group-item">';
                                echo '<h5>' . $indep['title'] . '</h5>';
                                echo '<p>' . $indep['description'] . '</p>';
                                echo '<a href="' . $indep['document'] . '" class="btn btn-primary btn-sm" target="_blank">Ver Documento</a> ';
                                echo '<a href="' . $indep['video_url'] . '" class="btn btn-secondary btn-sm" target="_blank">Ver Video</a> ';
                                echo '<form action="guardar_financiamiento.php" method="POST" class="d-inline">';
                                echo '<input type="hidden" name="id" value="' . $indep['id'] . '">';
                                echo '<button type="submit" class="btn btn-danger btn-sm" name="deleteIndep">Eliminar</button>';
                                echo '</form>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Proyecto de Investigación -->
                    <div class="tab-pane fade" id="list-invest" role="tabpanel" aria-labelledby="list-invest-list">
                        <h3>Proyecto de Investigación</h3>
                        <form action="guardar_financiamiento.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="investTitle" class="form-label">Título</label>
                                <input type="text" class="form-control" id="investTitle" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="investDescription" class="form-label">Descripción</label>
                                <textarea class="form-control" id="investDescription" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="investDocument" class="form-label">Documento</label>
                                <input type="file" class="form-control" id="investDocument" name="document">
                            </div>
                            <div class="mb-3">
                                <label for="investVideoURL" class="form-label">URL del Video</label>
                                <input type="text" class="form-control" id="investVideoURL" name="video_url">
                            </div>
                            <button type="submit" class="btn btn-primary" name="addInvest">Agregar Proyecto de Investigación</button>
                        </form>
                        <h4 class="mt-4">Contenido Actual</h4>
                        <ul class="list-group">
                            <?php
                            $invests = getFinanciamientoContent('invest');
                            foreach ($invests as $invest) {
                                echo '<li class="list-group-item">';
                                echo '<h5>' . $invest['title'] . '</h5>';
                                echo '<p>' . $invest['description'] . '</p>';
                                echo '<a href="' . $invest['document'] . '" class="btn btn-primary btn-sm" target="_blank">Ver Documento</a> ';
                                echo '<a href="' . $invest['video_url'] . '" class="btn btn-secondary btn-sm" target="_blank">Ver Video</a> ';
                                echo '<form action="guardar_financiamiento.php" method="POST" class="d-inline">';
                                echo '<input type="hidden" name="id" value="' . $invest['id'] . '">';
                                echo '<button type="submit" class="btn btn-danger btn-sm" name="deleteInvest">Eliminar</button>';
                                echo '</form>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
</html>
