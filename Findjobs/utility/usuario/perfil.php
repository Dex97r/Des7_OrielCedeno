<?php
   if($fila['photo'] === 'undefined'){
    $fila['photo'] = 'images/perfil.png';
  }
?>
<div class="card text-start shadow-p">

    <div class="card-header bg-user-pic" style="background-image: url(../<?php echo $fila['photo']; ?>)">
        <div class="img-profile">
            <div class="profile-image-container">
                <img class="card-img-top profile-img img-fluid" src="../<?php echo $fila['photo']; ?>" alt="" srcset="">
                <span class="change-icon">
                    

                    <div class="profile-picture">
                        <a type="button" data-bs-toggle="modal" data-bs-target="#editarFotoModal">
                             <i class="bi bi-camera"></i>
                        </a>
                    </div>
                </span>
            </div>
        </div>
    </div>
    <!-- Código HTML para el modal de edición de foto -->
<div class="modal fade" id="editarFotoModal" tabindex="-1" aria-labelledby="editarFotoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarFotoModalLabel">Actualizar foto de perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <form id="update_photo" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <p>Selecciona una nueva foto de perfil:</p>
          <input type="file" name="nueva_foto">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <button type="submit" class="btn btn-danger" id="delete-pic" data-bs-dismiss="modal">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <div class="card-body">
        <h4 class="text-center"><?php echo $_SESSION['name'] . ' ' . $_SESSION['lastname']; ?></h4>
        <div class="title-profile text-primary">
            <h5 class="card-title ">Datos personales</h5>
            <a type="button" data-bs-toggle="modal" data-bs-target="#perfildata">
                <i class="bi bi-pencil-square"></i>
            </a>

        </div>

        <ul class="list-unstyled">
            <li><strong>Nacionalidad:</strong> <?php echo $fila['nacionalidad']; ?></li>
            <li><strong>Fecha de nacimiento:</strong> <?php echo $fila['fecha_nacimiento']; ?></li>
            <li><strong>Género:</strong> <?php echo $fila['genero']; ?></li>
            <li><strong>Estado civil:</strong> <?php echo $fila['estado_civil']; ?></li>
            <li><strong>Documento:</strong> <?php echo $fila['documento']; ?></li>
        </ul>
    </div>
</div>

<div class="card shadow-p mt-2">
    <div class="card-body">
        <div class="title-profile text-primary">
            <h5 class="card-title ">Datos de contacto</h5>
            <a type="button" data-bs-toggle="modal" data-bs-target="#informacionModal">
                <i class="bi bi-pencil-square"></i>
            </a>
        </div>
        <ul class="list-unstyled">
            <li><strong>Teléfono:</strong> <?php echo $contact['telefono']; ?></li>
            <li><strong>Celular:</strong> <?php echo $contact['celular']; ?></li>
            <li class="text-muted"><strong>Correo: </strong><?php echo $contact['correo']; ?></li>
            <li class="mb-0"><strong>Dirección: </strong> <?php echo $contact['direccion']; ?></li>
        </ul>
    </div>
</div>