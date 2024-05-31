<?php include("../includes/header.php") ?>
<?php include("../includes/db.php") ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrar Semilleros - Repositorio ETITC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/repositorio.css">
</head>
<body>
<div class="container mt-5 semi-transparent-bg">
        <h2>Administrar Semilleros</h2>
        <div class="dropdown mb-3">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Seleccionar Operación
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#" id="createSemillero">Crear Semillero</a></li>
                <li><a class="dropdown-item" href="#" id="modifySemillero">Modificar Semillero</a></li>
                <li><a class="dropdown-item" href="#" id="deleteSemillero">Eliminar Semillero</a></li>
            </ul>
        </div>
        <div id="operationForm">
            <!-- El formulario de operación seleccionado se cargará aquí -->
        </div>
    </div>
</body>
<?php include("../includes/footer.php") ?>
