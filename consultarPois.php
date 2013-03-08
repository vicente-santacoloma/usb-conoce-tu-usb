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
        ?>
        <Form Name ="formEliminar" Method ="POST" ACTION = "eliminarPOI.php">
        <?php 
        foreach ($poiArray as $poi) {
       
            echo "Id poi". $poi->getId() . "<br>";
            echo "Creador poi". $poi->getCreador() . "<br>";
            echo "Nombre Poi". $poi->getNombre() . "<br>";
            echo "Altitus poi". $poi->getAltitud() . "<br>";
            echo "Longitud poi".$poi->getLongitud() . "<br>";
            echo "Latitus poi".$poi->getLatitud() . "<br>";
            echo "Descripcion poi". $poi->getDescripcion() . "<br>";
            ?>
            <input type="hidden" name="eliminarPOI" value= <?= $poi->getId() ?>></input>
    
          <button type="submit" onclick="confirm('Seguro deseas eliminar este POI?');">Eliminar</button>
        <?php } ?>
        </Form>
        
    </body>
</html>
