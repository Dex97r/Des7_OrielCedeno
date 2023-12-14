<?php

include_once('../../database/conexion.php');

$array = array("error" => true);

// Recibir los datos del formulario
if (!filter_var($_POST['correo_electronico'], FILTER_VALIDATE_EMAIL)) {
    $array['alert'] = 'Email no valido';
    echo json_encode($array);
    exit;
}
// obtenemos la conexion
$conexion = Conexion::getConexion();


// obtenemos los datos del formulario
$nombre = $_POST["nombre"];
$correo_electronico = $_POST["correo_electronico"];
$telefono_contacto = $_POST["telefono_contacto"];
$informacion_empresa = $_POST["informacion_empresa"];
$direccion = $_POST['direccion_empresa'];
$sitioweb_empresa = $_POST['sitioweb_empresa'];
$password = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$contrasena = password_hash($password, PASSWORD_DEFAULT);
$unique_id = uniqid('', true);
$tipo_usuario = 'Empresa';
// obtenemos la ubicación de la imagen
$nombre_imagen = uniqid() . '_' . $_FILES["logo"]["name"];
$ruta_imagen = 'images/' . $nombre_imagen;
move_uploaded_file($_FILES["logo"]["tmp_name"], '../../' . $ruta_imagen);

try {
    // creamos la consulta preparada
    $stmt = $conexion->prepare("INSERT INTO empresas (unique_id, logo, nombre, correo_electronico, contrasena, 
                                        telefono_contacto, informacion_empresa, direccion, sitioweb, tipo_usuario) 
                                        VALUES (:unique_id, :logo, :nombre, :correo_electronico, :contrasena, :telefono_contacto, 
                                        :informacion_empresa, :direccion, :sitioweb, :tipo_usuario)");

    // vinculamos los parámetros con bindParam
    $stmt->bindParam(":unique_id", $unique_id);
    $stmt->bindParam(":logo", $ruta_imagen);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":correo_electronico", $correo_electronico);
    $stmt->bindParam(":contrasena", $contrasena);
    $stmt->bindParam(":telefono_contacto", $telefono_contacto);
    $stmt->bindParam(":informacion_empresa", $informacion_empresa);
    $stmt->bindParam(":direccion", $direccion);
    $stmt->bindParam(":sitioweb", $sitioweb_empresa);
    $stmt->bindParam(":tipo_usuario", $tipo_usuario);
    // ejecutamos la consulta
    $stmt->execute();

    // validamos si rowCount es mayor que 0
    if ($stmt->rowCount() > 0) {
        $array['error'] = false;
        $array['alert'] = "../login.php";
    } else {
        $array['alert'] = "Error al registrar la empresa";
    }
} catch (\Throwable $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        // El correo electrónico ya existe en la base de datos
         // especifica la ruta y el nombre de la imagen
        unlink('../../'.$ruta_imagen); // elimina la imagen del servidor

        $array["alert"] =  "El usuario ya esta registrado, intentelo con otro correo";
    } else {
        // Otra excepción de PDO
        $array["alert"] = 'Error al registrar su empresa, intentalo otra vez';
    }
}
$conexion = null;
echo json_encode($array);
exit;
