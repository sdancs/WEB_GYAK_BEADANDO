<?php

// JSON válasz
header('Content-Type: application/json; charset=utf-8');

// Adatbázis kapcsolat
$dbh = new PDO(
    'mysql:host=localhost;dbname=adatbazis_gyak',
    'adatbazis_gyak',
    'Jeleszavak1ketto3',
    array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION)
);

// JSON input beolvasása
$input = json_decode(file_get_contents('php://input'), true);

$method = $_SERVER['REQUEST_METHOD'];

try {

    // READ
    if ($method === 'GET') {
        $stmt = $dbh->query("SELECT * FROM szerelo");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }

    // CREATE
    elseif ($method === 'POST') {
        $stmt = $dbh->prepare("INSERT INTO szerelo (az, nev, kezdev) VALUES (?, ?, ?)");
        $stmt->execute([$input['az'], $input['nev'], $input['kezdev']]);

        echo json_encode([
            'status' => 'sikeres',
            'uzenet' => 'Sikeres mentés'
        ]);
    }

    // UPDATE
    elseif ($method === 'PUT') {
        $stmt = $dbh->prepare("UPDATE szerelo SET nev=?, kezdev=? WHERE az=?");
        $stmt->execute([$input['nev'], $input['kezdev'], $input['az']]);

        echo json_encode([
            'status' => 'sikeres',
            'uzenet' => 'Sikeres frissítés'
        ]);
    }

    // DELETE
    elseif ($method === 'DELETE') {
        $stmt = $dbh->prepare("DELETE FROM szerelo WHERE az=?");
        $stmt->execute([$input['az']]);

        echo json_encode([
            'status' => 'sikeres',
            'uzenet' => 'Sikeres törlés'
        ]);
    }

    else {
        http_response_code(405);
        echo json_encode([
            'status' => 'hiba',
            'uzenet' => 'Nem engedélyezett metódus'
        ]);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'hiba',
        'uzenet' => $e->getMessage()
    ]);
}