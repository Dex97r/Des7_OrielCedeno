<?php

// Obtener el número del formulario
$numero = $_POST["numero"];

// Calcular el factorial
$factorial = 1;
for ($i = 1; $i <= $numero; $i++) {
    $factorial *= $i;
}

// Mostrar el resultado
echo "El factorial de $numero es $factorial";

?>
