<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "checklist_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $sql = "SELECT * FROM tasks WHERE id = $task_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $task_name = $row['task_name'];
        $status = $row['status'];
        $task_description = $row['task_description'];
        $task_due_date = $row['task_due_date'];
        $responsible_person = $row['responsible_person'];
        $task_type = $row['task_type'];
    } else {
        echo "No se encontró la tarea.";
    }
} else {
    echo "ID de tarea no especificado.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalles de Tarea</title>
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
        <h2>Detalles de Tarea</h2>
        <ul class="list-group">
            <li class="list-group-item"><strong>Nombre de la Tarea:</strong> <?php echo $task_name; ?></li>
            <li class="list-group-item"><strong>Estado:</strong> <?php echo $status; ?></li>
            <li class="list-group-item"><strong>Descripción de la Tarea:</strong> <?php echo $task_description; ?></li>
            <li class="list-group-item"><strong>Fecha de Vencimiento:</strong> <?php echo $task_due_date; ?></li>
            <li class="list-group-item"><strong>Persona Responsable:</strong> <?php echo $responsible_person; ?></li>
            <li class="list-group-item"><strong>Tipo de Tarea:</strong> <?php echo $task_type; ?></li>
        </ul>
    </div>
</body>
</html>

<?php
$conn->close();
?>
