<?php
    
        
    include_once('../../database/conexion.php');
    include_once('../utilityMethods.php');
    session_start();
    $array = array('error' => true);
    //VALIDAR QUE MODAL QUIEREN
    $idUser = UtilitiesMethod::exist($_SESSION['id']);
         
    
    switch ($_POST['action']) {
        case 'Insert':
                ModalStudies::getLanguageModal('Insert', 0, $idUser);
            break;
        case 'Update':
                $idLg = $_POST['data'];
                ModalStudies::getLanguageModal('Update', $idLg, $idUser);
            break;
    }

    class ModalStudies
    {
    
        static function getLanguageModal($action, $id = 0, $userid)
        {
            $opciones = array(
                '' => 'Seleccione un nivel educativo',
                'Universitario' => 'Universitario',
                'Técnico' => 'Técnico',
                'Bachiller' => 'Bachiller',
                'Otro' => 'Otro'
              );

            $datos =  array( 'id' => '','carrera' => '', 'institucion' => '', 'estado_educativo' => '', 
            'fecha_inicio' => '', 'fecha_fin' => '', '' => 'Insertar');
            $titulo = "Insertar";
            if ($action === 'Update') {
                //VALIDAR QUE EL TITULO PERTENEZCA A ESTA PERSONA
                if(UtilitiesMethod::isThisStudyInThisUser($id, $userid)){
                    $datos = UtilitiesMethod::getStudyByID($id, $userid);
                    $array['error'] = false;
                    $datos['tipo'] = 'Actualizar';
                    $titulo = 'Actualizar';
               }else{
                    $array['alert'] = 'Ocurrio un error';
                    echo json_encode($array);
                    exit;
               }
            }
        
            // Modal de inserción 
        $modal = 
        "<div class='modal fade' id='modalstudies' tabindex='-1' aria-labelledby='modal".$action."Label' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                <strong><h5 class='fs-2 modal-title'  value='".$datos['id']."' id='modal".$action."Label'>".$titulo."</h5></strong>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                </div>
                <div class='modal-body'>
                <form id='studies-".$action."' method='POST' enctype='multipart/form-data'>
                        <div class='mb-3'>
                            <label for='nombre' class='form-label'>Nombre de la carrera:</label>
                            <input type='text' class='form-control' id='nombre' name='nombre' required value='".$datos['carrera']."'>
                        </div>
                        <div class='mb-3'>
                            <label for='institucion' class='form-label'>Institución:</label>
                            <input type='text' class='form-control' id='institucion' name='institucion' required value='".$datos['institucion']."'>
                        </div>
                        <div class='mb-3'>
                            <label for='nivel_educativo' class='form-label'>Nivel educativo:</label>
                            ";
                           $modal .= "
                                <select class='form-select' id='nivel_educativo' name='nivel_educativo' required value='".$datos['carrera']."'>
                               ";

                               foreach ($opciones as $valor => $texto) {
                                $selected = ($valor == $datos['estado_educativo']) ? "selected" : "";
                                $modal.= "<option value='$valor' $selected>$texto</option>";
                              }
                $modal .="
                            </select>
                        </div>
                        <div class='mb-3'>
                            <label for='fecha_inicio' class='form-label'>Fecha de inicio:</label>
                            <input type='date' class='form-control' id='fecha_inicio' name='fecha_inicio' required value='".$datos['fecha_inicio']."'>
                        </div>
                        <div class='mb-3'>
                            <label for='fecha_fin' class='form-label'>Fecha de finalización:</label>
                            <input type='date' class='form-control' id='fecha_fin' name='fecha_fin' required value='".$datos['fecha_fin']."'>
                        </div>
    
                        <button type='submit' class='btn btn-primary' data-bs-dismiss='modal' value='".$titulo."'>Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>"
        ;

        $array['alert'] = $modal;

        echo json_encode($array);

        }
    }