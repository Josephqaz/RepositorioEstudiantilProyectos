<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>

<?php
function getGuideContent($section) {
    global $conn;
    if ($section == 'intro') {
        $sql = "SELECT content FROM guias WHERE section = 'intro'";
        $result = $conn->query($sql);
        return $result->fetch_assoc()['content'];
    } else {
        $sql = "SELECT * FROM guias_$section";
        $result = $conn->query($sql);
        $content = [];
        while ($row = $result->fetch_assoc()) {
            $content[] = $row;
        }
        return $content;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modificar Guias - Repositorio ETITC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/repositorio.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h2>Modificar Guias</h2>
        <div class="row">
            <div class="col-md-3 menu-container">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-intro-list" data-bs-toggle="list" href="#list-intro" role="tab" aria-controls="intro">Introducción</a>
                    <a class="list-group-item list-group-item-action" id="list-videos-list" data-bs-toggle="list" href="#list-videos" role="tab" aria-controls="videos">Videos</a>
                    <a class="list-group-item list-group-item-action" id="list-documents-list" data-bs-toggle="list" href="#list-documents" role="tab" aria-controls="documents">Documentos</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content content-container" id="nav-tabContent">
                    <!-- Introducción -->
                    <div class="tab-pane fade show active" id="list-intro" role="tabpanel" aria-labelledby="list-intro-list">
                        <h2>Introducción</h2>
                        <form action="guardar_guias.php" method="POST">
                            <div class="mb-3">
                                <label for="introContent" class="form-label">Contenido de Introducción</label>
                                <textarea class="form-control" id="introContent" name="introContent" rows="5"><?php echo getGuideContent('intro'); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="saveIntro">Guardar</button>
                        </form>
                    </div>
                    <!-- Videos -->
                    <div class="tab-pane fade" id="list-videos" role="tabpanel" aria-labelledby="list-videos-list">
                        <h2>Videos</h2>
                        <form action="guardar_guias.php" method="POST">
                            <div class="mb-3">
                                <label for="videoTitle" class="form-label">Título del Video</label>
                                <input type="text" class="form-control" id="videoTitle" name="videoTitle">
                            </div>
                            <div class="mb-3">
                                <label for="videoURL" class="form-label">URL del Video</label>
                                <input type="text" class="form-control" id="videoURL" name="videoURL">
                            </div>
                            <button type="submit" class="btn btn-primary" name="addVideo">Agregar Video</button>
                        </form>
                        <h3 class="mt-4">Videos Actuales</h3>
                        <ul class="list-group">
                            <?php
                            $videos = getGuideContent('videos');
                            foreach ($videos as $video) {
                                echo '<li class="list-group-item">';
                                echo '<h5>' . $video['title'] . '</h5>';
                                echo '<p>' . $video['url'] . '</p>';
                                echo '<form action="guardar_guias.php" method="POST" class="d-inline">';
                                echo '<input type="hidden" name="videoId" value="' . $video['id'] . '">';
                                echo '<button type="submit" class="btn btn-danger btn-sm" name="deleteVideo">Eliminar</button>';
                                echo '</form>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <!-- Documentos -->
                    <div class="tab-pane fade" id="list-documents" role="tabpanel" aria-labelledby="list-documents-list">
                        <h2>Documentos</h2>
                        <form action="guardar_guias.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="documentTitle" class="form-label">Título del Documento</label>
                                <input type="text" class="form-control" id="documentTitle" name="documentTitle">
                            </div>
                            <div class="mb-3">
                                <label for="documentDescription" class="form-label">Descripción del Documento</label>
                                <textarea class="form-control" id="documentDescription" name="documentDescription" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="documentFile" class="form-label">Archivo del Documento</label>
                                <input type="file" class="form-control" id="documentFile" name="documentFile">
                            </div>
                            <button type="submit" class="btn btn-primary" name="addDocument">Agregar Documento</button>
                        </form>
                        <h3 class="mt-4">Documentos Actuales</h3>
                        <ul class="list-group">
                            <?php
                            $documents = getGuideContent('documents');
                            foreach ($documents as $document) {
                                echo '<li class="list-group-item">';
                                echo '<h5>' . $document['title'] . '</h5>';
                                echo '<p>' . $document['description'] . '</p>';
                                echo '<a href="' . $document['file'] . '" class="btn btn-primary btn-sm" target="_blank">Ver Documento</a> ';
                                echo '<form action="guardar_guias.php" method="POST" class="d-inline">';
                                echo '<input type="hidden" name="documentId" value="' . $document['id'] . '">';
                                echo '<button type="submit" class="btn btn-danger btn-sm" name="deleteDocument">Eliminar</button>';
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
