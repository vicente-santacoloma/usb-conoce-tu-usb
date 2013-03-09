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
        <form id="addForm"  action="/ConoceTuUSB/agregarPOI.php" method="POST">
            Nombre: <input id="nombre" type="text" name="nombre" ><br>
            Descripcion: <input id="descripcion" type="text" name="descripcion">
            Multimedia: </br>
            <input class="text" type="radio" name="multimedia" value="texto">Texto
            <input class="link" type="radio" name="multimedia" value="imagen">Imagen
            <input class="link" type="radio" name="multimedia" value="sonido">Sonido
            <input class="link" type="radio" name="multimedia" value="video">Video<br>
            <div id="multimediaContent">
                <p id ="content">Texto:</p><input id="inputContent" type="text" name="contenido">
            </div>
            Categorias: </br>
            <input type="checkbox" name="categoria" value="Entretenimiento" >Entretenimiento<br>
            <input type="checkbox" name="categoria" value="Comida" >Comida<br>
            <input type="checkbox" name="categoria" value="Deportes" >Deportes<br>
            <input type="checkbox" name="categoria" value="Bibliotecas" >Bibliotecas<br>
            <input type="checkbox" name="categoria" value="Dulcerias" >Dulcerias<br>

            <input id="longitud" type="hidden" name="longitud" value="50.2669">
            <input id="latitud" type="hidden" name="latitud" value="50.2669">
            <input id="altitud" type="hidden" name="altitud" value="50.2669">
            <input id="creador" type="hidden" name="creador" value="admin">
            <input id="create" type="submit" value="Create">
        </form>
    </body>
</html>
