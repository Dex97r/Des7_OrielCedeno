<?php
include 'db_connect.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['id']) || (!isset($data['task_name']) && !isset($data['status']) && !isset($data['task_description']) && !isset($data['task_due_date']) && !isset($data['edited_flag']) && !isset($data['responsible_person']) && !isset($data['task_type']))) {
    echo json_encode(["mensaje" => "Datos incompletos para la actualización"]);
    exit;
}

$query = "UPDATE tasks SET ";
$parameters = [];
$types = '';

if (isset($data['task_name'])) {
    $query .= "task_name = ?, ";
    $parameters[] = &$data['task_name'];
    $types .= 's';
}
if (isset($data['status'])) {
    $query .= "status = ?, ";
    $parameters[] = &$data['status'];
    $types .= 's';
}

$query = rtrim($query, ', ');


$query .= " WHERE id = ?";
$parameters[] = &$data['id'];
$types .= 'i';

$sql = $conn->prepare($query);

$sql->bind_param($types, ...$parameters);

if ($sql->execute()) {
    if ($sql->affected_rows > 0) {
        echo json_encode(["mensaje" => "Tarea actualizada exitosamente"]);
    } else {
        echo json_encode(["mensaje" => "No se realizó ninguna actualización o la tarea no existe"]);
    }
} else {
    echo json_encode(["mensaje" => "Error al actualizar la tarea"]);
}

$sql->close();
$conn->close();
?>