<?php
    if(isset($_COOKIE['contador'])){
        setcookie('contador', $_COOKIE['contador'] + 1, time() + 365*24*60*60);
        $mensaje = 'Gracias por visitarnos. Numero de visitas: ' . $_COOKIE['contador'];
    }
    else{
        //Caduca en un anho
        setcookie('contador', 1, time() + 365*24*60*60);
        $mensaje = 'Bienvenido a nuestro sitio web';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/estilo.css">
    <title>Laboratorio 13</title>
</head>
<body>
    <h1>Contador de visitas con Cookies</h1><p>
        <h3><?php echo $mensaje;?></h3>
    </p>
</body>
</html>