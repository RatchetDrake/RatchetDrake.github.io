<?php
session_start();

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
    $identifier = $_POST['login_identifier'];
    $motdepasse = $_POST['login_motdepasse'];

    // Requête SQL pour vérifier les informations de connexion (using email or pseudo)
    $sql = "SELECT * FROM utilisateurs WHERE email = ? OR pseudo = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ss", $identifier, $identifier);
    $stmt->execute();
    $resultat = $stmt->get_result();

    if ($resultat->num_rows == 1) {
        $row = $resultat->fetch_assoc();
        if (password_verify($motdepasse, $row['motdepasse'])) {
            // Connexion réussie, stockez le pseudo dans la session
            $_SESSION['pseudo'] = $row['pseudo'];
            // Rediriger vers la page principale après connexion réussie
            header("Location: index.php");
            exit();
        } else {
            $erreur = "La connexion a échoué. Veuillez vérifier vos informations d'identification.";
        }
    } else {
        $erreur = "La connexion a échoué. Veuillez vérifier vos informations d'identification.";
    }

    $stmt->close();
}

// Fermer la connexion à la base de données
$connexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>

        <!-- Affichage du message d'erreur d'inactivité s'il existe -->
        <?php
        if (isset($_SESSION['erreur_inactivite'])) {
            echo '<div class="error-message">' . $_SESSION['erreur_inactivite'] . '</div>';
            unset($_SESSION['erreur_inactivite']);  // Effacer le message après l'affichage
        }
        ?>

        <!-- Affichage du message d'erreur de connexion -->
        <?php
        if (!empty($erreur)) {
            echo '<div class="div-erreur">' . $erreur . '</div>';
        }
        ?>

<form action="connexion.php" method="post">
    <label for="login_identifier">Email ou Pseudo:</label>
    <input type="text" id="login_identifier" name="login_identifier" required><br><br>

    <label for="login_motdepasse">Mot de passe :</label>
    <div class="password-input">
        <input type="password" id="login_motdepasse" name="login_motdepasse" required>
        <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
    </div>

    <br>

    <input type="submit" value="Se connecter">
</form>


        <!-- Lien pour la réinitialisation du mot de passe -->
        <p><a href="reset_password_form.php">Mot de passe oublié ? Réinitialisez-le ici</a></p>

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

        window.addEventListener('beforeunload', function (event) {
            // Envoyer une requête à deconnexion.php pour indiquer la fermeture de la page
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'deconnexion.php', false);
            xhr.send();
        });
    </script>
</body>
</html>
