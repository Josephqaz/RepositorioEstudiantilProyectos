$(document).ready(function() {
    function setupDocenteForm(actionUrl, isModify = false) {
        $('#operationForm').html(`
            <h3>${isModify ? 'Modificar' : 'Crear'} Docente</h3>
            <form id="docenteForm" action="${actionUrl}" method="POST" enctype="multipart/form-data">
                ${isModify ? `
                <div class="mb-3">
                    <label for="docente_id" class="form-label">Seleccionar Docente</label>
                    <select class="form-control" id="docente_id" name="docente_id" required>
                        <!-- Opciones cargadas dinámicamente -->
                    </select>
                </div>` : ''}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Docente</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="cargo" class="form-label">Cargo</label>
                    <input type="text" class="form-control" id="cargo" name="cargo">
                </div>
                <div class="mb-3">
                    <label for="formacion_academica" class="form-label">Formación Académica</label>
                    <textarea class="form-control" id="formacion_academica" name="formacion_academica" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del Docente</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" ${isModify ? '' : 'required'}>
                </div>
                <button type="submit" class="btn btn-primary">${isModify ? 'Modificar' : 'Crear'}</button>
            </form>
        `);

        if (isModify) {
            $.ajax({
                url: 'obtener_docentes.php',
                method: 'GET',
                success: function(response) {
                    const docentes = JSON.parse(response);
                    let opciones = '';
                    docentes.forEach(docente => {
                        opciones += `<option value="${docente.docente_id}">${docente.nombre}</option>`;
                    });
                    $('#docente_id').html(opciones);
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar docentes: ", status, error);
                }
            });

            $('#docente_id').change(function() {
                const docenteId = $(this).val();
                $.ajax({
                    url: 'cargar_docente.php',
                    method: 'GET',
                    data: { docente_id: docenteId },
                    success: function(response) {
                        const docente = JSON.parse(response);
                        $('#nombre').val(docente.nombre);
                        $('#cargo').val(docente.cargo);
                        $('#formacion_academica').val(docente.formacion_academica);
                        $('#email').val(docente.email);
                        // No cargamos la imagen, ya que es un campo de archivo
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al cargar datos del docente: ", status, error);
                    }
                });
            });
        }
    }

    $('#createDocente').click(function() {
        setupDocenteForm('crear_docente.php');
    });

    $('#modifyDocente').click(function() {
        setupDocenteForm('modificar_docente.php', true);
    });

    $('#deleteDocente').click(function() {
        $.ajax({
            url: 'obtener_docentes.php',
            method: 'GET',
            success: function(response) {
                const docentes = JSON.parse(response);
                let opciones = '';
                docentes.forEach(docente => {
                    opciones += `<option value="${docente.docente_id}">${docente.nombre}</option>`;
                });
                $('#operationForm').html(`
                    <h3>Eliminar Docente</h3>
                    <form action="eliminar_docente.php" method="POST">
                        <div class="mb-3">
                            <label for="docente_id" class="form-label">Seleccionar Docente</label>
                            <select class="form-control" id="docente_id" name="docente_id" required>
                                ${opciones}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                `);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar docentes: ", status, error);
            }
        });
    });
});
