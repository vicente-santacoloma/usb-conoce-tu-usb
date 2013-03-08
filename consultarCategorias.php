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
        include ("Categoria.php");
        $bd = new BD();
        $categoriaArray = array();
        $resultSet = $bd->consultarElem(new Categoria());
        while ($data = pg_fetch_object($resultSet)) {
            $categoria = new Categoria();
            $categoria->setNombre($data->nombre);
            array_push($categoriaArray,$categoria);
        }
        foreach ($categoriaArray as $categoria) {
            echo "Nombre Cat".$categoria->getNombre()."<br>";
        }
        ?>
    </body>
</html>
