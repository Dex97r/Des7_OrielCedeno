<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ventas = floatval($_POST["ventas"]);

    if ($ventas > 80) {
        $imagen = "imagen1.png";
    } elseif ($ventas >= 50 && $ventas <= 79) {
        $imagen = "imagen2.png";
    } else {
        $imagen = "imagen3.png";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>
    <p>Porcentaje de ventas: <?php echo $ventas; ?>%</p>
    <img src="<?php echo $imagen; ?>" alt="rendimiento">
    <p><?php echo $ventas > 80 ? "¡Excelente rendimiento!" : ($ventas >= 50 && $ventas <= 79 ? "Rendimiento regular" : "Rendimiento bajo"); ?></p>
    <a href="lab81.html">Volver al formulario</a>
</body>
</html>

<?php

require_once "class_lib.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ventas = floatval($_POST["ventas"]);

    $indicadorVentas = new IndicadorVentas($ventas);

    echo "<h1>Resultado</h1>";
    echo "<p>Porcentaje de ventas: " . $indicadorVentas->getVentas() . "%</p>";
    echo "<img src='" . $indicadorVentas->getImagen() . "' alt='rendimiento'>";
    echo "<p>" . $indicadorVentas->getRendimiento() . "</p>";
    echo "<a href='lab41.html'>Volver al formulario</a>";
}

?>
