<?php

// Verificar que se recibió el id del idioma a eliminar y que el usuario está logueado
include_once('../../database/conexion.php');
include_once('../utilityMethods.php');
session_start();
$array = array('error' => true);
$array['alert'] = "Ocurrio un error";

$usuario_id = UtilitiesMethod::exist($_SESSION['id']);

if (isset($_POST['val'])) {

  $ids = filter_input(INPUT_POST, 'val', FILTER_VALIDATE_INT);
  

  if ($ids === false) {
    $array['alert'] = "Ocurrio un error";
    json_encode($array);
    exit;
  }

  //VERIFICAR QUE EL IDIOMA PERTENEZCA A EL USUARIO LOGUEADO
  if (!UtilitiesMethod::isThisStudyInThisUser($ids, $usuario_id)) {
    $array['alert'] = "Ocurrio un error al eliminar el título";
    json_encode($array);
    exit;
  }

  $conn = Conexion::getConexion();
  $sql = "DELETE FROM estudios WHERE id = :id AND usuario_id = :usuario_id";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':id', $ids);
  $stmt->bindParam(':usuario_id', $usuario_id);

  // Ejecutar la consulta
  try {
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      $array['alert'] = "El estudio ha sido eliminado correctamente.";
      $array['error'] = false;
    }
  } catch (PDOException $e) {
    $array['alert'] = "Error al eliminar el estudio, intentalo otra vez";
  }

  // Cerrar la conexión
  $conn = null;
}

echo json_encode($array);
exit;
