<?php
	
	include ("BD.php");
	include ("Poi.php");
	$poi_nombre =  $_POST['nombre'];
	$poi_desc = $_POST['descripcion'];
	$poi_long = $_POST['longitud'];
	$poi_lat = $_POST['latitud'];
	$poi_alt = $_POST['altitud'];
	$poi_creador = $_POST['creador'];
	$poi_categorias = $_POST['categoria'];
	$poi_multimedia = $_POST['multimedia'];

echo "Llegue !!!";
include ("BD.php");
include ("Poi.php");
$poi_nombre = $_POST['nombre'];
$poi_desc = $_POST['descripcion'];
$poi_long = $_POST['longitud'];
$poi_lat = $_POST['latitud'];
$poi_alt = $_POST['altitud'];
$poi_creador = $_POST['creador'];
$poi_categorias = $_POST['categoria'];
$poi_multimedia = $_POST['multimedia'];
echo $poi_nombre . $poi_desc . $poi_long . $poi_lat . $poi_alt . $poi_creador . "<br><br>";

	$poi = new Poi();
	$poi->setNombre($poi_nombre);
	$poi->setDescripcion($poi_desc);
	$poi->setLongitud($poi_long);
	$poi->setAltitud($poi_alt);
	$poi->setLatitud($poi_lat);
	$poi->setCreador($poi_creador);
	$bd = new BD();
        
	$result = $bd->agregarElem($poi); //Adding the POI
        $poi = $bd->consultarIdPoi($poi); //Adding the id of the poi
        $bd->agregarCategoriasPoi($poi);
        $bd->agregarMultimediaPoi($poi);
        
	/*
	$id_poi_result = $bd->insertId($result,"id",$poi->getTable());
	//Now we should add its categories
	foreach ($poi_categorias as $cat) {
		$categoria = new Categoria();
		$categoria->setNombre($cat);
		$bd->agregarCategoriaAPoi($categoria->getNombre(),$id_poi_result);
	}

        $bd = new BD();
        $bd->conectarse;

        // Se deben setear los demas atributos

	$multimedia->setPoi($id_poi_result);
	$bd->agregarElem($multimedia)
	*/

?>
