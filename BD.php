/* Base de Datos */

<?php

$schema = "USB";

public conectarse()
    $dbconexion = pg_connect("host=auliya.ldc.usb.ve dbname=CI585226 user=08-11031 password=rausb")
    or die('No se estableció conexión con la BD: ' . pg_last_error());    
    return $dbconexion;
}

public desconectarse($dbconexion){
    $pg_close($dbconexion);
}

public agregarElem($elem){
    $conexion = conectarse();
    $query = " INSERT INTO ".$schema.".".$elem->table." VALUES ("$elem->columnsDB") = (".elem->valuesDB.")";
    $result = pg_query($conexion, $query)
    if (!$result)
    {
        echo "No se pudo agregar el elemento"
    }
    desconectarse($conexion);
}

public eliminarElem($elem){
    $conexion = conectarse();
    $query = " DELETE FROM ".$schema.".".$elem->table." WHERE id = ".$elem->id;
    $result = pg_query($conexion, $query);
    if (!$result)
    {
        echo "No se pudo eliminar el elemento"
    }
    
    desconectarse($conexion);
}

public consultarElem($elem){
    $conexion = conectarse();
    $query = " SELECT * FROM ".$schema.".".$elem->table." WHERE id = ".$elem->id;
    $result = pg_query($conexion, $query);
    desconectarse($conexion);
    return pg_fetch_object($result);

}

public modificarElem($elem, $value){

    $conexion = conectarse();
    $query = "UPDATE ".$schema.".".$elem->table." SET ".$elem->column." = ".$value." WHERE id  = ".$elem->id ;
    $result = pg_query($conexion, $query);
    if (!$result)
    {
        echo "No se pudo modificar el elemento"
    }
    desconectarse($conexion);
}


?>
