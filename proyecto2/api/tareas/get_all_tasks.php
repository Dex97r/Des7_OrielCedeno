<?php
include 'db_connect.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM tasks";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $tasks = array();
    while($row = $result->fetch_assoc()) {
        $tasks[] = $row;
    }
    echo json_encode($tasks);
} else {
    echo json_encode(["mensaje" => "No se encontraron tareas"]);
}

$conn->close();
?>