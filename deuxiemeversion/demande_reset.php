<!DOCTYPE html>
<html>
<head>
    <title>Demande de Réinitialisation du Mot de Passe</title>
</head>
<body>
    <h2>Demande de Réinitialisation du Mot de Passe</h2>
    
    <?php
    // Connexion à la base de données (à remplir avec vos paramètres)
    $serveur = "localhost";
    $utilisateur = "RatchetDrake";
    $motdepasse = "Azerty";
    $nomBaseDeDonnees = "projet";

    $connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);

    if ($connexion->connect_error) {
        die("La connexion à la base de données a échoué : " . $connexion->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];

        // Génération d'un jeton unique
        $jeton = bin2hex(random_bytes(32));  // Jeton de 64 caractères (128 en hexadécimal)

        // Enregistrez le jeton associé à l'email dans la base de données
        $stmt = $connexion->prepare("INSERT INTO jetons_reset (email, jeton) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $jeton);
        $stmt->execute();

        // Envoi de l'e-mail avec le lien de réinitialisation
        $lien_reset = "http://localhost/cours_php/RatchetDrake.github.io/deuxiemeversion/reset_motdepasse.php?email=$email&token=$jeton";
        $sujet = "Réinitialisation du Mot de Passe";
        $message = "Cliquez sur le lien suivant pour réinitialiser votre mot de passe : $lien_reset";

        // Utilisez la fonction mail() ou une bibliothèque de votre choix pour envoyer l'e-mail
        // Ici, je vais simplement afficher le lien de réinitialisation à des fins de démonstration
        echo "Lien de réinitialisation envoyé : <a href='$lien_reset'>$lien_reset</a>";

        $stmt->close();
    }

    $connexion->close();
    ?>

    <form action="traitement_reset.php" method="post">
        <label for="email">Adresse E-mail :</label>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>

