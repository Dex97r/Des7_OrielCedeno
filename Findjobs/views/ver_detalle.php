<?php
include_once('../database/conexion.php');
include_once('../controllers/empresa/company_m.php');
session_start();
$user = $_SESSION['user_type'];
$id = $_GET['id'];
$fila = CompanyMethods::getJobsPostedById($id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/company.css">

</head>

<body>

    <?php include "../utility/nav_user.blade.php"; ?>

    <div class="container" id="tab">
        <div class="row  mt-2">

            <div class="col-12 shadow-p">
                
                    <h1 class="mt-3 mb-3">Empleo Publicado</h1>
                    <form id="update_jobs" method="POST" value="<?php echo $fila['id'] ?>">
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título del empleo</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required value="<?php echo $fila['titulo'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción del empleo</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required   ><?php echo $fila['descripcion'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="requisitos" class="form-label">Requisitos del empleo</label>
                            <textarea class="form-control" id="requisitos" name="requisitos" rows="3" required ><?php echo $fila['requisitos'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación del empleo</label>
                            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required    value="<?php echo $fila['ubicacion'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="salario" class="form-label">Salario ofrecido</label>
                            <input type="text" class="form-control" id="salario" name="salario" required    value="<?php echo $fila['salario'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de inicio del empleo</label>
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required  value="<?php echo $fila['fecha_inicio'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="tipo_contrato" class="form-label">Tipo de contrato</label>
                            <select class="form-select" id="tipo_contrato" name="tipo_contrato" required    value="<?php echo $fila['tipo_contrato'] ?>">
                            <option value="">Seleccionar</option>
                            <?php
                                $opciones = array(
                                    "Tiempo completo" => "Tiempo completo",
                                    "Medio tiempo" => "Medio tiempo",
                                    "Por proyecto" => "Por proyecto",
                                    "Prácticas profesionales" => "Prácticas profesionales"
                                );

                                foreach ($opciones as $valor => $texto) {
                                    $selected = ($valor == $fila['tipo_contrato']) ? "selected" : "";
                                    $tpcontrato.= "<option value='$valor' $selected>$texto</option>";
                                }
                                echo $tpcontrato;
                            ?>
                                
                                <!-- <option value="Tiempo completo">Tiempo completo</option>
                                <option value="Medio tiempo">Medio tiempo</option>
                                <option value="Por proyecto">Por proyecto</option>
                                <option value="Prácticas profesionales">Prácticas profesionales</option> -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="forma_aplicacion" class="form-label">Forma de aplicación</label>
                            <select class="form-select" id="forma_aplicacion" name="forma_aplicacion" required  value="<?php echo $fila['forma_aplicacion'] ?>">
                                <option value="">Seleccionar</option>
                                <?php
                                $formas_aplicacion = array(
                                    "Formulario en línea" => "Formulario en línea",
                                    "Correo electrónico" => "Correo electrónico",
                                    "Entrega física de CV" => "Entrega física de CV",
                                    "Entrevista" => "Entrevista",
                                    "Otro" => "Otro"
                                );

                                foreach ($formas_aplicacion as $valor => $texto) {
                                    $selected = ($valor == $fila['forma_aplicacion']) ? "selected" : "";
                                    $fmaplicacion.= "<option value='$valor' $selected>$texto</option>";
                                }
                                echo $fmaplicacion;
                            ?>
                                
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning">Actualizar informacion</button>
                        </div>
                    </form>

            </div>

        </div>
    </div>

    <?php include "../utility/footer.php"; ?>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>



    <script src="../js/_cop.js"></script>
</body>

</html>