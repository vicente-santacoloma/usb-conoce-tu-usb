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
        include ("Categoria.php");
        include ("Multimedia.php");
        $bd = new BD();
        $poiArray1 = array();
        $poiArray2 = array();
        $arrayRs = $bd->consultarPoisFull(new Poi());

        $data1 = pg_fetch_object($arrayRs[0]);
        while ($data1) {
            $poi = new Poi();
            $poi->setId($data1->id);
            $poi->setCategorias(array());
            $poi->setAltitud($data1->altitud);
            $poi->setCreador($data1->creador);
            $poi->setDescripcion($data1->descripcion);
            $poi->setLatitud($data1->latitud);
            $poi->setLongitud($data1->longitud);
            $poi->setNombre($data1->nombrepoi);
            $categorias = array();
            while ($poi->getId() == $data1->id) {
                $c = new Categoria();
//                echo "Categoria <br>". $data1->nombrecat . "<br>Para el Poi" . $poi->getId().$data1->id."<br>";
                $c->setNombre($data1->nombrecat);
                array_push($categorias, $c);
                $data1 = pg_fetch_object($arrayRs[0]);
            }
            $poi->setCategorias($categorias);
            array_push($poiArray1, $poi);
        }

        $data2 = pg_fetch_object($arrayRs[1]);
        while ($data2) {
            $poi = new Poi();
            $poi->setId($data2->id);
            $poi->setMultimedia(array());
            $multimedias = array();
            while ($poi->getId() == $data2->id) {
                $m = new Multimedia();
                $m->setDescripcion($data2->descripcion);
                $m->setEnlace($data2->enlace);
                $m->setTipo($data2->tipo);
                array_push($multimedias, $m);
                $data2 = pg_fetch_object($arrayRs[1]);
            }
            $poi->setMultimedia($multimedias);
            array_push($poiArray2, $poi);
        }
        $poiArray3 = array();
        foreach ($poiArray1 as $poi1) {
            foreach ($poiArray2 as $poi2) {
                if ($poi1->getId() === $poi2->getId()) {
                    $poi1->setMultimedia($poi2->getMultimedia());
                    array_push($poiArray3, $poi1);
                }
            }
        }

        foreach ($poiArray3 as $poi) {
            echo "Id poi" . $poi->getId() . "<br>";
            echo "Creador poi" . $poi->getCreador() . "<br>";
            echo "Nombre Poi" . $poi->getNombre() . "<br>";
            echo "Altitud poi" . $poi->getAltitud() . "<br>";
            echo "Longitud poi" . $poi->getLongitud() . "<br>";
            echo "Latitud poi" . $poi->getLatitud() . "<br>";
            echo "Descripcion poi" . $poi->getDescripcion() . "<br>";

            $categorias = $poi->getCategorias();
            $multimedias = $poi->getMultimedia();

            foreach ($categorias as $categoria) {
                echo "Nombre Categoria" . $categoria->getNombre() . "<br>";
            }
            foreach ($multimedias as $multimedia) {
                echo "Enlace" . $multimedia->getEnlace() . "<br>";
                echo "Tipo" . $multimedia->getTipo() . "<br>";
                echo "Descripcion" . $multimedia->getDescripcion() . "<br><br>";
            }
        }
        ?>

    </body>
</html>
