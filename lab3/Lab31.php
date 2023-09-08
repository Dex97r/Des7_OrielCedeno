<?php
$diametro = $_POST['diam'];
$altura = $_POST['altu'];
$radio = $diametro/2;
$Pi= 3.141593;
$volumen = $PI*$radio*$altura;
echo "<br/> El volumen del cilindro es de: ". $volumen. " metros cubicos";
?>

