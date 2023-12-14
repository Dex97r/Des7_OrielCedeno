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
        <div class="col-sm-12 col-md-6">
            <h1>Registro de empresas</h1>
            <!-- Creamos un formulario con Bootstrap -->
            <form id="company" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <input required type="file" class="form-control" id="logo" name="logo" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input required type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="correo_electronico" class="form-label">Correo electrónico</label>
                    <input required type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input required type="password" class="form-control" id="contrasena" name="contrasena" required>
                </div>
                <div class="mb-3">
                    <label for="telefono_contacto" class="form-label">Teléfono de contacto</label>
                    <input required type="tel" pattern="\d{4}-\d{4}" class="form-control" id="telefono_contacto" name="telefono_contacto" required>
                </div>
                <div class="mb-3">
                    <label for="informacion_empresa" class="form-label">Información de la empresa</label>
                    <textarea required class="form-control" id="informacion_empresa" name="informacion_empresa" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="direccion_empresa" class="form-label">Dirección de la empresa</label>
                    <input required class="form-control" id="direccion_empresa" name="direccion_empresa">
                </div>
                <div class="mb-3">
                    <label for="sitioweb_empresa" class="form-label">Sitio web de la empresa</label>
                    <input required class="form-control" id="sitioweb_empresa" name="sitioweb_empresa">
                </div>
                <button type="submit" class="btn btn-primary col-4">Guardar</button>
                <a type="submit" href="../login.php" class="btn btn-primary col-4">Volver al inicio</a>
            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
     <script src="../js/_cop.js"></script>
</body>

</html>