<?php
try {
    ////jelszo kiveve a biztonsag miatt
    $dbh = new PDO('mysql:host=localhost;dbname=adatbazis_gyak', 'adatbazis_gyak', '',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    
    $sql = "CREATE TABLE IF NOT EXISTS `uzenetek` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
      `email` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
      `targy` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
      `uzenet` text COLLATE utf8_hungarian_ci NOT NULL,
      `datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;";

    
    $dbh->exec($sql);
    
    echo "<h1 style='color: green;'>Sikeres táblalétrehozás!</h1>";
    echo "<p>Az <b>uzenetek</b> tábla elkészült az adatbázisban.</p>";
    echo "<h2 style='color: red;'>Fontos: Biztonsági okokból most azonnal töröld le ezt a fájlt (telepito.php) a szerverről!</h2>";

} catch (PDOException $e) {
    echo "<h1 style='color: red;'>Hiba történt:</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>