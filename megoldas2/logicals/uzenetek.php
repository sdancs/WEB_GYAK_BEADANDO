<?php
if(!isset($_SESSION['login'])) {
    header("Location: .");
    exit;
}

$uzenetek = array();
try {
    // Kapcsolódás az adatbázishoz
    $dbh = new PDO('mysql:host=localhost;dbname=adatbazis_gyak', 'adatbazis_gyak', 'Jeleszavak1ketto3',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // Üzenetek lekérése fordított időrendben (legfrissebb elől)
    $sqlSelect = "SELECT nev, email, targy, uzenet, datum FROM uzenetek ORDER BY datum DESC";
    $sth = $dbh->prepare($sqlSelect);
    $sth->execute();
    $uzenetek = $sth->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $hibauzenet = "Hiba az üzenetek lekérésekor: " . $e->getMessage();
}
?>