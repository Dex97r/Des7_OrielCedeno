<?php

if (isset($_POST['action']) && !empty($_POST['action'])) {
    $option = $_POST['action'];
    switch ($option) {
        case 'Insert':
             Skills::getModal('Insert');
            break;
        case 'Update':
            break;
        case 'Default':
            echo json_encode(array('alert' => 'Ocurrio un error, intanlo de nuevo'));
            exit;
            break;
    }
}

class Skills
{
    static function getModal($action)
    {
        $modal =
            "<div class='modal fade' id='SkillModal' tabindex='-1' aria-labelledby='" . $action . "ModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                <div class='modal-header'>
                    <h1 class='modal-title fs-5' id='" . $action . "ModalLabel' value='".$action."'>" . $action . "</h1>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                    <form id='modal-".$action."' method='POST'>
                        <div class='mb-3'>
                            <label for='skill' class='col-form-label'>Habilidad</label>
                            <input type='text' class='form-control' id='skill' name='skill'>
                        </div>

                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                            <button type='submit' class='btn btn-primary'>".$action."</button>
                        </div>
                        
                    </form>
                </div>
                
                </div>
            </div>
        </div>
        ";

        echo json_encode(array('alert' => $modal));
        exit;
    }
}
