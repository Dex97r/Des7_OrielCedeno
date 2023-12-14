<?php
    session_start();
    
    if (isset($_SESSION['user_type'])) {
        // la variable de sesión existe
        if ($_SESSION['user_type'] === 'Empresa') {
           header('Location: ../views/empresa.php');
          
        }else if($_SESSION['user_type'] === "Normal"){
         
           header('Location: ../views/inicio.php');
           exit;
        }
    }else{
        header('Location: error.php');
        session_destroy();
        exit;
    }
?>