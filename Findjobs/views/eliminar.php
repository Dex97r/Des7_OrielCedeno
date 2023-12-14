<?php
    include_once('../database/conexion.php');
    include_once('../controllers/utilityMethods.php');
    include_once('../controllers/empresa/company_m.php');
    session_start();

    $user = $_SESSION['user_type'];
    $id = $_GET['id'];
    if(CompanyMethods::deletePost($id)){
        header('location: empresa.php');
    }


?>