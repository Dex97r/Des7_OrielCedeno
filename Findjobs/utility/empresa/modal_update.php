<?php

    include_once('../../database/conexion.php');
    include_once('../../controllers/utilityMethods.php');
    session_start();
    
    $option = $_POST['action'];
    
    switch($option){
        case 'GetModal':
            ModalCompany::getModal();
            break;
        case 'Update':
            ModalCompany::Update();
            break;
        default: 
        break;
    }

class ModalCompany{
    static function getModal(){
        $id = $_SESSION['id'];
        $id = UtilitiesMethod::existCompany($id);
        $fila = UtilitiesMethod::getCompanyInfo($id);
        $modal = '    
        <!-- Modal -->
        <div class="modal fade" id="modalEmpresa" tabindex="-1" aria-labelledby="modalEmpresaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEmpresaLabel">Editar datos personales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="modal-com-update" method="post">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input required type="text" class="form-control" id="nombre" name="nombre" required value="'.$fila['nombre'].'">
                    </div>
                    <div class="mb-3">
                        <label for="correo_electronico" class="form-label">Correo electrónico</label>
                        <input required type="email" class="form-control" id="correo_electronico" name="correo_electronico" required value="'.$fila['correo_electronico'].'">
                    </div>
                
                    <div class="mb-3">
                        <label for="telefono_contacto" class="form-label">Teléfono de contacto</label>
                        <input required type="tel" pattern="\d{4}-\d{4}" class="form-control" id="telefono_contacto" name="telefono_contacto" required value="'.$fila['telefono_contacto'].'">
                    </div>
                    <div class="mb-3">
                        <label for="informacion_empresa" class="form-label">Información de la empresa</label>
                        <textarea required class="form-control" id="informacion_empresa" name="informacion_empresa" rows="3">'.$fila['informacion_empresa'].'</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="direccion_empresa" class="form-label">Dirección de la empresa</label>
                        <input required class="form-control" id="direccion_empresa" name="direccion_empresa" value="'.$fila['direccion'].'">
                    </div>
                    <div class="mb-3">
                        <label for="sitioweb_empresa" class="form-label">Sitio web de la empresa</label>
                        <input required class="form-control" id="sitioweb_empresa" name="sitioweb_empresa" value="'.$fila['sitioweb'].'">
                    </div>
                    <button type="submit" class="btn btn-primary col-4">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </form>
            </div>
            </div>
        </div>
        </div>';

        $array['alert'] = $modal;
        echo json_encode($array);
    }

    static function Update(){
        $array = array('error' => true);
        // Conexión a la base de datos
        $dbh = Conexion::getConexion();

        // Manejo de los datos enviados por el formulario del modal
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $empresa = $_POST['nombre'];
            $email = $_POST['correo_electronico'];
            $telefono = $_POST['telefono_contacto'];
            $infomacion = $_POST['informacion_empresa'];
            $direccion = $_POST['direccion_empresa'];
            $sitioWeb = $_POST['sitioweb_empresa'];
            $unique_id = $_SESSION['id'];
            $id = UtilitiesMethod::existCompany($unique_id);

        // Actualización de los datos en la base de datos
            try {
                $stmt = $dbh->prepare("UPDATE empresas SET nombre=:empresa, correo_electronico=:email, 
                telefono_contacto=:telefono, informacion_empresa=:info_empresa, direccion=:direccion, sitioweb=:sitioWeb
                WHERE id = :id and unique_id = :unique_id
                ");
                $stmt->bindParam(':empresa', $empresa);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':info_empresa', $infomacion);
                $stmt->bindParam(':direccion', $direccion);
                $stmt->bindParam(':sitioWeb', $sitioWeb);
                $stmt->bindParam(':unique_id', $unique_id);
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    $array['error'] = false;
                    $array['alert'] = "Los datos se han actualizado correctamente.";
                }
                
                
            } catch(PDOException $e) {
                $array['alert'] = "Error al actualizar los datos ";
            }

            $dbh = null;
            echo json_encode($array);
        }
    }
}

