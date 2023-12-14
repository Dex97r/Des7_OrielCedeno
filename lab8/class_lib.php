<?php
class IndicadorVentas {

private $ventas;
private $imagen;
private $rendimiento;

public function __construct($ventas) {
    $this->ventas = $ventas;
    $this->calcularImagen();
    $this->calcularRendimiento();
}

private function calcularImagen() {
    if ($this->ventas > 80) {
        $this->imagen = "imagen1.png";
    } elseif ($this->ventas >= 50 && $this->ventas <= 79) {
        $this->imagen = "imagen2.png";
    } else {
        $this->imagen = "imagen3.png";
    }
}

private function calcularRendimiento() {
    $this->rendimiento = ($this->ventas > 80) ? "¡Excelente rendimiento!" : ($this->ventas >= 50 && $this->ventas <= 79 ? "Rendimiento regular" : "Rendimiento bajo");
}

public function getVentas() {
    return $this->ventas;
}

public function getImagen() {
    return $this->imagen;
}

public function getRendimiento() {
    return $this->rendimiento;
}
}

class Factorial {

    private $numero;
    private $factorial;

    public function __construct($numero) {
        $this->numero = $numero;
        $this->calcularFactorial();
    }

    private function calcularFactorial() {
        $this->factorial = 1;
        for ($i = 1; $i <= $this->numero; $i++) {
            $this->factorial *= $i;
        }
    }

    public function getNumero() {
        return $this->numero;
    }

    public function getFactorial() {
        return $this->factorial;
    }
}

?>
