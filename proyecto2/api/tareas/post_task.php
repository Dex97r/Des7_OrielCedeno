<?php

include 'db_connect.php';

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (empty($data['task_name']) || empty($data['status']) || empty($data['task_description']) || empty($data['task_due_date']) || empty($data['edited_flag']) || empty($data['responsible_person']) || empty($data['task_type'])) {
    echo json_encode(["mensaje" => "Datos incompletos"]);
    exit;
}

$sql = $conn->prepare("INSERT INTO tasks (task_name, status, task_description, task_due_date, edited_flag, responsible_person, task_type) VALUES (?, ?, ?, ?, ?, ?, ?)");

$sql->bind_param("ssssiss", $data['task_name'], $data['status'], $data['task_description'], $data['task_due_date'], $data['edited_flag'], $data['responsible_person'], $data['task_type']);

if ($sql->execute()) {
    echo json_encode(["mensaje" => "Tarea creada exitosamente"]);
} else {
    echo json_encode(["mensaje" => "Error al crear la tarea"]);
}

$sql->close();
$conn->close();
?>