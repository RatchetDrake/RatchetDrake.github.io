<?php
// Assurez-vous d'avoir une connexion à la base de données ici
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse = "Azerty";
$nomBaseDeDonnees = "projet";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nouveau_motdepasse = $_POST['nouveau_motdepasse'];
    $confirmer_motdepasse = $_POST['confirmer_motdepasse'];

    if ($nouveau_motdepasse === $confirmer_motdepasse) {
        // Hasher le nouveau mot de passe
        $motdepasse_hache = password_hash($nouveau_motdepasse, PASSWORD_DEFAULT);

        // Mettre à jour le mot de passe dans la base de données
        $email = $_GET['email'];
        $sql = "UPDATE utilisateurs SET motdepasse='$motdepasse_hache' WHERE email='$email'";
        
        if ($connexion->query($sql) === TRUE) {
            echo "Votre mot de passe a été réinitialisé avec succès.";
        } else {
            echo "Erreur lors de la mise à jour du mot de passe : " . $connexion->error;
        }
    } else {
        echo "Les mots de passe ne correspondent pas.";
    }
}

// Fermer la connexion à la base de données
$connexion->close();
?>
