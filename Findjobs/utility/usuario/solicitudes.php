<?php
    include_once('../../database/conexion.php');
    include_once('../../controllers/utilityMethods.php');

    session_start();
    
    $unique_id = $_SESSION['id'];
    $id = UtilitiesMethod::exist($unique_id);
   
    $data = UtilitiesMethod::getJobsByUser($id);

    $text = '';
    $text .= '<div class="d-flex vh-100"><div class="col-md-12 flex-grow-1">';
            if($data){
                foreach($data as $valor){
                    $text .= '<form id="postulacion">
                        <div class="card shadow-p mt-2">'.
                                    '<div class="card-body">'
                                .'<h4 class="card-title text-primary">'.$valor['titulo'].'</h4>
                                <p class="card-text">
                                <strong>Empresa: </strong> '.$valor['nombre'].' <br>
                                <strong>Ubicación: </strong>'.$valor['ubicacion'].'<br>
                                <strong>Tipo de contrato: </strong> '.$valor['tipo_contrato'].'
                                </p>
                            
                                <button type="submit" class="btn btn-danger btn-sm col-sm-3 mb-2" id="btn-dl-postulacion" value="'.$valor['id'].'">Eliminar</button>
                            </div>
                            
                        </div>
                    </form>';
                }
        }else{
            $text .='  
            <div class="card mt-2">
                <div class="card-body">
                     <h3>No hay vacantes disponibles</h3>
                </div>
            </div>';
        }
            $text .=' </div></div>';

   
    echo $text;


?>

