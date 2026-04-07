<?php
$ablakcim = array(
    'cim' => 'Mini honlap Kft.',
);

$fejlec = array(
    'kepforras' => 'logo.png',
    'kepalt' => 'logo',
	'cim' => 'Mini honlap',
	'motto' => 'Ha sárga a víz, a Sárgahegyi segít!'
);

$lablec = array(
    'copyright' => 'Copyright '.date("Y").'.',
    'ceg' => 'Mini honlap Kft.'
);

$oldalak = array(
	'/' => array('fajl' => 'cimlap', 'szoveg' => 'Főoldal', 'menun' => array(1,1)),
	'bemutatkozas' => array('fajl' => 'bemutatkozas', 'szoveg' => 'Bemutatkozás', 'menun' => array(1,1)),
	'kapcsolat' => array('fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat', 'menun' => array(1,1)),
    'uzenetek' => array('fajl' => 'uzenetek', 'szoveg' => 'Üzenetek', 'menun' => array(0, 1)),
    'crud' => array('fajl' => 'crud', 'szoveg' => 'CRUD', 'menun' => array(0,1)),
    'api' => array('fajl' => 'api', 'szoveg' => '', 'menun' => array(0,0)),

    'kepek' => array('fajl' => 'kepek', 'szoveg' => 'Képek', 'menun' => array(1,1)),
    'feltolt' => array('fajl' => 'feltolt', 'szoveg' => '', 'menun' => array(0,0)),

	'cikkek' => array('fajl' => 'cikkek', 'szoveg' => 'Cikkek', 'menun' => array(1,1)),
    'tablazat' => array('fajl' => 'tablazat', 'szoveg' => 'Táblázat', 'menun' => array(1,1)),
    'belepes' => array('fajl' => 'belepes', 'szoveg' => 'Belépés', 'menun' => array(1,0)),
    'kilepes' => array('fajl' => 'kilepes', 'szoveg' => 'Kilépés', 'menun' => array(0,1)),
    'belep' => array('fajl' => 'belep', 'szoveg' => '', 'menun' => array(0,0)),
    'regisztral' => array('fajl' => 'regisztral', 'szoveg' => '', 'menun' => array(0,0))
);

$hiba_oldal = array ('fajl' => '404', 'szoveg' => 'A keresett oldal nem található!');
?>