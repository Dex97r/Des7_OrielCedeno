<?php

    include_once('../../database/conexion.php');
    include_once('../utilityMethods.php');
    session_start();
    $array = array('error' => true);

    $usuario_id = UtilitiesMethod::exist($_SESSION['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos enviados por el formulario
    $nombre = $_POST['nombre'];
    $institucion = $_POST['institucion'];
    $nivel_educativo = $_POST['nivel_educativo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];


    // Validar que los campos no estén vacíos ni contengan caracteres especiales
    if (
        !empty($nombre) && !empty($institucion) && !empty($nivel_educativo)
        && !empty($fecha_inicio) && !empty($fecha_fin)  && preg_match('/^[a-zA-Z0-9\s]+$/', $nombre)
        && preg_match('/^[a-zA-Z0-9\s]+$/', $institucion)
    ) {
        // &&  preg_match('/^[a-zA-Z0-9\s]+$/', $nivel_educativo


        // Convertir las fechas al formato de la base de datos (YYYY-MM-DD)
        $fecha_inicio = date('Y-m-d', strtotime($fecha_inicio));
        $fecha_fin = date('Y-m-d', strtotime($fecha_fin));
        $db = Conexion::getConexion();
        // Insertar los datos en la tabla de estudios
        $stmt = $db->prepare("INSERT INTO estudios (carrera, institucion, estado_educativo, fecha_inicio, fecha_fin, usuario_id) VALUES (:nombre, :institucion, :nivel_educativo, :fecha_inicio, :fecha_fin, :usuario_id)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':institucion', $institucion);
        $stmt->bindParam(':nivel_educativo', $nivel_educativo);
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->bindParam(':usuario_id', $usuario_id);

        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $array['error'] = false;
                $array['alert'] = 'Datos modificados satisfactoriamente';
            }
        } else {
            $array['alert'] = 'Ocurrio un error, intentalo de nuevo';
        }
    } else {
        $array['alert'] = "Los datos enviados no son válidos.";
    }
}

echo json_encode($array);
