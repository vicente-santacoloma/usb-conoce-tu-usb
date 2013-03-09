<?php

class BD {

    private $schema = "\"USB\"";
    private $test_local = false;

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
        $query = "INSERT INTO " . $this->schema . "." . $elem->getTable()
                . "(" . $elem->columnsDB() . ")" . "VALUES (" . $elem->valuesDB() . ")";
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo agregar el elemento";
        }
        $this->desconectarse($conexion);
    }

    public function agregarCategoriaAPoi($elem1, $elem2) {
        $conexion = $this->conectarse();
        $query = "INSERT INTO " . $this->schema . "categorias_poi ( nombre , poi ) VALUES (" . $elem1->getNombre() . ", " . $elem2->getId() . ")";
        $result = pg_query($conexion, $query);
        if (!$result) {
            echo "No se pudo agregar el elemento";
        }
        $this->desconectarse($conexion);
    }

    public function eliminarElem($elem) {
        $conexion = $this->conectarse();
        $query = " DELETE FROM " . $this->schema . "." . $elem->getTable() . " WHERE " . $elem->getIdName() . " = " . $elem->getId();
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

    public function consultarPoisFull(Poi $poi) {
        $conexion = $this->conectarse();
        $query = " SELECT p.id, p.creator, p.nombre as nombrepoi, c.nombre as nombrecat, p.descripcion, p.altitud, 
                p.longitud, p.latitud FROM " . $this->schema . "." .
                "pois p " . "," . $this->schema . "." . "categorias_poi c" . " WHERE p.id=c.poi" .
                ($poi->getId() ? " AND p.id" . " = " . $poi->getId() : "" ) . "   ORDER BY p.id";

        $query2 = " SELECT p.id, m.enlace, m.tipo, m.descripcion FROM " . $this->schema . "." .
                "pois p" . "," . $this->schema . "." . "multimedia_poi m" . " WHERE p.id=m.poi" .
                ($poi->getId() ? " AND p.id" . " = " . $poi->getId() : "" ) . "  ORDER BY p.id";
        $result1 = pg_query($conexion, $query);
        $result2 = pg_query($conexion, $query2);
        $this->desconectarse($conexion);
        return array($result1, $result2);
    }

    // Para saber el valor del ID guardado
    function insertId($pg_result, $serial_column, $table) {
        $conexion = $this->conectarse();
        $oid = pg_last_oid($pg_result);
        $query = "SELECT $serial_column FROM $table WHERE oid = $oid";
        $result = pg_query($conexion, $query);
        $row = pg_fetch_row($result, 0);
        $this->desconectarse($conexion);
        return($row[0]);
    }

    public function consultarIdPoi(Poi $poi) {
        $conexion = $this->conectarse();
        $query = 'SELECT MAX(id) as id FROM "USB".pois'; //Es el ultimo agregado
        $result = pg_query($conexion, $query);
        $poi->setId(pg_fetch_object($result)->id);
        return $poi;
    }

    public function agregarCategoriasPoi(Poi $poi) {
        $conexion = $this->conectarse();
        $categorias = $poi->getCategorias();
        foreach ($categorias as $categoria) {
            $query = 'INSERT INTO "USB".categoria_pois ( ' . $categoria->columnsDB() . ', poi'
                    . ') VALUES (' . $categoria->valuesDB() . ',' . $poi->getId() . ')';
            $result = pg_query($conexion, $query);
        }
        $this->desconectarse($conexion);
    }

    public function agregarMultimediaPoi(Poi $poi) {
        $conexion = $this->conectarse();
        $multimedias = $poi->getMultimedia();
        foreach ($multimedias as $multimedia) {
            $multimedia->getPoi($poi);
            $query = 'INSERT INTO "USB".multimedia_poi ( ' . $multimedia->columnsDB()
                    . ') VALUES (' . $multimedia->valuesDB() . ')';
            $result = pg_query($conexion, $query);
        }
        $this->desconectarse($conexion);
    }

}

?>
