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
        foreach ($poiArray as $poi) {
            echo $poi->getId() . "<br>";
            echo $poi->getCreador() . "<br>";
            echo $poi->getAltitud() . "<br>";
            echo $poi->getLongitud() . "<br>";
            echo $poi->getLatitud() . "<br>";
            echo $poi->getDescripcion() . "<br>";
            echo $poi->getNombre() . "<br>";
        }
        ?>
        
    </body>
</html>
