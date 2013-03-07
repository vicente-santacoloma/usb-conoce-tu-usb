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
        <select>
            <?php
            $categorias = BD::consultarElem(new Categoria());
            foreach ($categorias as $value) {
                ?>
                <option value=<?= $value ?>><?= $value ?></option> 
            <?php }
            ?>
        </select>
    </body>
</html>
