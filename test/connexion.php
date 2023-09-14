<?php
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse = "Azerty";
$nomBaseDeDonnees = "cours";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

$email = $_POST['login_email'];
$motdepasse = $_POST['login_motdepasse'];

$sql = "SELECT motdepasse FROM test WHERE email = '$email'";
$resultat = $connexion->query($sql);

if ($resultat->num_rows == 1) {
    $row = $resultat->fetch_assoc();
    $motdepasse_hache = $row['motdepasse'];
    
    if (password_verify($motdepasse, $motdepasse_hache)) {
        echo "Connexion réussie !"; // Vous pouvez rediriger l'utilisateur vers une page d'accueil ici.
    } else {
        echo "La connexion a échoué. Veuillez vérifier vos informations d'identification.";
    }
} else {
    echo "La connexion a échoué. Veuillez vérifier vos informations d'identification.";
}


$connexion->close();
?>
