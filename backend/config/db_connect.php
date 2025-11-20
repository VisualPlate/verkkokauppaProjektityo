<?php
// Haetaan config.php:n sisältö ja asetustiedosto
require_once __DIR__ . '/config.php';
 
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
 
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Heittää poikkeuksen virhetilanteessa
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Palauttaa tulokset assosiatiivisena taulukkona
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Käyttää tietokannan omia valmisteltuja lausekkeita
];
 
try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
 
    // DEBUG: virheilmoituksen, joka näkyy jos kehtystila on päällä .env tiedostossa
    if (defined('APP_DEBUG') && APP_DEBUG && php_sapi_name() !== 'cli') {
        echo "Tietokantayhteys (PDO) muodostettu onnistuneesti!<br>";
    }
} catch (PDOException $e) {

    // Jos yhteys epäonnistuu, lopetetaan skripti ja näytetään virheilmoitus.
    die("Tietokantayhteys epäonnistui: " . $e->getMessage());
}
?>