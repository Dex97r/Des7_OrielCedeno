<div class="modal fade" id="informacionModal" tabindex="-1" aria-labelledby="informacionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="contact" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="informacionModalLabel">Editar información de contacto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $contact['telefono'] ?>">
          </div>
          <div class="mb-3">
            <label for="celular" class="form-label">Celular:</label>
            <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $contact['celular'] ?>">
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo:</label>
            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $contact['correo'] ?>">
          </div>
          <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <textarea class="form-control" id="direccion" name="direccion" rows="3"><?php echo $contact['direccion'] ?></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
