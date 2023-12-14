<?php
    include_once('../../database/conexion.php');
    include_once('company_m.php');
   
    $db = Conexion::getConexion();
    $id = CompanyMethods::getCompanyId();

    $sql = "SELECT id, titulo FROM empleos WHERE empresa_id = :id";
            
    $db = Conexion::getConexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    try {
        if ($stmt->execute()) {
            if($stmt->rowCount() > 0){   
                // var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));                   
                $data['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($data);
            }
        }
    } catch (\Throwable $th) {
    //throw $th;
    }
