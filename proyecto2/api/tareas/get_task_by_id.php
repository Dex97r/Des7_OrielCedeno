<?php
include 'db_connect.php';

header('Content-Type: application/json');

$id = isset($_GET['id']) ? $conn->real_escape_string($_GET['id']) : '';

if (empty($id)) {
    echo json_encode(["mensaje" => "No se proporcionó el ID"]);
    exit;
}

$sql = $conn->prepare("SELECT * FROM tasks WHERE id = ?");

$sql->bind_param("i", $id); 

$sql->execute();

$result = $sql->get_result();
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo json_encode(["mensaje" => "No se encontró una tarea con el ID proporcionado"]);
}

$sql->close();
$conn->close();
?>