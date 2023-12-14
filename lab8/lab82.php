<?php

require_once "class_lib.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];

    $factorial = new Factorial($numero);

    echo "<h1>Resultado</h1>";
    echo "<p>El factorial de $numero es $factorial->getFactorial() </p>";
}

?>
