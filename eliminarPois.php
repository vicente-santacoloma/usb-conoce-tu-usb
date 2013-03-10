<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include ("BD.php");
        include ("Poi.php");
        $user = (is_null($_GET['uid']) ? 'admin' : $_GET['uid']);
        $bd = new BD();
        $poiArray = array();
        $resultSet = $bd->consultarElem(new Poi());
        while ($data = pg_fetch_object($resultSet)) {
            $poi = new Poi();
            $poi->setAltitud($data->altitud);
            $poi->setCreador($data->creador);
            $poi->setDescripcion($data->descripcion);
            $poi->setLatitud($data->latitud);
            $poi->setLongitud($data->longitud);
            $poi->setId($data->id);
            $poi->setNombre($data->nombre);
            array_push($poiArray, $poi);
        }
        ?>
        <form  action="/ConoceTuUSB/eliminarpoilist.php" name="poi" method="POST">
            <select name="id">
                <option value="0" > Seleccione un Poi </option>
                <?php
                foreach ($poiArray as $poi) {
                    ?> <option value=<?php echo $poi->getId();  ?> > <?php  echo $poi->getNombre(); ?> </option> <?php
                }
                ?>
            </select>
            <input type="submit" value="eliminar" />
        </form>
    </body>
</html>
