<?php
	
	include ("BD.php");
	include ("Poi.php");
	$poi_id = $_POST['eliminarPOI'];
	$poi = new Poi();
	$poi->setId($poi_id);
	$bd = new BD();
	$bd->conectarse;
	$result = $bd->eliminarElem($poi);
	if ($result)
		echo "Se elimino correctamente";


?>