<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <form action="connexion.php" method="post">
            <label for="login_email">Email :</label>
            <input type="email" id="login_email" name="login_email" required><br><br>

            <label for="login_motdepasse">Mot de passe :</label>
            <input type="password" id="login_motdepasse" name="login_motdepasse" required><br><br>

            <input type="submit" value="Se connecter">
        </form>
        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
    </div>
</body>
</html>

<?php
session_start(); // Démarre la session

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse = "Azerty";
$nomBaseDeDonnees = "projet";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['login_email'];
    $motdepasse = $_POST['login_motdepasse'];

    // Requête SQL pour vérifier les informations de connexion
    $sql = "SELECT * FROM utilisateurs WHERE email = '$email'";
    $resultat = $connexion->query($sql);

    if ($resultat->num_rows == 1) {
        $row = $resultat->fetch_assoc();
        if (password_verify($motdepasse, $row['motdepasse'])) {
            // Connexion réussie, stockez le nom dans la session
            $_SESSION['nom'] = $row['nom'];
            // Rediriger vers la page principale après connexion réussie
            header("Location: index.php");
            exit();
        } else {
            echo "La connexion a échoué. Veuillez vérifier vos informations d'identification.";
        }
    } else {
        echo "La connexion a échoué. Veuillez vérifier vos informations d'identification.";
    }
}

$connexion->close();
?>

