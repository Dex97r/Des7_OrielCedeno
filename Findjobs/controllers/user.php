<?php
include_once('utilityMethods.php');

class User{

    static function getUserInformation($mail, $id)
    {
        $sql = "SELECT nombre, apellido FROM usuarios WHERE unique_id = :id and correo = :mail";
        $db = Conexion::getConexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":mail", $mail, PDO::PARAM_STR);

        try {
        if ($stmt->execute()) {
            if($stmt->rowCount() > 0){
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['name'] = $fila['nombre'];
                $_SESSION['lastname'] = $fila['apellido'];
                return true;
                exit;
            }
                    
        }
        } catch (\Throwable $th) {
        //throw $th;
        }
        return false;
    } //End getUserInformation

    //GET INFO IN THE USER PROFILE
    static function getProfile(){
        $sql = "SELECT usuarios.foto as photo, informacion_personal.* FROM usuarios 
                INNER JOIN informacion_personal 
                ON usuarios.id = informacion_personal.usuario_id
                WHERE usuario_id = :id";
        $id = UtilitiesMethod::exist($_SESSION['id']);
        
        $db = Conexion::getConexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
        try {
            if ($stmt->execute()) {
                if($stmt->rowCount() > 0){
                    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                    return $fila;
                }
            }
        } catch (\Throwable $th) {
        //throw $th;
        }
    } //end getProfile

    static function getContactInformation(){
            
        $sql = "SELECT * FROM contacto WHERE usuario_id = :id";
        $id = UtilitiesMethod::exist($_SESSION['id']);
        
        $db = Conexion::getConexion();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
        try {
            if ($stmt->execute()) {
                if($stmt->rowCount() > 0){
                    $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    return $fila;
                }
            }
        } catch (\Throwable $th) {
        //throw $th;
        }
    }

    static function getEducationInformation(){
            
        $sql = "SELECT * FROM estudios WHERE usuario_id = :id";
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

    static function getLanguajes(){
            
        $sql = "SELECT * FROM idiomas WHERE usuario_id = :id";
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

    static function getJobApplication(){
        
        // Establecer la conexión con la base de datos
        $conexion = Conexion::getConexion();
        
        // Obtener el ID del usuario actual
        $usuario_id =  UtilitiesMethod::exist($_SESSION['id']); // Reemplazar con la variable que almacena el ID del usuario

        // Preparar la consulta SQL
        $sql = "SELECT empleos.*, empresas.nombre as nombre_empresa
        FROM empleos
        INNER JOIN postulaciones ON empleos.id = postulaciones.empleo_id
        INNER JOIN empresas ON empleos.empresa_id = empresas.id
        WHERE postulaciones.usuario_id = :usuario_id ";

        // Preparar la sentencia
        $sentencia = $conexion->prepare($sql);

        // Vincular los parámetros con bindParam
        $sentencia->bindParam(':usuario_id', $usuario_id);

        // Ejecutar la sentencia
        try {
            if ($conexion) {
                $sentencia->execute();
                if ($sentencia->rowCount() > 0) {
                    // Recuperar los resultados como un arreglo asociativo
                    $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    
                    // Mostrar los resultados
                    return $resultados;
                } else {
                    return false;
                }
            } else {
                echo "No hay conexión a la base de datos.";
            }
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
        }

        // Cerrar la conexión
        $conexion = null;
        

    }

    
}

?>