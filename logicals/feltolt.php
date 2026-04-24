<?php


// Csak bejelentkezett felhasználó tölthet fel
if(!isset($_SESSION['login'])) {
    header("Location: belepes");
    exit;
}

// Ha nincs fájl, akk vissza a képek oldalra
if(!isset($_FILES['kep'])) {
    header("Location: kepek");
    exit;
}

// Feltöltés feldolgozása
$file = $_FILES['kep'];

// Ellenőrizzük, volt-e hiba a feltöltés során
if($file['error'] !== 0) {
    die("Feltöltési hiba kód: " . $file['error']);
}

// Célmappa abszolút útvonallal
$celMappa = realpath(__DIR__ . '/../images/upload/');

// Ha nem található a mappa
if(!$celMappa) {
    die("A célmappa nem található!");
}

// Kötelező a perjel a végére
$celMappa .= '/';

// Ellenőrizzük, írható-e a mappa
if(!is_writable($celMappa)) {
    die("A mappa nem írható: " . $celMappa);
}

// Fájlnév:
$fajlNev = $file['name'];

// Teljes célútvonal
$cel = $celMappa . $fajlNev;

// Csak képfájlok engedélyezése
$tipus = strtolower(pathinfo($cel, PATHINFO_EXTENSION));
$engedett = array('jpg','jpeg','png','gif');

if(!in_array($tipus, $engedett)) {
    die("Csak képfájl tölthető fel!");
}

// Fájl áthelyezése
if(move_uploaded_file($file['tmp_name'], $cel)) {
    header("Location: kepek");
    exit;
} else {
    die("Nem sikerült a fájl mentése ide: " . $cel);
}
?>