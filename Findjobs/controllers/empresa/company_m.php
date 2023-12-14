<?php
    // IN THIS FILE ONLY ARE METHODS OF COMPANY
    
    //include_once('../conexion.php');
//    if(isset($_POST['action'])){
//     $option = $_POST['action'];

//     switch($option){
//         case 'Update':
//               $id = $_POST['id'];
//               CompanyMethods::UpdatePost($id);
//             break;
//     }
//    }

    class CompanyMethods{
        
        static function getCompanyInformation(){
            $sql = "SELECT * FROM empresas WHERE unique_id = :id";
            // $id = UtilitiesMethod::exist($_SESSION['id']);
            $id = $_SESSION['id'];
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

        static function getCompanyId(){
            session_start();
            $sql = "SELECT id FROM empresas WHERE unique_id = :id";
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $_SESSION['id'], PDO::PARAM_INT);
        
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

        static function getJobsPostedById($id){
            $sql = "SELECT * FROM empleos WHERE id = :id";
            // $id = UtilitiesMethod::exist($_SESSION['id']);
            
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

        static function UpdatePost($id, $empresa_id){
            $array = array('error' => true, 'alert' => 'Ocurrio un error, intentalo otra vez'); 
            
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $requisitos = $_POST['requisitos'];
            $ubicacion = $_POST['ubicacion'];
            $salario = $_POST['salario']; // Reemplazar con el nuevo salario
            $fecha_inicio = $_POST['fecha_inicio']; // Reemplazar con la nueva fecha de inicio
            $tipo_contrato = $_POST['tipo_contrato']; // Reemplazar con el nuevo tipo de contrato
            $forma_aplicacion = $_POST['forma_aplicacion'];; // Reemplazar con la nueva forma de aplicación

            // Establecer la conexión con la base de datos
            $conexion = Conexion::getConexion();
                  
            
            $sql = "UPDATE empleos
            SET titulo = :titulo, descripcion = :descripcion, 
            requisitos = :requisitos, ubicacion = :ubicacion, salario = :salario, fecha_inicio = :fecha_inicio, tipo_contrato = :tipo_contrato, forma_aplicacion = :forma_aplicacion
            WHERE id = :id AND empresa_id = :empresa_id";
            
            $stmt = $conexion->prepare($sql);

            // Vincular los parámetros con los valores reales
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':requisitos', $requisitos);
            $stmt->bindParam(':ubicacion', $ubicacion);
            $stmt->bindParam(':salario', $salario);
            $stmt->bindParam(':fecha_inicio', $fecha_inicio);
            $stmt->bindParam(':tipo_contrato', $tipo_contrato);
            $stmt->bindParam(':forma_aplicacion', $forma_aplicacion);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':empresa_id', $empresa_id, PDO::PARAM_INT);
               
            // Ejecutar la sentencia
            try {
                
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    $array['error'] = false;
                    $array['alert'] = 'Se actualizo la información';
                }
        
            } catch (PDOException $e) {
                $array['alert'] = "Error al actualizar la información del empleo: ".$e->getMessage();
            }

            // Cerrar la conexión
            $conexion = null;
            echo json_encode($array);

        }

        static function deletePost($id){
            $sql = "DELETE FROM empleos WHERE id = :id";
            // $id = UtilitiesMethod::exist($_SESSION['id']);
            
            $db = Conexion::getConexion();
            $stmt = $db->prepare($sql);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
            try {
                if ($stmt->execute()) {
                    if($stmt->rowCount() > 0){
                        return true;
                    }
                }
            } catch (\Throwable $th) {
            //throw $th;
            }
        }

        static function getJobs(){
            
        }

    }
