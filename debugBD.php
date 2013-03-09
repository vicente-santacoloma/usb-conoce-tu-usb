<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <h1> Página para Testear la BD </h1>
        <?php
        echo "Ya estoy en PHP <br>";
        include ("BD.php");
        $bd = new BD();
        echo "Probando la Conexion local <br> ";
        $conexion = $bd->conectarse_local();
        if ($conexion) {
            echo "Conexion Exitosa <br>";
        } else {
            echo "Conexion Fallida <br>";
        }
        $bd->desconectarse($conexion);
        echo "Probando la conexion remota <br>";
        $conexion = $bd->conectarse();
        if ($conexion) {
            echo "Conexion Exitosa <br>";
        } else {
            echo "Conexion Fallida <br>";
        }
        $bd->desconectarse($conexion)
        ?>
    </body>
</html>
