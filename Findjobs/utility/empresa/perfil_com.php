<div class="col-md-6">
    <?php $fila = CompanyMethods::getCompanyInformation(); 
      if($fila['logo'] === 'undefined'){
        $fila['logo'] = 'images/perfil.png';
      }
    ?>
    <div class="card text-start shadow-p">
        <div class="card-header bg-company-logo lazyload" style="background-image: url(../<?php echo $fila['logo']; ?>)">
            <div class="img-profile">
                <div class="profile-image-container">
                    <img class="card-img-top profile-img pr-comp img-fluid lazyload" src="../<?php echo $fila['logo']; ?>" alt="" srcset="">
                    <span class="change-icon">
                        <a id="update_photo_comp" data-bs-toggle="modal" data-bs-target="#editarFotoModalComp">
                            <i class="bi bi-camera"></i>
                        </a>
                        
                    </span>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h4 class="text-center"><?php echo $_SESSION['name_comp']; ?></h4>
            <div class="title-profile text-primary">
                <h5 class="card-title ">Datos personales</h5>
                <a type="button" id="btn-profile-em">
                    <i class="bi bi-pencil-square"></i>
                </a>

            </div>

            <ul class="list-unstyled">
                <li><strong>Empresa:</strong> <?php echo $fila['nombre']; ?></li>
                <li><strong>Email:</strong> <?php echo $fila['correo_electronico']; ?></li>
                <li><strong>Telefono mobil:</strong> <?php echo $fila['telefono_contacto']; ?></li>
                <li><strong>Dirección:</strong> <?php echo $fila['direccion']; ?></li>
                <li><strong>Sitio web:</strong> <?php echo $fila['sitioweb']; ?></li>
            <ul>
            
        </div>
    </div>

    <div class="card shadow-p mt-2">

        <div class="card-body">
            <h3><strong>Acerca de:</strong></h3>
            <p>
                <?php echo $fila['informacion_empresa']; ?>
            </p>
        </div>
    </div>
</div>

<div class="modal fade" id="editarFotoModalComp" tabindex="-1" aria-labelledby="editarFotoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editarFotoModalLabel">Actualizar foto de perfil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <form id="update_photo_company" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <p>Selecciona una nueva foto de perfil:</p>
          <input type="file" name="nueva_foto">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Actualizar</button>
          <button type="submit" class="btn btn-danger" id="delete-pic_company" data-bs-dismiss="modal">Eliminar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>