<html>
    <head>
        <title>Laboratorio 2.4</title>
</head>
<body>
    <?php
    //creacion del arreglo array ("clave => "valor")
    $personas = array("Juan" => "Panama", "Jhon" => "USA", "eica" => "finlandia", "Kusanagi" => "japon");

    //recorrer todo el arreglo
    foreach($personas as $persona => $pais){
        print "$persona es de $pais<br>";
    
    }
    //impresion especifica
    echo "<br>".$personas["Juan"];
    echo "<br>".$personas["eica"];?>
    </body>
    </html>