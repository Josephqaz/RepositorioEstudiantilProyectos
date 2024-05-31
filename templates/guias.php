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

function getYouTubeEmbedUrl($url) {
    $parsedUrl = parse_url($url);
    parse_str($parsedUrl['query'], $queryParams);
    if (isset($queryParams['v'])) {
        return 'https://www.youtube.com/embed/' . $queryParams['v'];
    }
    return $url;
}
?>
<body>
    <div class="container mt-5">
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
                        <p><?php echo getGuideContent('intro'); ?></p>
                    </div>
                    <!-- Videos -->
                    <div class="tab-pane fade" id="list-videos" role="tabpanel" aria-labelledby="list-videos-list">
                        <h2>Videos</h2>
                        <?php
                        $videos = getGuideContent('videos');
                        foreach ($videos as $video) {
                            $embedUrl = getYouTubeEmbedUrl($video['url']);
                            echo '<h5>' . $video['title'] . '</h5>';
                            echo '<div class="video-container">';
                            echo '<iframe src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>';
                            echo '</div>';
                            
                        }
                        ?>
                    </div>
                    <!-- Documentos -->
                    <div class="tab-pane fade" id="list-documents" role="tabpanel" aria-labelledby="list-documents-list">
                        <h2>Documentos</h2>
                        <?php
                        $documents = getGuideContent('documents');
                        foreach ($documents as $document) {
                            echo '<div class="card mb-3">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $document['title'] . '</h5>';
                            echo '<p class="card-text">' . $document['description'] . '</p>';
                            echo '<a href="' . $document['file'] . '" class="btn btn-primary" target="_blank">Descargar</a>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
</html>
