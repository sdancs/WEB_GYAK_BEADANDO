<?php
// Változók inicializálása a sablon (tpl) számára
$eredmeny_uzenet = "";
$eredmeny_hiba = false;

// Ha történt űrlapküldés (POST kérés)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // 1. Adatok beolvasása és tisztítása
    $email = trim($_POST['email']);
    $targy = trim($_POST['targy']);
    $uzenet = trim($_POST['uzenet']);
    
    // Név meghatározása a feladatkiírás alapján
    // "Ha nem bejelentkezett felhasználó írta, akkor: Vendég"
    if (isset($_SESSION['login'])) {
        $nev = $_SESSION['csn'] . " " . $_SESSION['un'] . " (" . $_SESSION['login'] . ")";
    } else {
        $nev = "Vendég";
    }

    // 2. Szerveroldali ellenőrzés (PHP validáció)
    if (empty($email) || empty($targy) || empty($uzenet)) {
        $eredmeny_hiba = true;
        $eredmeny_uzenet = "Kérem, töltsön ki minden kötelező mezőt!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $eredmeny_hiba = true;
        $eredmeny_uzenet = "Kérem, adjon meg egy érvényes e-mail címet!";
    } else {
        
        // 3. Adatbázisba mentés
        try {
            // Kapcsolódás (a korábbi fájljaidban használt adatokkal)
            $dbh = new PDO('mysql:host=localhost;dbname=adatbazis_gyak', 'adatbazis_gyak', 'Jeleszavak1ketto3',
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            // INSERT lekérdezés előkészítése
            $sqlInsert = "INSERT INTO uzenetek (nev, email, targy, uzenet) VALUES (:nev, :email, :targy, :uzenet)";
            $stmt = $dbh->prepare($sqlInsert); 
            
            // Lekérdezés végrehajtása
            $stmt->execute(array(
                ':nev' => $nev, 
                ':email' => $email,
                ':targy' => $targy, 
                ':uzenet' => $uzenet
            )); 
            
            // Ellenőrizzük, hogy sikeres volt-e a beszúrás
            if ($stmt->rowCount() > 0) {
                $eredmeny_hiba = false;
                $eredmeny_uzenet = "Üzenetét sikeresen elküldtük és elmentettük!";
            } else {
                $eredmeny_hiba = true;
                $eredmeny_uzenet = "Hiba történt az üzenet mentése során.";
            }
            
        } catch (PDOException $e) {
            $eredmeny_hiba = true;
            $eredmeny_uzenet = "Adatbázis hiba: " . $e->getMessage();
        }
    }
}
?>