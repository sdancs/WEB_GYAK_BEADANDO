<?php
// Adatbázis csatlakozás (Cseréld a Nethelyes adatokra, ha eltérnek!)
try {
    $dbh = new PDO('mysql:host=localhost;dbname=adatbazis_gyak', 'adatbazis_gyak', 'Jeleszavak1ketto3',
                    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

    // Ha érkezett törlési kérés az URL-ben (GET paraméter)
    if (isset($_GET['torol_id']) && is_numeric($_GET['torol_id'])) {
        $sqlDelete = "DELETE FROM uzenetek WHERE id = :id";
        $sth = $dbh->prepare($sqlDelete);
        $sth->execute(array(':id' => $_GET['torol_id']));
        
        // Frissítés után átirányítjuk önmagára, hogy az URL-ből eltűnjön a torol_id paraméter
        header("Location: torol.php");
        exit;
    }

    // Üzenetek lekérése listázáshoz
    $sqlSelect = "SELECT id, nev, email, targy, uzenet, datum FROM uzenetek ORDER BY datum DESC";
    $sth = $dbh->prepare($sqlSelect);
    $sth->execute();
    $uzenetek = $sth->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Adatbázis hiba: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Üzenetek Kezelése (Titkos Oldal)</title>
    <style>
        body { font-family: sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .btn-torles { background-color: #dc3545; color: white; text-decoration: none; padding: 5px 10px; border-radius: 3px; font-size: 14px; }
        .btn-torles:hover { background-color: #c82333; }
    </style>
</head>
<body>

    <h2>Beküldött üzenetek kezelése</h2>
    <p>Ez egy rejtett oldal. Csak az fér hozzá, aki ismeri a pontos URL-t.</p>

    <?php if (count($uzenetek) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Név</th>
                    <th>E-mail</th>
                    <th>Tárgy</th>
                    <th>Üzenet</th>
                    <th>Dátum</th>
                    <th>Művelet</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uzenetek as $u): ?>
                    <tr>
                        <td><?= $u['id'] ?></td>
                        <td><?= htmlspecialchars($u['nev']) ?></td>
                        <td><?= htmlspecialchars($u['email']) ?></td>
                        <td><?= htmlspecialchars($u['targy']) ?></td>
                        <td><?= nl2br(htmlspecialchars($u['uzenet'])) ?></td>
                        <td><?= $u['datum'] ?></td>
                        <td>
                            <a href="?torol_id=<?= $u['id'] ?>" class="btn-torles" onclick="return confirm('Biztosan törölni szeretnéd a(z) <?= $u['id'] ?>. azonosítójú üzenetet?');">Törlés</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Jelenleg nincs egyetlen üzenet sem az adatbázisban.</p>
    <?php endif; ?>

</body>
</html>