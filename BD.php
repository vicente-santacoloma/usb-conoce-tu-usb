<?php

class BD {

    private $schema = "\"USB\"";
    private $test_local = true;

    public function conectarse() {
        if ($this->test_local) {
            return $this->conectarse_local();
        }
        $dbconexion = pg_connect("host=auliya.ldc.usb.ve dbname=CI585226 user=08-11031 password=rausb")
                or die('No se estableció conexión con la BD: ' . pg_last_error());
        return $dbconexion;
    }

    public function conectarse_local() {
        $dbconexion = pg_connect("host=localhost dbname=ci585226 user=08-11031 password=rausb")
                or die('No se estableció conexión con la BD: ' . pg_last_error());
        return $dbconexion;
    }

    public function desconectarse($dbconexion) {
        pg_close($dbconexion);
    }

    public function agregarElem($elem) {
        $conexion = $this->conectarse();
        $query = "INSERT INTO " . $this->schema . "." . $elem->getTable() . "  (" . $elem->columnsDB() . ") VALUES (" . $elem->valuesDB() . ")";
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo agregar el elemento";
        }
        $this->desconectarse($conexion);
    }

    public function agregarCategoriaAPoi($elem1,$elem2) {
        $conexion = $this->conectarse();
        $query = "INSERT INTO " . $this->schema . "categorias_poi ( nombre , poi ) VALUES (" . $elem1->getNombre() . ", ". $elem2->getId() .")";
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo agregar el elemento";
        }
        $this->desconectarse($conexion);
    }

    public function eliminarElem($elem) {
        $conexion = $this->conectarse();
        $query = " DELETE FROM " . $this->schema . "." . $elem->getTable() . " WHERE " . $elem->idname() . " = " . $elem->getId();
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo eliminar el elemento";
        }
        $this->desconectarse($conexion);
    }

    public function consultarElem($elem) {
        $conexion = $this->conectarse();
        $query = " SELECT * FROM " . $this->schema . "." . $elem->getTable() . ($elem->getId() ? " WHERE " . $elem->getIdName() . " = " . $elem->getId() : "" );
        $result = pg_query($conexion, $query);
        $this->desconectarse($conexion);
        return $result;
    }

    public function modificarElem($elem, $value) {
        $conexion = $this->conectarse();
        $query = "UPDATE " . $this->schema . "." . $elem->getTable() . " SET " . $elem->getColumn() . " = " . $value . " WHERE " . $elem->idname() . " = " . $elem->getId();
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo modificar el elemento";
        }
        $this->desconectarse($conexion);
    }

    // Para saber el valor del ID guardado
    function insertId($pg_result, $serial_column, $table)
    {
        $conexion = $this->conectarse();
        $oid = pg_last_oid($pg_result);
        $query = "SELECT $serial_column FROM $table WHERE oid = $oid";
        $result = pg_query($conexion,$query);
        $row = pg_fetch_row($result, 0);
        return($row[0]);
    }

}

?>
