<?php
	
	include ("BD.php");
	include ("Poi.php");
	$poi_nombre =  $_POST['nombre'];
	$poi_desc = $_POST['descripcion'];
	$poi_long = $_POST['longitud'];
	$poi_lat = $_POST['latitud'];
	$poi_alt = $_POST['altitud'];
	$poi_creador = $_POST['creador'];
	$poi_categorias = $_POST['categorias'];
	$poi_multimedia = $_POST['multimedia']


	$poi = new Poi();
	$poi->setNombre($poi_nombre);
	$poi->setDescripcion($poi_desc);
	$poi->setLongitud($poi_long);
	$poi->setAltitud($poi_alt);
	$poi->setLatitud($poi_lat);
	$poi->setCreador($poi_creador);
	$bd = new BD();
	$bd->conectarse;

	$result = $bd->agregarElem($poi); //Adding the POI
	$id_poi_result = $bd->insertId($result,"id",$poi->getTable());
	//Now we should add its categories
	foreach ($poi_categorias as $cat) {
		$categoria = new Categoria();
		$categoria->setNombre($cat);
		$bd->agregarCategoriaAPoi($categoria->getNombre(),$id_poi_result);
	}

	//Agregamos multimedia
	$multimedia = new Multimedia();

// Se deben setear los demas atributos

	$multimedia->setPoi($id_poi_result);
	$bd->agregarElem($multimedia)


?>