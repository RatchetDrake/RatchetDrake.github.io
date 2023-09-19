<?php
session_start();

// ... Connexion à la base de données (à remplir avec vos paramètres) ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Génération d'un jeton unique
    $jeton = bin2hex(random_bytes(32));  // Jeton de 64 caractères (128 en hexadécimal)

    // Enregistrez le jeton associé à l'email dans la base de données
    // Ici, vous devrez exécuter une requête SQL pour insérer le jeton dans la base de données
    // par exemple, "INSERT INTO jetons_reset (email, jeton) VALUES ('$email', '$jeton')"

    // ... Code pour l'enregistrement du jeton dans la base de données ...

    // Envoi de l'e-mail avec le lien de réinitialisation
    $lien_reset = "http://localhost/cours_php/RatchetDrake.github.io/deuxiemeversion/reset_motdepasse.php?email=$email&token=$jeton";
    $sujet = "Réinitialisation du Mot de Passe";
    $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : $lien_reset";

    // Utilisez la fonction mail() ou une bibliothèque de votre choix pour envoyer l'e-mail
    // Ici, je vais simplement afficher le lien de réinitialisation à des fins de démonstration
    echo "Lien de réinitialisation envoyé : <a href='$lien_reset'>$lien_reset</a>";
}
?>
