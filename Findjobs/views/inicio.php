<?php
// Configuración de la base de datos
include_once('../database/conexion.php');
include_once('../controllers/user.php');
// include_once('../controllers/skills_methods.php');
session_start();
$id = $_SESSION["id"];
$mail = $_SESSION['mail'];

 $result = User::getUserInformation($mail, $id);
if (!$result) {
    header('location: ../login.php');
}


$dbh = null;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel="stylesheet" href="../css/nav.css">
    <title>Perfil de usuario</title>


</head>

<body>

    <?php include "../utility/nav_user.blade.php"; ?>

    <?php
        $fila = User::getProfile();
        $contact = User::getContactInformation();
    ?>


    <div id="tab-u" class="container">
       
        <div class="row mt-2">
            <div class="col-md-3">
                <?php include '../utility/usuario/perfil.php'; ?>
            </div>
            <div class="col-md-6 border-primary rounded shadow-p">
                <?php include '../utility/usuario/studiesSection.php'; ?>
            </div>
            <div class="col-md-3">
                <?php include '../utility/usuario/requests.php'; ?>
            </div>

        </div>
    </div>

    <?php include "../utility/footer.php"; ?>

    <!--  -->
    <div id="modal">

    </div>

</body>

<?php 
    include "../utility/usuario/_profile.php";
    include "../utility/usuario/_contact.php"; 
    include "../utility/usuario/_studies.php";
    include "../utility/usuario/_languajes.php";

?>


<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="../js/_user.js"></script>
<!-- <script src="../js/_lg.js"></script>
<script src="../js/_wz.js"></script> -->

</html>