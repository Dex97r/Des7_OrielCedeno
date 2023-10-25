<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "checklist_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Tareas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
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
        <h2>Reporte de Tareas</h2>
        <h4>Tareas Agrupadas por Estado:</h4>
        <ul class="list-group">
            <?php
            $sql_todo = "SELECT COUNT(*) as count_todo FROM tasks WHERE status = 'por hacer'";
            $result_todo = $conn->query($sql_todo);
            $row_todo = $result_todo->fetch_assoc();
            echo '<li class="list-group-item">Tareas por Hacer: ' . $row_todo["count_todo"] . '</li>';

            $sql_in_progress = "SELECT COUNT(*) as count_in_progress FROM tasks WHERE status = 'en progreso'";
            $result_in_progress = $conn->query($sql_in_progress);
            $row_in_progress = $result_in_progress->fetch_assoc();
            echo '<li class="list-group-item">Tareas en Progreso: ' . $row_in_progress["count_in_progress"] . '</li>';

            $sql_done = "SELECT COUNT(*) as count_done FROM tasks WHERE status = 'terminada'";
            $result_done = $conn->query($sql_done);
            $row_done = $result_done->fetch_assoc();
            echo '<li class="list-group-item">Tareas Terminadas: ' . $row_done["count_done"] . '</li>';
            ?>
        </ul>

<div class="container mt-5">
    <h4>Tareas Agrupadas por Día:</h4>
    <ul class="list-group">
        <?php
        $sql_by_day = "SELECT COUNT(*) as count_by_day, DATE(task_due_date) as day FROM tasks GROUP BY DATE(task_due_date)";
        $result_by_day = $conn->query($sql_by_day);
        if ($result_by_day->num_rows > 0) {
            while ($row = $result_by_day->fetch_assoc()) {
                echo '<li class="list-group-item">Tareas para ' . $row["day"] . ': ' . $row["count_by_day"] . '</li>';
            }
        } else {
            echo '<li class="list-group-item">No hay tareas para mostrar</li>';
        }
        ?>
    </ul>
</div>

<div class="container mt-5">
    <h4>Tareas Agrupadas por Semana:</h4>
    <ul class="list-group">
        <?php
        $sql_by_week = "SELECT COUNT(*) as count_by_week, YEARWEEK(task_due_date) as week FROM tasks GROUP BY YEARWEEK(task_due_date)";
        $result_by_week = $conn->query($sql_by_week);
        if ($result_by_week->num_rows > 0) {
            while ($row = $result_by_week->fetch_assoc()) {
                echo '<li class="list-group-item">Tareas para la semana ' . $row["week"] . ': ' . $row["count_by_week"] . '</li>';
            }
        } else {
            echo '<li class="list-group-item">No hay tareas para mostrar</li>';
        }
        ?>
    </ul>
</div>

<div class="container mt-5">
    <h4>Tareas Agrupadas por Mes:</h4>
    <ul class="list-group">
        <?php
        $sql_by_month = "SELECT COUNT(*) as count_by_month, DATE_FORMAT(task_due_date, '%Y-%m') as month FROM tasks GROUP BY DATE_FORMAT(task_due_date, '%Y-%m')";
        $result_by_month = $conn->query($sql_by_month);
        if ($result_by_month->num_rows > 0) {
            while ($row = $result_by_month->fetch_assoc()) {
                echo '<li class="list-group-item">Tareas para ' . $row["month"] . ': ' . $row["count_by_month"] . '</li>';
            }
        } else {
            echo '<li class="list-group-item">No hay tareas para mostrar</li>';
        }
        ?>
    </ul>
</div>

<div class="container mt-5">
    <h4>Tareas Agrupadas por Año:</h4>
    <ul class="list-group">
        <?php
        $sql_by_year = "SELECT COUNT(*) as count_by_year, YEAR(task_due_date) as year FROM tasks GROUP BY YEAR(task_due_date)";
        $result_by_year = $conn->query($sql_by_year);
        if ($result_by_year->num_rows > 0) {
            while ($row = $result_by_year->fetch_assoc()) {
                echo '<li class="list-group-item">Tareas para el año ' . $row["year"] . ': ' . $row["count_by_year"] . '</li>';
            }
        } else {
            echo '<li class="list-group-item">No hay tareas para mostrar</li>';
        }
        ?>
    </ul>
</div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
