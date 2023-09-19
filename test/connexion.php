<?php
session_start();

// Vérifie le temps d'inactivité et déconnecte l'utilisateur si nécessaire
function verifier_inactivite() {
    $temps_inactivite = 300;  // Temps d'inactivité en secondes (300 secondes = 5 minutes)

    if (isset($_SESSION['temps_derniere_activite']) && time() - $_SESSION['temps_derniere_activite'] > $temps_inactivite) {
        // La session a dépassé le temps d'inactivité, déconnexion de l'utilisateur
        session_unset();
        session_destroy();
        header("Location: connexion.php"); // Rediriger vers la page de connexion par exemple
        exit();
    }

    // Met à jour le temps de dernière activité
    $_SESSION['temps_derniere_activite'] = time();
}

// Vérifie l'inactivité à chaque chargement de page
verifier_inactivite();
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
        } else { $erreur ="<div id='error-message' >La connexion a échoué. Veuillez vérifier vos informations d'identification. </div> ";
           
        }
    } else {
        $erreur ="<div id='error-message' >La connexion a échoué. Veuillez vérifier vos informations d'identification. </div> ";
    }
}

$connexion->close();
?>




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
            <div class="password-input">
                <input type="password" id="login_motdepasse" name="login_motdepasse" required>
                <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
            </div>
            <?php
        // Affichage du message d'erreur s'il y en a un
       
        ?> <br><div class="div-erreur">
<?php 
$padding = str_repeat(' ', (int)((80 - strlen($message)) / 2));
echo $padding . $erreur .$padding  ?> </div><br>
            <input type="submit" value="Se connecter">

        </form>
        <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>

        
    </div>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>




