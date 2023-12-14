<!-- Modal -->

<div class="modal fade" id="perfildata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php

  ?>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="modal-uinfo" method="post">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" id="nombre" value="<?php echo $_SESSION['name'] . " " . $_SESSION['lastname']; ?>">
          </div>
          <div class="mb-3">
            <label for="nacionalidad" class="form-label">Nacionalidad</label>
            <select class="form-select" id="nacionalidad" name="nacionalidad">
              <option value="Panama" selected>Panamá</option>  
            </select>
          </div>
          <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento" value="<?php echo $fila['fecha_nacimiento'] ?>">
          </div>
          <div class="mb-3">
            <label for="genero" class="form-label">Sexo</label>
            <select class="form-select" id="genero" name="genero">
              <option value="Masculino" selected>Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Undefined">Indefinido</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="estado_civil" class="form-label">Estado civil</label>
            <select class="form-select" id="estado_civil" name="estado_civil">
              <option value="Soltero/a" selected>Soltero/a</option>
              <option value="Casado/a">Casado/a</option>
              <option value="Divorciado/a">Divorciado/a</option>
              <option value="Viudo/a">Viudo/a</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="documento" class="form-label">Documento</label>
            <input type="text" class="form-control" name="documento" id="documento" value="<?php echo $fila['documento'] ?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar cambios</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>