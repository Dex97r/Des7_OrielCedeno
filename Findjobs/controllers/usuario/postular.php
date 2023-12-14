<?php
include('../utilityMethods.php');
include_once('../../database/conexion.php');
   // Obtener los datos de la postulación
   session_start();
$empleo_id = $_POST['valor']; // Reemplazar con el ID del empleo al que se postula el usuario
$usuario_id = UtilitiesMethod::exist($_SESSION['id']); // Reemplazar con el ID del usuario que realiza la postulación

$fecha_postulacion = date('Y-m-d'); // Obtener la fecha actual en formato YYYY-MM-DD
$estado = 'En revisión'; // Establecer el estado inicial de la postulación
$array = array('error' => true);
// Establecer la conexión con la base de datos
$conexion = Conexion::getConexion();

// Preparar la consulta SQL
$sql = "INSERT INTO postulaciones (empleo_id, usuario_id, fecha_postulacion, estado) 
        VALUES (:empleo_id, :usuario_id, :fecha_postulacion, :estado)";

// Preparar la sentencia
$sentencia = $conexion->prepare($sql);

// Vincular los parámetros con bindParam
$sentencia->bindParam(':empleo_id', $empleo_id);
$sentencia->bindParam(':usuario_id', $usuario_id);
$sentencia->bindParam(':fecha_postulacion', $fecha_postulacion);
$sentencia->bindParam(':estado', $estado);

// Ejecutar la sentencia
try {
    if ($conexion) {
        $sentencia->execute();
        if ($sentencia->rowCount() > 0) {
            // La postulación se guardó correctamente
            $array['error'] = false;
            $array['alert'] =  "La postulación se guardó correctamente";
        }
    } else {
        $array['alert'] = 'No hay conexión';
    }
} catch (PDOException $e) {
    // Se produjo un error al guardar la postulación
    $array['alert'] = "Error al guardar la postulación: ";
}

// Cerrar la conexión
$conexion = null;
echo json_encode($array);
?>