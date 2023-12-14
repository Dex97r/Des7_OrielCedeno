<?php

    include_once('../../database/conexion.php');
    include_once('../utilityMethods.php');
    session_start();
    $array = array('error' => true);
    $id = $_POST['value'];
    $usuario_id = UtilitiesMethod::exist($_SESSION['id']);
    if(!UtilitiesMethod::isThisStudyInThisUser($id, $usuario_id)){
        $array['alert'] = 'Ocurrio un error';
        echo json_encode($array);
        exit;
    }
    // Obtener la conexión a la base de datos
    $conexion = Conexion::getConexion();

    $carrera = $_POST['nombre'];
    $institucion = $_POST['institucion'];
    $estado_educativo = $_POST['nivel_educativo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    
    // Consulta SQL para actualizar los campos de un registro
    $sql = "UPDATE estudios SET carrera = :carrera, 
                            institucion = :institucion, 
                            estado_educativo = :estado_educativo, 
                            fecha_inicio = :fecha_inicio, 
                            fecha_fin = :fecha_fin
                            WHERE id = :id and usuario_id = :userid";

    // Preparar la consulta
   
    $stmt = $conexion->prepare($sql);

    // Asignar los valores a los parámetros de la consulta
    $stmt->bindParam(":carrera", $carrera);
    $stmt->bindParam(":institucion", $institucion);
    $stmt->bindParam(":estado_educativo", $estado_educativo);
    $stmt->bindParam(":fecha_inicio", $fecha_inicio);
    $stmt->bindParam(":fecha_fin", $fecha_fin);
    $stmt->bindParam(":userid", $usuario_id);
    $stmt->bindParam(":id", $id);
    // Asignar los valores a las variables correspondientes
    
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
        $array['alert'] = 'Ocurrio un error, intentalo de nuevo';
    }

    // Ejecutar la consulta
$conexion = null;
 echo json_encode($array);
 exit;
