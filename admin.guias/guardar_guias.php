<?php include("../includes/db.php") ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Guardar Introducción
    if (isset($_POST['saveIntro'])) {
        $introContent = $conn->real_escape_string($_POST['introContent']);
        saveGuideContent('intro', $introContent);
    }

    // Agregar Video
    if (isset($_POST['addVideo'])) {
        $videoTitle = $conn->real_escape_string($_POST['videoTitle']);
        $videoURL = $conn->real_escape_string($_POST['videoURL']);
        addGuideContent('videos', ['title' => $videoTitle, 'url' => $videoURL]);
    }

    // Eliminar Video
    if (isset($_POST['deleteVideo'])) {
        $videoId = $conn->real_escape_string($_POST['videoId']);
        deleteGuideContent('videos', $videoId);
    }

    // Agregar Documento
    if (isset($_POST['addDocument'])) {
        $documentTitle = $conn->real_escape_string($_POST['documentTitle']);
        $documentDescription = $conn->real_escape_string($_POST['documentDescription']);
        $documentFile = '';
        if (isset($_FILES['documentFile']) && $_FILES['documentFile']['error'] == 0) {
            $documentFile = '../scr/doc/' . basename($_FILES['documentFile']['name']);
            move_uploaded_file($_FILES['documentFile']['tmp_name'], $documentFile);
        }
        addGuideContent('documents', ['title' => $documentTitle, 'description' => $documentDescription, 'file' => $documentFile]);
    }

    // Eliminar Documento
    if (isset($_POST['deleteDocument'])) {
        $documentId = $conn->real_escape_string($_POST['documentId']);
        deleteGuideContent('documents', $documentId);
    }
}

header('Location: guias.php');
exit;

function saveGuideContent($section, $content) {
    global $conn;
    $sql = "UPDATE guias SET content = '$content' WHERE section = '$section'";
    $conn->query($sql);
}

function addGuideContent($section, $content) {
    global $conn;
    $columns = implode(", ", array_keys($content));
    $values = implode("', '", array_values($content));
    $sql = "INSERT INTO guias_$section ($columns) VALUES ('$values')";
    $conn->query($sql);
}

function deleteGuideContent($section, $id) {
    global $conn;
    $sql = "DELETE FROM guias_$section WHERE id = $id";
    $conn->query($sql);
}

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
