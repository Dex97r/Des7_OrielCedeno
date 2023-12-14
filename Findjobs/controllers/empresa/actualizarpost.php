<?php

include_once('../../database/conexion.php');
include_once('company_m.php');

if (isset($_POST['action'])) {
    $option = $_POST['action'];

    switch ($option) {
        case 'Update':

            Actualizar::UpdatePost();
            break;
    }
}


class Actualizar
{

    static function UpdatePost()
    {
        $empresa_id = CompanyMethods::getCompanyId();
        $id = $_POST['idpost']; 
        // Preparar la sentencia
        CompanyMethods::UpdatePost($id, $empresa_id);
    }
}
