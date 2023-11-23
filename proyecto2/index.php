<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "checklist_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql_todo = "SELECT * FROM tasks WHERE status = 'por hacer'";
$result_todo = $conn->query($sql_todo);

$sql_in_progress = "SELECT * FROM tasks WHERE status = 'en progreso'";
$result_in_progress = $conn->query($sql_in_progress);

$sql_done = "SELECT * FROM tasks WHERE status = 'terminada'";
$result_done = $conn->query($sql_done);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checklist Tasks</title>
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
    <div class="container mt-5">
        <h2>Tareas por Hacer</h2>
        <ul class="list-group">
            <?php
            if ($result_todo->num_rows > 0) {
                while ($row = $result_todo->fetch_assoc()) {
                    echo '<li class="list-group-item"><a href="detalle_tarea.php?id=' . $row["id"] . '">' . $row["task_name"] . '</a></li>';
                }
            } else {
                echo '<li class="list-group-item">No hay tareas por hacer</li>';
            }
            ?>
        </ul>
    </div>

    <div class="container mt-5">
        <h2>Tareas en Progreso</h2>
        <ul class="list-group">
            <?php
            if ($result_in_progress->num_rows > 0) {
                while ($row = $result_in_progress->fetch_assoc()) {
                    echo '<li class="list-group-item"><a href="detalle_tarea.php?id=' . $row["id"] . '">' . $row["task_name"] . '</a></li>';
                }
            } else {
                echo '<li class="list-group-item">No hay tareas en progreso</li>';
            }
            ?>
        </ul>
    </div>

    <div class="container mt-5">
        <h2>Tareas Terminadas</h2>
        <ul class="list-group">
            <?php
            if ($result_done->num_rows > 0) {
                while ($row = $result_done->fetch_assoc()) {
                    echo '<li class="list-group-item"><a href="detalle_tarea.php?id=' . $row["id"] . '">' . $row["task_name"] . '</a></li>';
                }
            } else {
                echo '<li class="list-group-item">No hay tareas terminadas</li>';
            }
            ?>
        </ul>
    </div>
</body>
</html>

<?php
$conn->close();
?>

