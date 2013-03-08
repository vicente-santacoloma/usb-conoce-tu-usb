<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Multimedia
 *
 * @author andreth
 */
class Multimedia {

    private $id;
    private $enlace;
    private $tipo;
    private $poi;
    private $descripcion;
    private $table = "multimedia_poi";

    public function getTable() {
        return $this->table;
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getEnlace() {
        return $this->enlace;
    }

    public function setEnlace($enlace) {
        $this->enlace = $enlace;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getPoi() {
        return $this->poi;
    }

    public function setPoi($poi) {
        $this->poi = $poi;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function valuesDB() {
        return '' . $id . ',' . '\"' . $enlace . '\",' . '\"'
                . $tipo . '\",' . '\"' . $descripcion . '\",' . '\"' . $poi->getId() . '\"';
    }

    public function columnsDB() {
        return '\"' . "id" . '\",' . '\"' . "enlace" . '\",'
                . '\"' . "tipo" . '\",' . '\"' . "descripcion" . '\",' . '\"' . "poi" . '\"';
    }

    public function getIdName() {
        return '\"' . 'id' . '\"';
    }

}

?>
