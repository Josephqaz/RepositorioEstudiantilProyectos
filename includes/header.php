<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repositorio ETITC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/repositorio.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Repositorio ETITC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../templates/index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../templates/proyectos.php">Proyectos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../templates/guias.php">Guias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../templates/docentes_investigadores.php">Docentes Investigadores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../templates/financiamiento.php">Financiamiento</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../templates/semilleros.php">Semilleros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../templates/contacto.php">Contacto</a>
                    </li>
                </ul>
                <!-- Barra de búsqueda -->
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Buscar">
                    <button class="btn btn-outline-success search-button" type="submit">Buscar</button>
                </form>
                <!-- Botón de inicio de sesión o menú de usuario -->
                <div class="d-flex">
                    <?php if (isset($_SESSION['usuario_id'])): ?>
                        <div class="dropdown">
                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION['email']; ?>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="../admin/proyectos.php">Administrar Proyectos</a></li>
                                <li><a class="dropdown-item" href="../admin.doc/admin_docentes.php">Administrar Docentes</a></li>
                                <li><a class="dropdown-item" href="../admin.sem/admin_semilleros.php">Administrar Semilleros</a></li>
                                <li><a class="dropdown-item" href="../admin.guias/guias.php">Administrar Guias</a></li> 
                                <li><a class="dropdown-item" href="../admin.fin/admin_financiamiento.php">Administrar Financiamiento</a></li> 
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="../users/logout.php">Cerrar Sesión</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <a class="nav-link btn btn-outline-primary" href="#" role="button" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Modal de Inicio de Sesión -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../users/login.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
