<?php include("../includes/db.php") ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Agregar Semillero
    if (isset($_POST['addSemi'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $document = '';
        if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
            $document = '../docs/' . basename($_FILES['document']['name']);
            move_uploaded_file($_FILES['document']['tmp_name'], $document);
        }
        $video_url = $_POST['video_url'];
        addFinanciamientoContent('semi', ['title' => $title, 'description' => $description, 'document' => $document, 'video_url' => $video_url]);
    }

    // Agregar Proyecto Independiente
    if (isset($_POST['addIndep'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $document = '';
        if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
            $document = '../docs/' . basename($_FILES['document']['name']);
            move_uploaded_file($_FILES['document']['tmp_name'], $document);
        }
        $video_url = $_POST['video_url'];
        addFinanciamientoContent('indep', ['title' => $title, 'description' => $description, 'document' => $document, 'video_url' => $video_url]);
    }

    // Agregar Proyecto de Investigación
    if (isset($_POST['addInvest'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $document = '';
        if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
            $document = '../docs/' . basename($_FILES['document']['name']);
            move_uploaded_file($_FILES['document']['tmp_name'], $document);
        }
        $video_url = $_POST['video_url'];
        addFinanciamientoContent('invest', ['title' => $title, 'description' => $description, 'document' => $document, 'video_url' => $video_url]);
    }

    // Eliminar Semillero
    if (isset($_POST['deleteSemi'])) {
        $id = $_POST['id'];
        deleteFinanciamientoContent('semi', $id);
    }

    // Eliminar Proyecto Independiente
    if (isset($_POST['deleteIndep'])) {
        $id = $_POST['id'];
        deleteFinanciamientoContent('indep', $id);
    }

    // Eliminar Proyecto de Investigación
    if (isset($_POST['deleteInvest'])) {
        $id = $_POST['id'];
        deleteFinanciamientoContent('invest', $id);
    }
}

header('Location: admin_financiamiento.php');
exit;

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
