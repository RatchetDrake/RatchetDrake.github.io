<?php
session_start();

// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse_bd = "Azerty";
$nomBaseDeDonnees = "projet";

$connexion = new mysqli($serveur, $utilisateur, $motdepasse_bd, $nomBaseDeDonnees);

if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Initialiser la variable pour stocker les messages d'erreur
$erreur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $motdepasse = $_POST['login_motdepasse'];
    $confirm_motdepasse = $_POST['confirm_motdepasse'];

    // Vérifier que les mots de passe correspondent
    if ($motdepasse !== $confirm_motdepasse) {
        $erreur = "Les mots de passe ne correspondent pas.";
    }

    // Vérifier l'unicité du pseudo
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
    $stmt->bind_param("s", $pseudo);
    $stmt->execute();
    $resultat = $stmt->get_result();

    if ($resultat->num_rows > 0) {
        $erreur = "Le pseudo est déjà utilisé. Veuillez en choisir un autre.";
    }

    $stmt->close();

    // Vérifier l'unicité de l'adresse e-mail
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultat = $stmt->get_result();

    if ($resultat->num_rows > 0) {
        $erreur = "L'adresse e-mail est déjà utilisée. Veuillez en choisir une autre.";
    }

    $stmt->close();

    // Si aucune erreur, procéder à l'inscription
    if (empty($erreur)) {
        // Hash du mot de passe
        $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Requête SQL préparée pour insérer les données dans la table 'utilisateurs'
        $stmt = $connexion->prepare("INSERT INTO utilisateurs (pseudo, email, motdepasse) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $pseudo, $email, $motdepasse_hache);

        if ($stmt->execute()) {
            // Rediriger vers la page principale après inscription réussie
            $_SESSION['pseudo'] = $pseudo;  // Assurez-vous que $pseudo contient la valeur correcte.
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
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" required><br><br>

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

            <br><br>
            <input type="submit" value="S'inscrire">
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
