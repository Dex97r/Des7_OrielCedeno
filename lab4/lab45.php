<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $n = intval($_POST["n"]);

    if ($n % 2 != 0) {
        echo "N debe ser un numero par.";
    } else {
        $matriz = array();
        for ($i = 0; $i < $n; $i++) {
            $fila = array();
            for ($j = 0; $j < $n; $j++) {
                if ($i == $j) {
                    $fila[] = 1;
                } else {
                    $fila[] = 0;
                }
            }
            $matriz[] = $fila;
        }

        echo "<h2>Matriz Identidad de orden $n x $n:</h2>";
        echo "<table border='1'>";
        foreach ($matriz as $fila) {
            echo "<tr>";
            foreach ($fila as $elemento) {
                echo "<td>$elemento</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
