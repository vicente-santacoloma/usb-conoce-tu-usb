<?php
/**
 * Description of Categoria
 *
 * @author andreth
 */
class Categoria {

    private $nombre;

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function valuesDB() {
        return '' . $nombre . '' ;
    }

    public function columnsDB() {
        return '\"' . 'nombre' . '\"' ;
    }
}
?>
