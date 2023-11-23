<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/estilo.css">
    <title>Laboratorio 12</title>
</head>
<body>
    <h1>Manejo de sesiones</h1>
    <h2>Paso 2: se accede a la variable de sesion almacenada y se destruye</h2>
    <?php
        if(isset($_SESSION['var'])){
            $var = $_SESSION['var'];
            print ("<p>Valor de la variable de sesion: $var</p>\n");
            unset ($_SESSION['var']);
            print ("<a href='Lab123.php'>Paso 3</a>");
        }
        else{
            print("Sesion no iniciada, ir al <a href='Lab121.php'>paso 1</a> para inicar la sesion");
        }
    ?>
</body>
</html>