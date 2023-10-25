<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "checklist_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['add_task'])) {
    $task_name = $_POST['task_name'];
    $status = $_POST['status'];
    $task_description = $_POST['task_description'];
    $task_due_date = $_POST['task_due_date'];
    $edited_flag = 0; // 0 representa falso para el indicador de edición
    $responsible_person = $_POST['responsible_person'];
    $task_type = $_POST['task_type'];

    $sql = "CALL InsertTask('$task_name', '$status', '$task_description', '$task_due_date', $edited_flag, '$responsible_person', '$task_type')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


/*if (isset($_GET['delete_task'])) {
    $id = $_GET['delete_task'];
    $sql = "CALL DeleteTask($id)";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}*/

if (isset($_GET['delete_task'])) {
    $id = $_GET['delete_task'];
    $sql = "CALL DeleteTask($id)";
    if ($conn->query($sql) === TRUE) {
        header("Location: inicio.php"); 
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}


$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Task: " . $row["task_name"]. " " . $row["status"]. "<a href='edit.php?id=".$row["id"]."'>Edit</a> <a href='?delete_task=".$row["id"]."'>Delete</a><br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checklist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Checklist Tracker</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href="index.php">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="agregar.php">Agregar una Tarea</a>
				</li>
                <li class="nav-item">
					<a class="nav-link" href="reportes.php">Reportes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="ayuda.php">Ayuda</a>
				</li>
			</ul>
		</div>
	</nav>
    <!-- Formulario HTML para agregar una nueva tarea -->
<div class="container mt-5">
    <form method="post">
        <div class="form-group">
            <label for="task_name">Task Name</label>
            <input type="text" class="form-control" id="task_name" name="task_name" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="por hacer">Por Hacer</option>
                <option value="en progreso">En Progreso</option>
                <option value="terminada">Terminada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="task_description">Task Description</label>
            <input type="text" class="form-control" id="task_description" name="task_description" required>
        </div>
        <div class="form-group">
            <label for="task_due_date">Task Due Date</label>
            <input type="date" class="form-control" id="task_due_date" name="task_due_date" required>
        </div>
        <div class="form-group">
            <label for="responsible_person">Responsible Person</label>
            <input type="text" class="form-control" id="responsible_person" name="responsible_person" required>
        </div>
        <div class="form-group">
            <label for="task_type">Task Type</label>
            <input type="text" class="form-control" id="task_type" name="task_type" required>
        </div>
        <button type="submit" class="btn btn-primary" name="add_task">Add Task</button>
    </form>
</div>

</body>
</html>
