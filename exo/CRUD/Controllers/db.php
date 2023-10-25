<?php
$host = "localhost";
$username = "RatchetDrake";
$password = "Azerty";
$database = "crud";

try {
    // Connexion à la base de données en utilisant PDO
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    // Définition des attributs PDO pour gérer les erreurs et les exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>
