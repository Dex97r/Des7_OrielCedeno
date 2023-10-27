<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/estilo.css">
    <title>Laboratorio 13</title>
</head>
<body>
    <h1>Recuperar valor de una Cookie</h1>
    <?php
        if(isset($_COOKIE["user"])){
            echo "<h2>Bienvenido ". $_COOKIE["user"]."!</h2><br>";
        }else{
            echo "<h2>Bienvenido invitado!</h2><br>";
        }
    ?>
    <a href="Lab131.php">...Regresar</a>
    <a href="Lab134.php">Continuar...</a>
</body>
</html>