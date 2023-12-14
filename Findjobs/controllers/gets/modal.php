<?php

include_once('../../database/conexion.php');
include_once('../utilityMethods.php');
session_start();
$array = array('error' => true);
//VALIDAR QUE MODAL QUIEREN
$idUser = UtilitiesMethod::exist($_SESSION['id']);
// SI EL MODAL ES INSERT
// SI ES MODAL PARA UPDATE

switch ($_POST['action']) {
    case 'Insert':
            Modal::getLanguageModal('Insert', 0, $idUser);
        break;
    case 'Update':
            $idLg = $_POST['data'];
            Modal::getLanguageModal('Update', $idLg, $idUser);
        break;
}


class Modal
{

    static function getLanguageModal($action, $id = 0, $userid)
    {
        $opciones = array("Basico", "Intermedio", "Avanzado", "Nativo");
        $opciones = array_combine($opciones, $opciones);

        $opciones_o = array("Basico", "Intermedio", "Fluido");
        $opciones_o = array_combine($opciones_o, $opciones_o);

        $datos =  array( 'id' => '','idioma' => '', 'escrito' => '', 'oral' => '', 'tipo' => 'Insertar');
        $titulo = "Insertar";
        if ($action === 'Update') {
            
            if(UtilitiesMethod::isLanguajeInThisUser($id, $userid)){
                $datos = UtilitiesMethod::getLanguajeByID($id, $userid);
                $array['error'] = false;
                $datos['tipo'] = 'Actualizar';
                $titulo = $datos['idioma'];
           }else{
                $array['alert'] = 'Ocurrio un error';
                echo json_encode($array);
                exit;
           }
        }
        
        // Modal de inserción 
        $modal = "
            <div class='modal fade' id='modalIdioma' tabindex='-1' aria-labelledby='modal".$action."Label' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <strong><h5 class='fs-2 modal-title' value='".$datos['id']."' id='modal".$action."Label'>".$titulo."</h5></strong>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form id='".$action."' method='POST' enctype='multipart/form-data' >
                    ";
        if($action === 'Insert'){
            $modal .= "
                <div class='mb-3'>
                    <label for='idioma' class='form-label'>Idioma</label>
                    <input type='text' class='form-control' id='idioma' name='idioma' required value=''>
                </div>
            ";
        }
                    
        $modal .= "<div class='mb-3'>
                <label for='escrito' class='form-label'>Nivel escrito</label>";
        $modal .= "<select class='form-select' id='escrito' name='escrito' required>
                        ";

                foreach ($opciones as $valor => $texto) {
                    $selected = ($valor == $datos['escrito']) ? "selected" : "";
                    $modal.= "<option value='$valor' $selected>$texto</option>";
                }
        
        $modal .="   
            </select>
           
            </div>
            <div class='mb-3'>
                <label for='oral' class='form-label'>Nivel oral</label>";
        $modal .= "<select class='form-select' id='oral' name='oral' required>
                        ";

                        foreach ($opciones_o as $valor => $texto) {
                        $selected = ($valor == $datos['oral']) ? "selected" : "";
                        $modal.= "<option value='$valor' $selected>$texto</option>";
                        }
        
        $modal .="   
            </select>
                
            </div>
            
            <div class='modal-footer'>
                <button type='submit' class='btn btn-primary' data-bs-dismiss='modal'>".$datos['tipo']."</button>
                <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Cancelar</button>
            </div>
            </form>
                </div>
                </div>
            </div>
            </div> 
       
        ";

        $array['alert'] = $modal;

        echo json_encode($array);
    }
}
