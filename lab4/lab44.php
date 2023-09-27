<!DOCTYPE html>
<html>
<head>
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php
    session_start();

    if (isset($_POST['numero'])) {
        $numero = intval($_POST['numero']);
        if ($numero % 2 == 0) {
            $_SESSION['numeros_pares'][] = $numero;
            echo "Número $numero agregado correctamente.<br>";
        } else {
            echo "Error: El número $numero no es par. Por favor, ingrese un número par.<br>";
        }
    }
    ?>

    <form action="lab44.html" method="get">
        <input type="submit" value="Volver al formulario">
    </form>

    <?php
    if (isset($_SESSION['numeros_pares'])) {
        echo "<h2>Números Pares Ingresados:</h2>";
        echo "<ul>";
        foreach ($_SESSION['numeros_pares'] as $num) {
            echo "<li>$num</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>
