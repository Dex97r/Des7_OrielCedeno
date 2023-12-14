<?php

include('../../database/conexion.php');
include('../../controllers/utilityMethods.php');

$array = array(
    'error' => true
);


// Recibir los datos del formulario
$nombre = htmlspescialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
$apellido = htmlspecialchars($_POST['apellido'], ENT_QUOTES, 'UTF-8');
$tipo_usuario = htmlspecialchars($_POST['tipo_usuario'], ENT_QUOTES, 'UTF-8');
$correo = htmlspecialchars($_POST['correo'], ENT_QUOTES, 'UTF-8');
$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
$correo = filter_var($correo, FILTER_VALIDATE_EMAIL);
// obtenemos la ubicación de la imagen
$nombre_imagen = uniqid() . '_' . $_FILES["foto"]["name"];
$ruta_imagen = 'images/' . $nombre_imagen;
move_uploaded_file($_FILES["foto"]["tmp_name"], '../../' . $ruta_imagen);


$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$password = password_hash($password, PASSWORD_DEFAULT);
$unique_id = uniqid('', true);

$tipo_usuario = ucfirst($tipo_usuario);

if ($tipo_usuario != 'Normal' && $tipo_usuario != 'Empresa') {
    // Si el tipo de usuario no es ni "Normal" ni "Empresa", se ejecuta este código
    $array['alert'] = 'Elija un tipo de cuenta valido';
    back($array);
    exit;
}
// Si el tipo de usuario es "Normal" o "Empresa", se ejecuta este código

// Insertar el nuevo usuario en la tabla de usuarios
$sql = 'INSERT INTO usuarios (unique_id, foto,  nombre, apellido, correo, password, tipo_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)';

try {
    $conexion = Conexion::getConexion();
    $stmt = $conexion->prepare($sql);
    if ($stmt->execute([$unique_id, $ruta_imagen, $nombre, $apellido, $correo, $password, $tipo_usuario])) {

        if (createData($correo)) {
            $array['redirectUrl'] = "../login.php";
            $array['error'] = false;
        } else {
            if (deleteRegister($correo)) {
                back($array);
            }
        }
    }
} catch (PDOException $e) {
    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        // El correo electrónico ya existe en la base de datos
        $array["alert"] =  "El usuario ya esta registrado, intentelo con otro correo";
    } else {
        // Otra excepción de PDO
        $array["alert"] = 'Error al registrar el usuario';
    }
}
$conexion = null;
back($array);


function back($array)
{
    echo json_encode($array);
}

function createData($correo)
{
    //$instancia = new UserController();
    $conexion = Conexion::getConexion();
    $query = "SELECT * FROM usuarios WHERE correo = :correo";
    $stm = $conexion->prepare($query);

    $stm->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stm->execute();
    if ($stm->rowCount() > 0) {
        $fila = $stm->fetch(PDO::FETCH_ASSOC);
        $id = $fila['id'];

        if (UtilitiesMethod::createData($id)) {
            if (UtilitiesMethod::createContactInformation($id)) {
                
                return true;
            }
        }
    }
}


function deleteRegister($correo)
{

    $conexion = Conexion::getConexion();
    $query = "DELETE FROM usuarios WHERE correo = :correo";
    $stm = $conexion->prepare($query);

    $stm->bindParam(':correo', $correo, PDO::PARAM_STR);
    $stm->execute();
    if ($stm->rowCount() > 0) {
        return true;
    }
}

// Cerrar la conexión



