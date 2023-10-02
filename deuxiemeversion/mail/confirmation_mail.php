<?php
session_start();

// Paramètres de connexion à la base de données
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse_bd = "Azerty";
$nomBaseDeDonnees = "projet";

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse_bd);
    // Configure PDO to throw exceptions on error
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Vérifier si le token existe dans la base de données
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE token = ?");
    $stmt->execute([$token]);
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultat) {
        // Mettez à jour la base de données pour confirmer l'adresse e-mail
        $stmt = $connexion->prepare("UPDATE utilisateurs SET email_confirmed = 1 WHERE token = ?");
        $stmt->execute([$token]);
        echo "Votre adresse e-mail a été confirmée avec succès.";
    } else {
        echo "Token invalide.";
    }
} else {
    echo "Token non spécifié.";
}
?>
