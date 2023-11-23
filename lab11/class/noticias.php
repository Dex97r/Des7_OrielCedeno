<?php 
require_once('modelo.php');
class noticia extends modeloCredencialesBD{
    protected $titulo;
    protected $texto;
    protected $categoria;
    protected $fecha;
    protected $imagen;

    public function __construct(){
        parent::__construct();
    }

    public function consultar_noticias(){
        $instruccion = "CALL sp_listar_noticias()";

        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado){
            echo "Fallo al consultar las noticias";
        }
        else{
            return $resultado;
            //$resultado->close();
            $this->_db->close();
        }
    }
    public function consultar_noticias_paginacion($limit, $offset){
        $instruccion = "CALL sp_listar_noticias_paginacion(".$limit.", ".$offset.")";
    
        $consulta = $this->_db->query($instruccion);
        if ($consulta) {
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            $this->_db->close();
            return $resultado;
        } else {
            echo "Fallo al consultar las noticias";
            return array(); // Devuelve un array vacío en caso de fallo
        }
    }
    

    public function consultar_noticias_filtro($campo, $valor){
        $instruccion = "CALL sp_listar_noticias_filtro('".$campo."', '".$valor."')";

        $consulta=$this->_db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

        if($resultado){
            return $resultado;
            //$resultado->close();
            $this->_db->close();
        }
    }
}

?>