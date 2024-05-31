$(document).ready(function() {
    function setupForm(actionUrl, isModify = false) {
        let selectedEstudiantes = [];
        let selectedDocentes = [];
        let selectedSemilleros = [];

        function updateSelectedList(type, selected) {
            let html = '';
            selected.forEach(item => {
                html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                    ${item.nombre}
                    <button type="button" class="btn btn-sm btn-danger" onclick="remove${type}(${item.id})">Eliminar</button>
                    <input type="hidden" name="${type.toLowerCase()}s[]" value="${item.id}">
                 </li>`;
            });
            $(`#selected${type}s`).html(html);
        }

        window.removeEstudiante = function(id) {
            selectedEstudiantes = selectedEstudiantes.filter(item => item.id !== id);
            updateSelectedList('Estudiante', selectedEstudiantes);
        };

        window.removeDocente = function(id) {
            selectedDocentes = selectedDocentes.filter(item => item.id !== id);
            updateSelectedList('Docente', selectedDocentes);
        };

        window.removeSemillero = function(id) {
            selectedSemilleros = selectedSemilleros.filter(item => item.id !== id);
            updateSelectedList('Semillero', selectedSemilleros);
        };

        $('#operationForm').html(`
            <h3>${isModify ? 'Modificar' : 'Crear'} Proyecto</h3>
            <form id="projectForm" action="${actionUrl}" method="POST" enctype="multipart/form-data">
                ${isModify ? `
                <div class="mb-3">
                    <label for="proyecto_id" class="form-label">Seleccionar Proyecto</label>
                    <select class="form-control" id="proyecto_id" name="proyecto_id" required>
                        <!-- Opciones cargadas dinámicamente -->
                    </select>
                </div>` : ''}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Proyecto</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="documentacion" class="form-label">Documentación</label>
                    <input type="text" class="form-control" id="documentacion" name="documentacion" required>
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del Proyecto</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" ${isModify ? '' : 'required'}>
                </div>
                <div class="mb-3">
                    <label for="buscar_estudiantes" class="form-label">Buscar Estudiantes</label>
                    <input type="text" class="form-control" id="buscar_estudiantes" placeholder="Escriba para buscar">
                    <ul id="lista_estudiantes" class="list-group mt-2"></ul>
                </div>
                <div class="mb-3">
                    <label for="buscar_docentes" class="form-label">Buscar Docentes</label>
                    <input type="text" class="form-control" id="buscar_docentes" placeholder="Escriba para buscar">
                    <ul id="lista_docentes" class="list-group mt-2"></ul>
                </div>
                <div class="mb-3">
                    <label for="buscar_semilleros" class="form-label">Buscar Semilleros</label>
                    <input type="text" class="form-control" id="buscar_semilleros" placeholder="Escriba para buscar">
                    <ul id="lista_semilleros" class="list-group mt-2"></ul>
                </div>
                <div class="mb-3">
                    <h5>Estudiantes Seleccionados</h5>
                    <ul id="selectedEstudiantes" class="list-group mt-2"></ul>
                </div>
                <div class="mb-3">
                    <h5>Docentes Seleccionados</h5>
                    <ul id="selectedDocentes" class="list-group mt-2"></ul>
                </div>
                <div class="mb-3">
                    <h5>Semilleros Seleccionados</h5>
                    <ul id="selectedSemilleros" class="list-group mt-2"></ul>
                </div>
                <button type="submit" class="btn btn-primary">${isModify ? 'Modificar' : 'Crear'}</button>
            </form>
        `);

        if (isModify) {
            $.ajax({
                url: 'obtener_proyectos.php',
                method: 'GET',
                success: function(response) {
                    const proyectos = JSON.parse(response);
                    let opciones = '';
                    proyectos.forEach(proyecto => {
                        opciones += `<option value="${proyecto.proyecto_id}">${proyecto.nombre}</option>`;
                    });
                    $('#proyecto_id').html(opciones);
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar proyectos: ", status, error);
                }
            });

            $('#proyecto_id').change(function() {
                const proyectoId = $(this).val();
                $.ajax({
                    url: 'cargar_proyecto.php',
                    method: 'GET',
                    data: { proyecto_id: proyectoId },
                    success: function(response) {
                        const proyecto = JSON.parse(response);
                        $('#nombre').val(proyecto.nombre);
                        $('#descripcion').val(proyecto.descripcion);
                        $('#documentacion').val(proyecto.documentacion);
                        // Cargar estudiantes, docentes y semilleros seleccionados
                        selectedEstudiantes = proyecto.estudiantes.map(est => ({ id: est.estudiante_id, nombre: est.nombre }));
                        selectedDocentes = proyecto.docentes.map(doc => ({ id: doc.docente_id, nombre: doc.nombre }));
                        selectedSemilleros = proyecto.semilleros.map(sem => ({ id: sem.semillero_id, nombre: sem.nombre }));
                        updateSelectedList('Estudiante', selectedEstudiantes);
                        updateSelectedList('Docente', selectedDocentes);
                        updateSelectedList('Semillero', selectedSemilleros);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al cargar datos del proyecto: ", status, error);
                    }
                });
            });
        }

        $('#buscar_estudiantes').on('input', function() {
            const query = $(this).val();
            $.ajax({
                url: 'buscar_estudiantes.php',
                method: 'GET',
                data: { query },
                success: function(response) {
                    const estudiantes = JSON.parse(response);
                    let html = '';
                    estudiantes.forEach(estudiante => {
                        html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                            ${estudiante.nombre}
                            <button type="button" class="btn btn-sm btn-success" onclick="addEstudiante(${estudiante.estudiante_id}, '${estudiante.nombre}')">Agregar</button>
                         </li>`;
                    });
                    $('#lista_estudiantes').html(html);
                }
            });
        });

        $('#buscar_docentes').on('input', function() {
            const query = $(this).val();
            $.ajax({
                url: 'buscar_docentes.php',
                method: 'GET',
                data: { query },
                success: function(response) {
                    const docentes = JSON.parse(response);
                    let html = '';
                    docentes.forEach(docente => {
                        html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                            ${docente.nombre}
                            <button type="button" class="btn btn-sm btn-success" onclick="addDocente(${docente.docente_id}, '${docente.nombre}')">Agregar</button>
                         </li>`;
                    });
                    $('#lista_docentes').html(html);
                }
            });
        });

        $('#buscar_semilleros').on('input', function() {
            const query = $(this).val();
            $.ajax({
                url: 'buscar_semilleros.php',
                method: 'GET',
                data: { query },
                success: function(response) {
                    const semilleros = JSON.parse(response);
                    let html = '';
                    semilleros.forEach(semillero => {
                        html += `<li class="list-group-item d-flex justify-content-between align-items-center">
                            ${semillero.nombre}
                            <button type="button" class="btn btn-sm btn-success" onclick="addSemillero(${semillero.semillero_id}, '${semillero.nombre}')">Agregar</button>
                         </li>`;
                    });
                    $('#lista_semilleros').html(html);
                }
            });
        });

        window.addEstudiante = function(id, nombre) {
            selectedEstudiantes.push({ id, nombre });
            updateSelectedList('Estudiante', selectedEstudiantes);
        };

        window.addDocente = function(id, nombre) {
            selectedDocentes.push({ id, nombre });
            updateSelectedList('Docente', selectedDocentes);
        };

        window.addSemillero = function(id, nombre) {
            selectedSemilleros.push({ id, nombre });
            updateSelectedList('Semillero', selectedSemilleros);
        };
    }

    $('#createProject').click(function() {
        setupForm('crear_proyecto.php');
    });

    $('#modifyProject').click(function() {
        setupForm('modificar_proyecto.php', true);
    });

    $('#deleteProject').click(function() {
        $.ajax({
            url: 'obtener_proyectos.php',
            method: 'GET',
            success: function(response) {
                const proyectos = JSON.parse(response);
                let opciones = '';
                proyectos.forEach(proyecto => {
                    opciones += `<option value="${proyecto.proyecto_id}">${proyecto.nombre}</option>`;
                });
                $('#operationForm').html(`
                    <h3>Eliminar Proyecto</h3>
                    <form action="eliminar_proyecto.php" method="POST">
                        <div class="mb-3">
                            <label for="proyecto_id" class="form-label">Seleccionar Proyecto</label>
                            <select class="form-control" id="proyecto_id" name="proyecto_id" required>
                                ${opciones}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                `);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar proyectos: ", status, error);
            }
        });
    });
});
