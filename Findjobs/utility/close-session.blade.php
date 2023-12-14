<?php

    session_start(); // Inicia la sesión existente
    session_destroy(); // Destruye la sesión

    // Opcionalmente, puedes limpiar las variables de sesión también
    $_SESSION = array();

    // Redirige al usuario a otra página
    header("location: ../login.php");
    exit;


?>