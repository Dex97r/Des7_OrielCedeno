<?php
include_once('../../database/conexion.php');
include_once('company_m.php');
$array['error'] = true;
// Obtener los datos del formulario
$empresa_id = CompanyMethods::getCompanyId();
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$requisitos = $_POST['requisitos'];
$ubicacion = $_POST['ubicacion'];
$salario = $_POST['salario'];
$fecha_inicio = $_POST['fecha_inicio'];
$tipo_contrato = $_POST['tipo_contrato'];
$forma_aplicacion = $_POST['forma_aplicacion'];

// Conectar a la base de datos usando PDO
$conexion = Conexion::getConexion();

// Llamar al procedimiento almacenado
$resultado = $conexion->exec("CALL insertar_empleo({$empresa_id}, '{$titulo}', '{$descripcion}', '{$requisitos}', '{$ubicacion}', {$salario}, '{$fecha_inicio}', '{$tipo_contrato}', '{$forma_aplicacion}')");

// Comprobar el resultado
if ($resultado > 0) {
    $array['error'] = false;
    $array['alert'] = 'empresa.php';
} else {
    $array['alert'] = "Error al agregar el empleo";
}

// Cerrar la conexión
$conexion = null;
echo json_encode($array);
?>
