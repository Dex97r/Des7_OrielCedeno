<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Login de Usuarios</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="css/login.css">
    

</head>

<body>

	<?php include_once('utility/nav_log_reg.php'); ?>

	<div class="container">
		<div class="row justify-content-center align-items-center">
			<div class="col-sm-12 col-md-6 col-lg-4 col-xl-4">
				<div class="form">
					<h1>Login de Usuarios</h1>
					<form id="login" method="POST">
						<div class="mb-3">
							<label for="correo" class="form-label">Correo electrónico</label>
							<input type="email" class="form-control" id="correo" name="correo" required>
						</div>
						<div class="mb-3">
							<label for="password" class="form-label">Contraseña</label>
							<input type="password" class="form-control" id="password" name="password" required>
						</div>
						<div class="mb-3">
							<select name="tipo" class="form-select">
								<option value="Normal">Usuario normal</option>
								<option value="Empresa">Empresa</option>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Iniciar sesión</button>
						<a href="views/registro.php" type="submit" class="btn btn-primary">Registrar</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<script src="js/_login.js"></script>
</body>

</html>