<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php include_once('../utility/nav_log_reg.php'); ?>
    <div class="container mt-5">
        <h1>Registro de Usuarios</h1>
        <form id="formulario" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="logo" class="form-label">Foto</label>
                <input required type="file" class="form-control" id="foto" name="foto" required>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="tipo_usuario" class="form-label">Tipo de cuenta:</label>
                <input class="form-control" id="tipo_usuario" name="tipo_usuario" value="Normal" readonly>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
            <a href="../login.php" type="submit" class="btn btn-primary">Regresar</a>
        </form>
        <small>¿Quieres una cuenta para empresa? <a href="empresas.php">Aqui</a></small>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="../js/_login.js"></script>
</body>

</html>