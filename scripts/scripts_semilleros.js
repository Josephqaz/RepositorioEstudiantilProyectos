$(document).ready(function() {
    function setupSemilleroForm(actionUrl, isModify = false) {
        $('#operationForm').html(`
            <h3>${isModify ? 'Modificar' : 'Crear'} Semillero</h3>
            <form id="semilleroForm" action="${actionUrl}" method="POST" enctype="multipart/form-data">
                ${isModify ? `
                <div class="mb-3">
                    <label for="semillero_id" class="form-label">Seleccionar Semillero</label>
                    <select class="form-control" id="semillero_id" name="semillero_id" required>
                        <!-- Opciones cargadas dinámicamente -->
                    </select>
                </div>` : ''}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Semillero</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="contacto_email" class="form-label">Email de Contacto</label>
                    <input type="text" class="form-control" id="contacto_email" name="contacto_email">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen del Semillero</label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" ${isModify ? '' : 'required'}>
                </div>
                <button type="submit" class="btn btn-primary">${isModify ? 'Modificar' : 'Crear'}</button>
            </form>
        `);

        if (isModify) {
            $.ajax({
                url: 'obtener_semilleros.php',
                method: 'GET',
                success: function(response) {
                    const semilleros = JSON.parse(response);
                    let opciones = '';
                    semilleros.forEach(semillero => {
                        opciones += `<option value="${semillero.semillero_id}">${semillero.nombre}</option>`;
                    });
                    $('#semillero_id').html(opciones);
                },
                error: function(xhr, status, error) {
                    console.error("Error al cargar semilleros: ", status, error);
                }
            });

            $('#semillero_id').change(function() {
                const semilleroId = $(this).val();
                $.ajax({
                    url: 'cargar_semillero.php',
                    method: 'GET',
                    data: { semillero_id: semilleroId },
                    success: function(response) {
                        const semillero = JSON.parse(response);
                        $('#nombre').val(semillero.nombre);
                        $('#descripcion').val(semillero.descripcion);
                        $('#contacto_email').val(semillero.contacto_email);
                        // No cargamos la imagen, ya que es un campo de archivo
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al cargar datos del semillero: ", status, error);
                    }
                });
            });
        }
    }

    $('#createSemillero').click(function() {
        setupSemilleroForm('crear_semillero.php');
    });

    $('#modifySemillero').click(function() {
        setupSemilleroForm('modificar_semillero.php', true);
    });

    $('#deleteSemillero').click(function() {
        $.ajax({
            url: 'obtener_semilleros.php',
            method: 'GET',
            success: function(response) {
                const semilleros = JSON.parse(response);
                let opciones = '';
                semilleros.forEach(semillero => {
                    opciones += `<option value="${semillero.semillero_id}">${semillero.nombre}</option>`;
                });
                $('#operationForm').html(`
                    <h3>Eliminar Semillero</h3>
                    <form action="eliminar_semillero.php" method="POST">
                        <div class="mb-3">
                            <label for="semillero_id" class="form-label">Seleccionar Semillero</label>
                            <select class="form-control" id="semillero_id" name="semillero_id" required>
                                ${opciones}
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                `);
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar semilleros: ", status, error);
            }
        });
    });
});
