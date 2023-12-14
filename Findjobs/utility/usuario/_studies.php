<!-- Botón para abrir el modal -->


<!-- Modal para agregar licenciatura -->
<div class="modal fade" id="modalstudies" tabindex="-1" aria-labelledby="modalLicenciaturaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLicenciaturaLabel">Agregar Licenciatura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="studies" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la carrera:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="institucion" class="form-label">Institución:</label>
                        <input type="text" class="form-control" id="institucion" name="institucion" required>
                    </div>
                    <div class="mb-3">
                        <label for="nivel_educativo" class="form-label">Nivel educativo:</label>
                        <select class="form-select" id="nivel_educativo" name="nivel_educativo" required>
                            <option value="">Seleccione un nivel educativo</option>
                            <option value="Universitario">Universitario</option>
                            <option value="Técnico">Técnico</option>
                            <option value="Bachiller">Bachiller</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    </div>
                    <div class="mb-3">
                        <label for="fecha_fin" class="form-label">Fecha de finalización:</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                    </div>

                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>