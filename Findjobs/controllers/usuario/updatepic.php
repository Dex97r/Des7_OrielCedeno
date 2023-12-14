<?php


    include('../../database/conexion.php');
    include('../../controllers/utilityMethods.php');
    session_start();
    
    switch($_POST['action']){
        case 'Actualizar':
            UpdatePicture::UpdatePic();
            break;
        case 'Eliminar':
            UpdatePicture::Delete();
            break;
    }

  class UpdatePicture{

    static function UpdatePic(){
        $array = array(
            'error' => true,
            'alert' => 'Ocurrio un error'
        );
        // Verificar que se haya seleccionado una nueva foto
        if (isset($_FILES['nueva_foto'])) {
        // Obtener el ID del usuario actual
        $id_usuario = UtilitiesMethod::exist($_SESSION['id']);
    
        // Obtener el nombre y tipo de la nueva foto
        
        $tipo_foto = $_FILES['nueva_foto']['type'];
    
        $nombre_imagen = uniqid() . '_' . $_FILES["nueva_foto"]["name"];
        $ruta_imagen = 'images/' . $nombre_imagen;
        
    
        // Verificar que el archivo sea una imagen
            if (strpos($tipo_foto, 'image') !== false) {
                // Guardar la nueva foto en la carpeta de fotos de perfil
                move_uploaded_file($_FILES["nueva_foto"]["tmp_name"], '../../' .$ruta_imagen);
                // Actualizar el campo foto en la tabla usuarios
                $sql = "UPDATE usuarios SET foto = :foto WHERE id = :id";
                $conexion = Conexion::getConexion();
                $stmt = $conexion->prepare($sql);
    
                $stmt->bindParam(':id', $id_usuario);
                $stmt->bindParam(':foto', $ruta_imagen);
                
                // Ejecutar la consulta
                try {
                    $stmt->execute();
                    // Verificar si se actualizó la foto correctamente
                    if ($stmt->rowCount() > 0) {
                    // Mostrar mensaje de éxito
                    $array['error'] = false;
                    $array['alert'] = 'inicio.php' ;
                    } else {
                    // Mostrar mensaje de error
                    $array['alert'] =  "Ocurrió un error al actualizar la foto de perfil.";
                    }
                } catch (\Throwable $th) {
                    unlink('../../'.$ruta_imagen); // elimina la imagen del servidor
                }
    
            } else {
            // Mostrar mensaje de error si el archivo seleccionado no es una imagen
            $array['alert'] =  "El archivo seleccionado no es una imagen.";
            }
        }
    
        $conexion = null;
        echo json_encode($array);
        exit;
    }

    static function Delete(){
        $array = array(
            'error' => true,
            'alert' => 'Ocurrio un error'
        );
        $estado = 'undefined';
        $id_usuario = UtilitiesMethod::exist($_SESSION['id']);
        $sql = "UPDATE usuarios SET foto = :estado WHERE id = :id";
        $conexion = Conexion::getConexion();
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':id', $id_usuario);
        $stmt->bindParam(':estado', $estado);
        
        // Ejecutar la consulta
        try {
            $stmt->execute();
            // Verificar si se actualizó la foto correctamente
            if ($stmt->rowCount() > 0) {
                if(UtilitiesMethod::userEraseFoto($id_usuario)){
                    $array['error'] = false;
                    $array['alert'] = 'empresa.php';
                }                
                       
            } else {
            // Mostrar mensaje de error
            $array['alert'] =  "Ocurrió un error al actualizar la foto de perfil.";
            }
        } catch (\Throwable $th) {
            
        }

        $conexion = null;
        echo json_encode($array);
        exit;

       
    }
  }
        

