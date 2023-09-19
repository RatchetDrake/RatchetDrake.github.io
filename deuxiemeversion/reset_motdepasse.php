<?php
session_start();

// Connexion à la base de données (à remplir avec vos paramètres)
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse = "Azerty";
$nomBaseDeDonnees = "projet";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupération de l'email et du jeton depuis l'URL
$email = $_GET['email'];
$jeton = $_GET['token'];

// Vérification si le jeton est valide
$stmt = $connexion->prepare("SELECT * FROM jetons_reset WHERE email = ? AND jeton = ?");
$stmt->bind_param("ss", $email, $jeton);
$stmt->execute();
$resultat = $stmt->get_result();

if ($resultat->num_rows === 1) {
    // Le jeton est valide, afficher le formulaire de réinitialisation du mot de passe
    echo "<h2>Réinitialisation du mot de passe</h2>";
    echo "<form method='post' action='traitement_reset_motdepasse.php'>";
    echo "<input type='hidden' name='email' value='$email'>";
    echo "<label for='nouveau_motdepasse'>Nouveau mot de passe :</label>";
    echo "<input type='password' id='nouveau_motdepasse' name='nouveau_motdepasse' required><br><br>";
    echo "<label for='confirmer_motdepasse'>Confirmez le mot de passe :</label>";
    echo "<input type='password' id='confirmer_motdepasse' name='confirmer_motdepasse' required><br><br>";
    echo "<input type='submit' value='Réinitialiser'>";
    echo "</form>";
} else {
    // Le jeton est invalide
    echo "Le lien de réinitialisation est invalide.";
}

$stmt->close();
$connexion->close();
?>
