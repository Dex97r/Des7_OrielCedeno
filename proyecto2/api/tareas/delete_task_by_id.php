<?php

include 'db_connect.php';

header('Content-Type: application/json');

$id = isset($_GET['id']) ? $conn->real_escape_string($_GET['id']) : '';

if (empty($id)) {
    echo json_encode(["mensaje" => "No se proporcionó el ID"]);
    exit;
}

$sql = $conn->prepare("DELETE FROM tasks WHERE id = ?");

$sql->bind_param("i", $id); 

if ($sql->execute()) {
    if ($sql->affected_rows > 0) {
        echo json_encode(["mensaje" => "Tarea eliminada exitosamente"]);
    } else {
        echo json_encode(["mensaje" => "No se encontró una tarea con el ID proporcionado"]);
    }
} else {
    echo json_encode(["mensaje" => "Error al eliminar la tarea"]);
}
$sql->close();
$conn->close();
?>