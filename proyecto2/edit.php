<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "checklist_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['update_task'])) {
    $task_id = $_POST['task_id'];
    $task_name = $_POST['task_name'];
    $status = $_POST['status'];
    $task_description = $_POST['task_description'];
    $task_due_date = $_POST['task_due_date'];
    $edited_flag = 0; // 0 representa falso para el indicador de edición
    $responsible_person = $_POST['responsible_person'];
    $task_type = $_POST['task_type'];

    $sql = "CALL UpdateTask($task_id, '$task_name', '$status', '$task_description', '$task_due_date', $edited_flag, '$responsible_person', '$task_type')";
    if ($conn->query($sql) === TRUE) {
        header("Location: inicio.php"); 
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No task found";
        exit;
    }
} else {
    echo "No task id specified";
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
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
   <!-- Formulario HTML para editar una tarea -->
<div class="container mt-5">
    <form method="post">
        <input type="hidden" name="task_id" value="<?php echo $row['id']; ?>">
        <div class="form-group">
            <label for="task_name">Task Name</label>
            <input type="text" class="form-control" id="task_name" name="task_name" value="<?php echo $row['task_name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="por hacer" <?php if($row['status'] == 'por hacer') echo 'selected'; ?>>Por Hacer</option>
                <option value="en progreso" <?php if($row['status'] == 'en progreso') echo 'selected'; ?>>En Progreso</option>
                <option value="terminada" <?php if($row['status'] == 'terminada') echo 'selected'; ?>>Terminada</option>
            </select>
        </div>
        <div class="form-group">
            <label for="task_description">Task Description</label>
            <input type="text" class="form-control" id="task_description" name="task_description" value="<?php echo $row['task_description']; ?>" required>
        </div>
        <div class="form-group">
            <label for="task_due_date">Task Due Date</label>
            <input type="date" class="form-control" id="task_due_date" name="task_due_date" value="<?php echo $row['task_due_date']; ?>" required>
        </div>
        <div class="form-group">
            <label for="responsible_person">Responsible Person</label>
            <input type="text" class="form-control" id="responsible_person" name="responsible_person" value="<?php echo $row['responsible_person']; ?>" required>
        </div>
        <div class="form-group">
            <label for="task_type">Task Type</label>
            <input type="text" class="form-control" id="task_type" name="task_type" value="<?php echo $row['task_type']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary" name="update_task">Update Task</button>
    </form>
</div>

</body>
</html>
