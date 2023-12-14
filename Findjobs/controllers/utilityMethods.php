<?php

    class UtilitiesMethod{

        //THIS USER EXIST? THEN GIVE ME A USER ID
        static function exist($id){
            $sql = "SELECT id FROM usuarios WHERE unique_id = :id";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){
                        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $fila['id'];
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }
        static function existCompany($id){
            $sql = "SELECT id FROM empresas WHERE unique_id = :id";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){
                        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                        return $fila['id'];
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }

        
        //PARA VERSION DE PRACTICA UTILIZAMOS EL ID, PARA VERSION PRO SE RECOMIENDA UTILIZAR EL UNIQUEID
        static function isLanguajeInThisUser($idLenguaje, $id){
            $sql = "SELECT id FROM idiomas WHERE usuario_id = :id";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                       
                        if (empty($data)) {
                            echo "El arreglo de datos está vacío";
                        } else {
                            foreach ($data as $key) {
                                if ($key['id'] == $idLenguaje) {
                                    return true;
                                }
                            }
                        }
                                                
                        return false;
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }

        //VERIFICAR SI EL ESTUDIO PERTENECE A ESTE USUARIO
        static function isThisStudyInThisUser($idstudy, $id){
            $sql = "SELECT id FROM estudios WHERE usuario_id = :id";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){
                        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        
                        if (empty($data)) {
                            return false;
                        } else {
                            foreach ($data as $key) {
                                if ($key['id'] == $idstudy) {
                                    return true;
                                }
                            }
                        }
                                                
                        return false;
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }

        static function getLanguajeByID($idlg, $iduser){
            $sql = "SELECT * FROM idiomas WHERE usuario_id = :iduser and id = :id";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);
            $stmt->bindParam(":id", $idlg, PDO::PARAM_INT);
        
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){                        
                        return $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }

        static function getStudyByID($idstudy, $iduser){
            $sql = "SELECT * FROM estudios WHERE usuario_id = :iduser and id = :id";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":iduser", $iduser, PDO::PARAM_INT);
            $stmt->bindParam(":id", $idstudy, PDO::PARAM_INT);
        
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){                        
                        return $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }

        static function getAllJobs(){
            $sql = "SELECT empleos.*, empresas.nombre as empresa_nombre FROM empleos INNER JOIN empresas ON empleos.empresa_id = empresas.id; ";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
                    
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){                        
                        return $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }

        static function getJobsByUser($id){
            $sql = "SELECT empleos.titulo, empresas.nombre, empleos.ubicacion, empleos.tipo_contrato, postulaciones.id
                    FROM empleos
                    INNER JOIN empresas ON empleos.empresa_id = empresas.id
                    INNER JOIN postulaciones ON empleos.id = postulaciones.empleo_id
                    WHERE postulaciones.usuario_id = :id;
                    ";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
                    
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){                        
                        return $stmt->fetchAll(PDO::FETCH_ASSOC);
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }

static function createData($id)
  {
    $data = 'undefined';
    $sql = "INSERT INTO informacion_personal (foto, nacionalidad, fecha_nacimiento, genero, estado_civil, documento, usuario_id)
    VALUES (:foto, :country, :fn, :sex, :status, :cip, :uid)";

    $db = Conexion::getConexion();
    $stmt = $db->prepare($sql);

    $stmt->bindParam(":foto", $data , PDO::PARAM_STR);
    $stmt->bindParam(":country", $data, PDO::PARAM_STR);
    $stmt->bindParam(":fn",$data, PDO::PARAM_STR);
    $stmt->bindParam(":sex", $data, PDO::PARAM_STR);
    $stmt->bindParam(":status", $data , PDO::PARAM_STR);
    $stmt->bindParam(":cip", $data, PDO::PARAM_STR);
    $stmt->bindParam(":uid", $id, PDO::PARAM_INT);

    
    try {
      if ($stmt->execute()) {
        if($stmt->rowCount()>0){
          return true;
        }
      }
    } catch (\Throwable $th) {
      //throw $th;
    }

  }

  static function createContactInformation($id){
    $data = 'undefined';
    $sql = "INSERT INTO contacto (telefono, celular, correo, direccion, usuario_id)
    VALUES (:telefono, :celular, :correo, :direccion, :usuario_id)";

    $db = Conexion::getConexion();
    $stmt = $db->prepare($sql);

    $stmt->bindParam(":telefono", $data , PDO::PARAM_STR);
    $stmt->bindParam(":celular", $data, PDO::PARAM_STR);
    $stmt->bindParam(":correo",$data, PDO::PARAM_STR);
    $stmt->bindParam(":direccion", $data, PDO::PARAM_STR);
    $stmt->bindParam(":usuario_id", $id , PDO::PARAM_INT);

    
    try {
      if ($stmt->execute()) {
        if($stmt->rowCount()>0){
          return true;
        }
      }
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  function sanitize_input($input) {
    $sanitized_input = [];
  
    foreach($input as $key => $value) {
      // Filtrar y sanar el valor de entrada
      $sanitized_value = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      // Almacenar el valor sanitizado en el array
      $sanitized_input[$key] = $sanitized_value;
    }
  
    return $sanitized_input;
  }

  static function getUrlImage($id){
    $sql = "SELECT foto FROM usuarios WHERE id = :id";
            
    $db = Conexion::getConexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    try {
        if ($stmt->execute()) {
            if($stmt->rowCount() > 0){
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                return $fila['foto'];
            }
        }
    } catch (\Throwable $th) {
    //throw $th;
    }
  }

  static function getUrlImageOfCompany($id){
    $sql = "SELECT logo FROM empresas WHERE id = :id";
            
    $db = Conexion::getConexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    try {
        if ($stmt->execute()) {
            if($stmt->rowCount() > 0){
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);
                return $fila['logo'];
            }
        }
    } catch (\Throwable $th) {
    //throw $th;
    }
  }
  static function userEraseFoto($id){
    $urlpic = UtilitiesMethod::getUrlImage($id);
    
    if($urlpic === 'undefined'){
        return true;
    }else{
       
        return true;
        
    }
  }
  static function borrarFoto($id){
    $urlpic = UtilitiesMethod::getUrlImageOfCompany($id);
    if($urlpic === 'undefined'){
        return true;
    }else{
        if(unlink('../../'.$urlpic)){
            return true;
        }

    }
  }

  static function getCompanyInfo($id){
    $sql = 'SELECT * FROM empresas WHERE id = :id';
            
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
  
        
}

    
   
?>