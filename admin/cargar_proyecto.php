<?php
include("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $proyecto_id = isset($_GET['proyecto_id']) ? $conn->real_escape_string($_GET['proyecto_id']) : '';

    // Obtener los datos del proyecto
    $sql = "SELECT * FROM proyectos WHERE proyecto_id = '$proyecto_id'";
    $result = $conn->query($sql);
    $proyecto = $result->fetch_assoc();

    // Obtener estudiantes asociados
    $sqlEstudiantes = "SELECT estudiantes.estudiante_id, estudiantes.nombre FROM estudiantes 
                       INNER JOIN proyecto_estudiantes ON estudiantes.estudiante_id = proyecto_estudiantes.estudiante_id 
                       WHERE proyecto_estudiantes.proyecto_id = '$proyecto_id'";
    $resultEstudiantes = $conn->query($sqlEstudiantes);
    $estudiantes = [];
    while ($rowEstudiante = $resultEstudiantes->fetch_assoc()) {
        $estudiantes[] = $rowEstudiante;
    }

    // Obtener docentes asociados
    $sqlDocentes = "SELECT docentes.docente_id, docentes.nombre FROM docentes 
                    INNER JOIN proyecto_docentes ON docentes.docente_id = proyecto_docentes.docente_id 
                    WHERE proyecto_docentes.proyecto_id = '$proyecto_id'";
    $resultDocentes = $conn->query($sqlDocentes);
    $docentes = [];
    while ($rowDocente = $resultDocentes->fetch_assoc()) {
        $docentes[] = $rowDocente;
    }

    // Obtener semilleros asociados
    $sqlSemilleros = "SELECT semilleros.semillero_id, semilleros.nombre FROM semilleros 
                      INNER JOIN proyecto_semilleros ON semilleros.semillero_id = proyecto_semilleros.semillero_id 
                      WHERE proyecto_semilleros.proyecto_id = '$proyecto_id'";
    $resultSemilleros = $conn->query($sqlSemilleros);
    $semilleros = [];
    while ($rowSemillero = $resultSemilleros->fetch_assoc()) {
        $semilleros[] = $rowSemillero;
    }

    // Devolver los datos como JSON
    echo json_encode([
        'nombre' => $proyecto['nombre'],
        'descripcion' => $proyecto['descripcion'],
        'documentacion' => $proyecto['documentacion'],
        'estudiantes' => $estudiantes,
        'docentes' => $docentes,
        'semilleros' => $semilleros
    ]);
}
?>
