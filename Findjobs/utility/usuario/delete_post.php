<?php
    include_once('../../database/conexion.php');
    include_once('../../controllers/utilityMethods.php');

    session_start();
    $array['error'] = true;
    $unique_id = $_SESSION['id'];
    $id = $_POST['id'];
    $usuario_id = UtilitiesMethod::exist($unique_id);
   
    $conn = Conexion::getConexion();
    try{
        // Sentencia SQL para eliminar la postulación del usuario
        $sql = "DELETE FROM postulaciones WHERE usuario_id = :usuario_id and id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':usuario_id', $usuario_id);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        $array['error'] = false;
        $array['alert'] = "La postulación del usuario ha sido eliminada correctamente.";
  } catch(PDOException $e) {
    // echo "Error: " . $e->getMessage();
    $array['alert'] = 'Error al eliminar postulacion';
  }
  $conn = null;
  echo json_encode($array);
