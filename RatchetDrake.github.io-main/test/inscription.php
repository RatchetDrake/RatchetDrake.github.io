<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté, le rediriger s'il l'est
if (isset($_SESSION['nom'])) {
    header("Location: index.php");
    exit();
}

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse = "Azerty";
$nomBaseDeDonnees = "projet";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Initialiser la variable pour stocker les messages d'erreur
$erreur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['login_motdepasse'];
    $confirm_motdepasse = $_POST['confirm_motdepasse'];

    // ... Validation des champs (omis pour la concision) ...

    // Vérification que les mots de passe correspondent
    if ($motdepasse !== $confirm_motdepasse) {
        $erreur = "Les mots de passe ne correspondent pas.";
    }

    // Si aucune erreur, procéder à l'inscription
    if (empty($erreur)) {
        // Hash du mot de passe
        $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Requête SQL préparée pour insérer les données dans la table 'utilisateurs'
        $stmt = $connexion->prepare("INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom, $prenom, $email, $motdepasse_hache);

        if ($stmt->execute()) {
            // Rediriger vers la page principale après inscription réussie
            $_SESSION['nom'] = $nom;  // Assurez-vous que $nom contient la valeur correcte.
            header("Location: index.php");
            exit();
        } else {
            $erreur = "Erreur lors de l'inscription : " . $stmt->error;
        }
    }
}

$connexion->close();
?>



<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>
       
        <form action="inscription.php" method="post" onsubmit="return validateForm()">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="login_motdepasse">Mot de passe :</label>
            <div class="password-input">
                <input type="password" id="login_motdepasse" name="login_motdepasse" required>
                <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
            </div>
            <br><br>

            <label for="confirm_motdepasse">Confirmez le mot de passe :</label>
            <div class="password-input">
                <input type="password" id="confirm_motdepasse" name="confirm_motdepasse" required>
                <span class="password-toggle" onclick="togglePassword('confirm_motdepasse')">👁️</span>
            </div>
            <div class="div-erreur">
             <?php
            
        if (!empty($erreur)) {
            echo "<div style='color: red;'>Erreur: $erreur</div>";
        }
        ?>
</div>
<br><br> <input type="submit" value="S'inscrire">
        </form>
        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a>.</p>
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

        function validateForm() {
            // Votre code de validation ici
        }
    </script>
</body>
</html>
