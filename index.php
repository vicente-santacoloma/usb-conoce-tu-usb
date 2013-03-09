<?php
/**
 * @copyright  Copyright 2012 metaio GmbH. All rights reserved.
 * @link       http://www.metaio.com
 * @author     Frank Angermann
 **/

require_once '../ARELLibrary/arel_xmlhelper.class.php';

if(!empty($_GET['l']))
	$position = explode(",", $_GET['l']);
else
	trigger_error("user position (l) missing. For testing, please provide a 'l' GET parameter with your request. e.g. pois/search/?l=23.34534,11.56734,0");

//create the xml start
ArelXMLHelper::start(NULL, "/arel/index.phtml");

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
		//echo "Categoria <br>". $data1->nombrecat . "<br>Para el Poi" . $poi->getId().$data1->id."<br>";
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

	// En poiaray3 tenemos todos los poi con categorias y multimedia.


//start by defining some positions of geo referenced POIs and give those names and thumbnails
/* $treasureLocations = array(
	array("37.772547,-122.418437,0", "San Francisco", "NorthAmerica"),
	array("48.138141,11.581535,0", "Munich", "Europe"),
	array("48.857261,2.3493,0", "Paris", "Europe"),
	array("40.73269,-73.995094,0", "New York", "NorthAmerica"),
	array("-33.92399,18.463669,0", "Cape Town", "Africa"),
	array("30.062557,31.246433,0", "Cairo", "Africa"),
	array("-37.813107,144.96304,0", "Melbourne", "Australia"),
	array("3.139145,101.689396,0", "Kuala Lumpur", "Asia"),
	array("35.685187,139.692306,0", "Tokio", "Asia"),
	array("19.019279,72.849541,0", "Mumbai", "Asia"),
	array("-12.042007,-77.040482,0", "Lima", "SouthAmerica"),
	array("51.493355,-0.127945,0", "London", "Europe")
);
*/


//in the filter_value, the continent parameter will be send from the client, once the continent is filtered
//$filter = $_GET['filter_value'];

//display the POIs as defined in the Constructor
foreach($poiArray3 as $prepoi)
{	
	//title of the POI
	$id = $prepoi->getId();
	$title = $prepoi->getNombre();
	$description = $prepoi->getDescripcion();
	$longitude = $prepoi->getLongitud(); 
	$latitude = $prepoi->getLatitud();
	$altitude = $prepoi->getAltitud();

	$junaioButtons = new array();
	$multimediaPoiArray = $prepoi=>getMultimedia();
	foreach($multimediaPoiArray as $multimedia) {

		if($multimedia->getTipo() == "Texto") {
			array_push($junaioButtons, array($multimedia->getTipo(), "Ver", $multimedia->getDescripcion()));
		} else {
			array_push($junaioButtons, array($multimedia->getTipo(), "Ver", $multimedia->getEnlace()));
		}	
	}
	
	//create the POI
	$poi = ArelXMLHelper::createLocationBasedPOI($id, $title, array($longitude, $latitude, $altitude), 
		"/resources/thumb.png", "/resources/icon.png", $description, NULL);
	
	//20000km -> 20'000'000m -> see them all over the world
	$poi->setMaxDistance(20000000);	
	
	/*
	//output the POI
	if(!empty($filter))
	{
		if(strtolower($filter) == strtolower($findPOI[2]))
		{
			ArelXMLHelper::outputObject($poi);
		}		
	}
	else
		ArelXMLHelper::outputObject($poi);
	*/

	ArelXMLHelper::outputObject($poi);
}				

//end the output
ArelXMLHelper::end();

?>
