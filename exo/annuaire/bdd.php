<?php

$host = 'localhost'; // Votre host, généralement "localhost"
$dbname = 'annuaire'; // Nom de votre base de données
$user = 'RatchetDrake'; // Votre identifiant
$pass = 'Azerty'; // Votre mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

?>
