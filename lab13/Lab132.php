<?php
    if(array_key_exists('enviar', $_POST)){
        $expire = time()+60*5;
        setcookie("user", $_REQUEST['visitantes'], $expire);
        header("Refresh:0");
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
    <h1>Creacion de Cookies</h1>
    <h2>La cookie "User" tendra solo 5 minutos de duracion</h2>
    <?php
        if(isset($_COOKIE["user"])){
            print("<br> Hola <b>".$_COOKIE["user"]."</b> gracias por visitar nuestro sitio Web <br>");
        }else{
    ?>
    <form name="formcookie" action="Lab132.php" method="post">
        <br>Hola, Primera vez que te vemos por nuestro sitio Web Como te llamas?
        <input type="text" name="visitantes" id="">
        <input type="submit" name="enviar" value="Gracias por intentificarte">    
    </form>
    <?php
        }
    ?>
    <br> <a href="Lab133.php">Continuar ...</a>
</body>
</html>