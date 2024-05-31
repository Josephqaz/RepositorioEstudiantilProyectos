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
        <h2>Financiamiento</h2>
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
                        <?php
                        $semis = getFinanciamientoContent('semi');
                        foreach ($semis as $semi) {
                            echo '<div class="mb-3">';
                            echo '<h5>' . $semi['title'] . '</h5>';
                            echo '<p>' . $semi['description'] . '</p>';
                            if ($semi['document']) {
                                echo '<a href="' . $semi['document'] . '" class="btn btn-primary" target="_blank">Ver Documento</a>';
                            }
                            if ($semi['video_url']) {
                                $embedUrl = getYouTubeEmbedUrl($semi['video_url']);
                                echo '<div class="video-container mt-3">';
                                echo '<iframe src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>';
                                echo '</div>';
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <!-- Proyecto Independiente -->
                    <div class="tab-pane fade" id="list-indep" role="tabpanel" aria-labelledby="list-indep-list">
                        <h3>Proyecto Independiente</h3>
                        <?php
                        $indeps = getFinanciamientoContent('indep');
                        foreach ($indeps as $indep) {
                            echo '<div class="mb-3">';
                            echo '<h5>' . $indep['title'] . '</h5>';
                            echo '<p>' . $indep['description'] . '</p>';
                            if ($indep['document']) {
                                echo '<a href="' . $indep['document'] . '" class="btn btn-primary" target="_blank">Ver Documento</a>';
                            }
                            if ($indep['video_url']) {
                                $embedUrl = getYouTubeEmbedUrl($indep['video_url']);
                                echo '<div class="video-container mt-3">';
                                echo '<iframe src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>';
                                echo '</div>';
                            }
                            echo '</div>';
                        }
                        ?>
                    </div>
                    <!-- Proyecto de Investigación -->
                    <div class="tab-pane fade" id="list-invest" role="tabpanel" aria-labelledby="list-invest-list">
                        <h3>Proyecto de Investigación</h3>
                        <?php
                        $invests = getFinanciamientoContent('invest');
                        foreach ($invests as $invest) {
                            echo '<div class="mb-3">';
                            echo '<h5>' . $invest['title'] . '</h5>';
                            echo '<p>' . $invest['description'] . '</p>';
                            if ($invest['document']) {
                                echo '<a href="' . $invest['document'] . '" class="btn btn-primary" target="_blank">Ver Documento</a>';
                            }
                            if ($invest['video_url']) {
                                $embedUrl = getYouTubeEmbedUrl($invest['video_url']);
                                echo '<div class="video-container mt-3">';
                                echo '<iframe src="' . $embedUrl . '" frameborder="0" allowfullscreen></iframe>';
                                echo '</div>';
                            }
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
