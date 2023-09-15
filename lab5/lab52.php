<?php
$tamanoMaximo = 1024 * 1024; // 1MB

if (isset($_FILES['nombre_archivo_cliente']) && is_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'])) {
    $nombreDirectorio = "archivos/";
    $nombrearchivo = $_FILES['nombre_archivo_cliente']['name'];
    $nombreCompleto = $nombreDirectorio . $nombrearchivo;

    $tamanoArchivo = $_FILES['nombre_archivo_cliente']['size'];

    $tipoArchivo = $_FILES['nombre_archivo_cliente']['type'];

    if ($tamanoArchivo <= $tamanoMaximo) {
        
        $extensionesValidas = array('jpg', 'jpeg', 'gif', 'png');
        $extension = strtolower(pathinfo($nombrearchivo, PATHINFO_EXTENSION));

        if (in_array($extension, $extensionesValidas)) {
            if (is_file($nombreCompleto)) {
                $idUnico = time();
                $nombrearchivo = $idUnico . "-" . $nombrearchivo;
                echo "Archivo repetido, se cambiará el nombre a $nombrearchivo<br><br>";
            }

            move_uploaded_file($_FILES['nombre_archivo_cliente']['tmp_name'], $nombreDirectorio . $nombrearchivo);
            echo "El archivo se ha subido satisfactoriamente al directorio $nombreDirectorio <br>";
        } else {
            echo "El archivo no es un formato válido. Solo se permiten archivos jpg, jpeg, gif y png.<br>";
        }
    } else {
        echo "El archivo es demasiado grande. El tamaño máximo permitido es 1MB.<br>";
    }
} else {
    echo "No se ha podido subir el archivo<br>";
}
?>
