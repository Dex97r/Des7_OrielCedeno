<?php

// Declaramos el arreglo
$arreglo = array();

// Solicitamos al usuario 20 números diferentes
for ($i = 0; $i < 20; $i++) {
  do {
    $numero = rand(1, 100);
  } while (in_array($numero, $arreglo));

  $arreglo[] = $numero;
}

// Obtenemos el elemento mayor
$mayor = max($arreglo);
$posicion = array_search($mayor, $arreglo);

// Mostramos el resultado
echo "El elemento mayor es el $mayor, que se encuentra en la posición $posicion";

?>

