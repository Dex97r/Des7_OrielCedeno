<?php

    include_once('../../database/conexion.php');
    include_once('../utilityMethods.php');
    $array = array('error' => true);

    
    if (isset($_POST['action']) && !empty($_POST['action'])) {
        $option = $_POST['action'];
        switch ($option) {
            case 'Insert':
                SkillsMethods::insertSkill();
                break;
            case 'Delete':
                SkillsMethods::Delete();
                break;
        }
    }

class SkillsMethods{
    
    static function getSkills(){
        $sql = "SELECT * FROM user_skills WHERE user_id = :id";
        $id = UtilitiesMethod::exist($_SESSION['id']);
        
        $db = Conexion::getConexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
        try {
            if ($stmt->execute()) {
                if($stmt->rowCount() > 0){
                    $fila = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    return $fila;
                }
            }
        } catch (\Throwable $th) {
        //throw $th;
        }
    }

    static function insertSkill(){
        // Configuración de la base de datos
        // Crear una conexión PDO
        session_start();
        $conn = Conexion::getConexion();
        // Preparar la consulta de inserción con placeholders
        $sql = "INSERT INTO user_skills (user_id, skill_name) VALUES (:user_id, :skill_name)";
        $stmt = $conn->prepare($sql);

        // Asignar valores a los placeholders usando bind param
        $user_id = UtilitiesMethod::exist($_SESSION['id']); // el ID del usuario al que pertenece la habilidad
        $skill_name = $_POST['skill']; // el nombre de la habilidad
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':skill_name', $skill_name);

        // Ejecutar la consulta
        try {
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $array['error'] = false;
                    $array['alert'] = 'Habilidad agregada';
                }
            } else {
                $array['alert'] = 'Ocurrio un error, intentalo de nuevo';
            }
        } catch (\Throwable $th) {
            $array['alert'] = 'Ocurrio un error, intentalo de nuevo';
        }

        $conexion = null;
        echo json_encode($array);
        exit;

    }

    static function Delete(){
        $array['error'] = true;
        session_start();
        $user_id = UtilitiesMethod::exist($_SESSION['id']);
        // Crear una conexión PDO
        $conn = Conexion::getConexion();
        // Llamar al procedimiento almacenado
        $id = $_POST['val']; // el ID de la habilidad que se desea eliminar
        $stmt = $conn->prepare("DELETE FROM user_skills WHERE id = :id and user_id = :user_id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':user_id', $user_id);
        // Ejecutar la consulta
        try {
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $array['error'] = false;
                    $array['alert'] = 'La habilidad se ha eliminado correctamente';
                }
            } else {
                $array['alert'] = 'Ocurrio un error, intentalo de nuevo';
            }
        } catch (\Throwable $th) {
            $array['alert'] = 'Ocurrio un error, intentalo de nuevo';
        }

        $conexion = null;
        echo json_encode($array);
        exit;

    }
}
