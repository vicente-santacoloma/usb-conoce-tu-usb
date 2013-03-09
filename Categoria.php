<?php
/**
 * Description of Categoria
 *
 * @author andreth
 */
class Categoria {

    private $nombre;
    private $id;
    
    private $table = "categorias";

    public function getTable() {
        return $this->table;
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function valuesDB() {
        return '' . $this->nombre . '' ;
    }

    public function columnsDB() {
        return '\"' . 'nombre' . '\"' ;
    }
    
     public function getIdName() {
        return '\"' . 'nombre' . '\"' ;
    }

         public function getId() {
             return $this->nombre;
    }
}
?>
