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
        echo "Llego este id" . $_POST['id'];
        $poi_id_borrar = $_POST['id'];
        $poi = new Poi();
        $poi ->setId($poi_id_borrar);
        $bd = new BD();
        echo "Eliminando el POI ";
        $bd->eliminarElem($poi);
        ?>
    </body>
</html>
