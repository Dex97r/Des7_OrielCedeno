<?php
    
    include_once('../database/conexion.php');
    
    // Recibir los datos del formulario
    $type = $_POST['tipo'];

    switch ($type) {
        case 'Normal':
            Login::getUserIfExist();
            break;
        case 'Empresa':
            Login::getCompanyIfExist();
            break;
        default:
            echo json_encode($array);
            exit;
            break;
    }

    class Login{
        static function getUserIfExist(){
        $email = $_POST['correo'];
        $password = $_POST['password'];
        $array = array("error" => true, "alert" => 'Credenciales incorrectas, intentalo otra vez');
        if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
            echo json_encode($array);
            exit;
        }

        $array = array("error" => true, "alert" => 'Credenciales incorrectas, intentalo otra vez');
        // Buscar el usuario en la tabla de usuarios
        $sql = 'SELECT * FROM usuarios WHERE correo = :mail';
        $conexion = Conexion::getConexion();

        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':mail', $email, PDO::PARAM_STR);

        $stmt->execute();
        // $stmt->execute([$correo]);
        try {
            if ($stmt->rowCount() > 0) {
                $fila = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($fila && password_verify($password, $fila['password'])) {
                    session_start();
                    $_SESSION['mail'] = $fila['correo'];
                    $_SESSION['id'] = $fila['unique_id'];
                    $_SESSION['name'] = $fila['nombre'];
                    $_SESSION['lastname'] = $fila['apellido'];
                    $_SESSION['user_type'] = $fila['tipo_usuario'];

                    $array['error'] = false;
                    $array['redirectUrl'] = 'utility/validar_usuario.php';
                } else {
                    $array["alert"] = 'Correo electrónico o contraseña incorrectos';
                }
            }
        } catch (\Throwable $th) {
            $array["alert"] = 'Correo electrónico o contraseña incorrectos';
        }


        // Cerrar la conexión
        $conexion = null;
        echo json_encode($array);
        }

        static function getCompanyIfExist()
        {
            $email = $_POST['correo'];
            $password = $_POST['password'];
            $array = array("error" => true, "alert" => 'Credenciales incorrectas, intentalo otra vez');
            $sql = 'SELECT unique_id, tipo_usuario, nombre, contrasena FROM empresas WHERE correo_electronico = :mail';
            $conexion = Conexion::getConexion();

            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':mail', $email, PDO::PARAM_STR);

            $stmt->execute();

            try {
                if ($stmt->rowCount() > 0) {
                    $fila = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($fila && password_verify($password, $fila['contrasena'])) {
                        session_start();

                        $_SESSION['id'] = $fila['unique_id'];
                        $_SESSION['user_type'] = $fila['tipo_usuario'];
                        $_SESSION['name_comp'] = $fila['nombre'];

                        $array['error'] = false;
                        $array['redirectUrl'] = 'utility/validar_usuario.php';
                    } else {
                        $array["alert"] = 'Correo electrónico o contraseña incorrectos';
                    }
                }
            } catch (\Throwable $th) {
                $array["alert"] = 'Correo electrónico o contraseña incorrectos';
            }

            // Cerrar la conexión
            $conexion = null;
            echo json_encode($array);
        }
    }
