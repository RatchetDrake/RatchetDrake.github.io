<?php
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse = "Azerty";
$nomBaseDeDonnees = "cours";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$motdepasse = $_POST['motdepasse']; // Ajout du champ de mot de passe

// Vous devriez hacher le mot de passe avant de le stocker dans la base de données.
$motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

$sql = "INSERT INTO test (nom, prenom, email, motdepasse) VALUES ('$nom', '$prenom', '$email', '$motdepasse_hache')";

if ($connexion->query($sql) === TRUE) {
    echo "Inscription réussie !";
} else {
    echo "Erreur lors de l'inscription : " . $connexion->error;
}

$connexion->close();
?>
