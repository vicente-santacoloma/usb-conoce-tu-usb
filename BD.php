<?php

class BD {

    private $schema = "USB";

    public function conectarse() {
        $dbconexion = pg_connect("host=auliya.ldc.usb.ve dbname=CI585226 user=08-11031 password=rausb")
                or die('No se estableció conexión con la BD: ' . pg_last_error());
        return $dbconexion;
    }

    public function desconectarse($dbconexion) {
        $pg_close($dbconexion);
    }

    public function agregarElem($elem) {
        $conexion = conectarse();
        $query = "INSERT INTO " . "\"" . $schema . "\"." . $elem->getTable() . " VALUES (" . $elem->columnsDB() . ") = (" . $elem->valuesDB() . ")";
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo agregar el elemento";
        }
        desconectarse($conexion);
    }

    public function eliminarElem($elem) {
        $conexion = conectarse();
        $query = " DELETE FROM " . "\"" . $schema . "\"." . $elem->getTable() . " WHERE id = " . $elem->getId();
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo eliminar el elemento";
        }
        desconectarse($conexion);
    }

    public function consultarElem($elem) {
        $conexion = conectarse();
        $query = " SELECT * FROM " . "\"" . $schema . "\"." . $elem->getTable() . " WHERE id = " . $elem->getId();
        $result = pg_query($conexion, $query);
        desconectarse($conexion);
        return pg_fetch_object($result);
    }

    public function modificarElem($elem, $value) {
        $conexion = conectarse();
        $query = "UPDATE " . "\"" . $schema . "\"." . $elem->getTable() . " SET " . $elem->getColumn() . " = " . $value . " WHERE id  = " . $elem->getId();
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo modificar el elemento";
        }
        desconectarse($conexion);
    }

}

?>
