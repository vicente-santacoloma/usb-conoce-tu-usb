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
        include ("Multimedia.php");
        include ("Poi.php");
        include ("Categoria.php");
        $bd = new BD();
        $multimediaArray = array();
        $resultSet = $bd->consultarElem(new Multimedia());
        while ($data = pg_fetch_object($resultSet)) {
            $multimedia = new Multimedia();
            $multimedia->setDescripcion($data->descripcion);
            $multimedia->setEnlace($data->enlace);
            $multimedia->setPoi($data->poi);
            $multimedia->setTipo($data->tipo);
            $multimedia->setId($data->id);
            array_push($multimediaArray, $multimedia);
        }
        foreach ($multimediaArray as $multimedia) {
            echo "Id poi" . $multimedia->getPoi() . "<br>";
            echo "Id mult" . $multimedia->getId() . "<br>";
            echo "Enlace" . $multimedia->getEnlace() . "<br>";
            echo "Tipo" . $multimedia->getTipo() . "<br>";
            echo "Descripcion" . $multimedia->getDescripcion() . "<br><br>";
        }
        ?>

    </body>
</html>
