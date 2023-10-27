<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio 11</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <h1>Consulta de noticias</h1>
    <?php 
        require_once("class/noticias.php");
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = ($page - 1) * $limit;

$obj_noticia = new noticia();
$noticias = $obj_noticia->consultar_noticias_paginacion($limit, $offset);
// Resto del código de generación de tabla

echo "<div>";
if ($page > 1) {
    echo "<a href='?page=".($page - 1)."'>Anterior</a>";
}
if (count($noticias) == $limit) {
    echo "<a href='?page=".($page + 1)."'>Siguiente</a>";
}
echo "</div>";

    
        $obj_noticia=new noticia();
        $noticias = $obj_noticia->consultar_noticias();
        $nfilas = count($noticias);
        if($nfilas > 0){
            print ("<table\n>");
            print ("<tr\n>");
            print ("<th>Titutlo</th>\n");
            print ("<th>Texto</th>\n");
            print ("<th>Categoria</th>\n");
            print ("<th>Fecha</th>\n");
            print ("<th>Imagen</th>\n");
            print ("</tr>\n");
            
            foreach($noticias as $resultado){
                print("<tr>\n");
                print("<td>" . $resultado['titulo'] ."</td>\n");
                print("<td>" . $resultado['texto'] ."</td>\n");
                print("<td>" . $resultado['categoria'] ."</td>\n");
                print("<td>" . date("j/n/Y",strtotime($resultado['fecha']))."</td>\n");
            

                if($resultado['imagen'] != ""){
                    print ("<td><a target='_blank' href='img/'>" . $resultado['imagen'] . "'><img border='0' src='img/iconotexto.gif'></a></td>\n");
                }
                else{
                    print ("<td>&nbsp;</td>\n");
                }
                print ("</tr>\n");
            }
            print ("</table>\n");
        }
        else{
            print ("No hay noticias disponibles");
        }
    ?>
</body>
</html>