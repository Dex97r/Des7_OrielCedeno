<?php
    include_once('../../database/conexion.php');
    include_once('../utilityMethods.php');
    session_start();
    $array = array('error' => true);

    $id = UtilitiesMethod::exist($_SESSION['id']);
    
    $sql = 'UPDATE contacto SET telefono = :telefono, celular = :celular, correo = :correo, direccion = :direccion
             WHERE usuario_id = :uid';

    $db = Conexion::getConexion();
    $stmt = $db->prepare($sql);

    foreach ($_POST as $key => $valor) {
        $stmt->bindValue(':' . $key, $valor, PDO::PARAM_STR);
    }
    $stmt->bindValue(":uid", $id, PDO::PARAM_STR);

try {
    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            $array['error'] = false;
            $array['alert'] = 'Datos modificados satisfactoriamente';
        }
    } else {
        $array['alert'] = 'Ocurrio un error, intentalo de nuevo';
    }
} catch (\Throwable $th) {
    //throw $th;
}

echo json_encode($array);
