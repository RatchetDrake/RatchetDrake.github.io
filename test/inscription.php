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

// Initialiser la variable pour stocker les messages d'erreur
$erreur = "";

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $motdepasse = $_POST['login_motdepasse'];
    $confirm_motdepasse = $_POST['confirm_motdepasse'];

    // Vérification de l'adresse email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur = "L'adresse email n'est pas valide.";
    }

    // Vérification du nom d'utilisateur
    $stmt = $connexion->prepare("SELECT nom FROM utilisateurs WHERE nom = ?");
    $stmt->bind_param("s", $nom);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $erreur = "Le nom d'utilisateur est déjà utilisé. Veuillez en choisir un autre.";
    }

    // Vérification de l'adresse email
    $stmt = $connexion->prepare("SELECT email FROM utilisateurs WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $erreur = "L'adresse email est déjà utilisée. Veuillez en choisir une autre.";
    }

    // Vérifier les critères du mot de passe
    if (strlen($motdepasse) < 8 || !preg_match('/[A-Za-z]/', $motdepasse) || !preg_match('/\d/', $motdepasse) || !preg_match('/[@$!%*?&]/', $motdepasse)) {
        $erreur = "Le mot de passe ne respecte pas les critères requis.";
    }

    // Vérification que les mots de passe correspondent
    if ($motdepasse !== $confirm_motdepasse) {
        $erreur = "Les mots de passe ne correspondent pas.";
    }

    // Si aucune erreur, procéder à l'inscription
    if (empty($erreur)) {
        // Hash du mot de passe
        $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Requête SQL pour insérer les données dans la table 'utilisateurs'
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, motdepasse) VALUES ('$nom', '$prenom', '$email', '$motdepasse_hache')";

        if ($connexion->query($sql) === TRUE) {
            // Rediriger vers la page principale après inscription réussie
            $_SESSION['nom'] = $nom;  // Assurez-vous que $nom contient la valeur correcte.
            header("Location: index.php");
            exit();
        } else {
            $erreur = "Erreur lors de l'inscription : " . $connexion->error;
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
        <?php
        if (!empty($erreur)) {
            echo "<div style='color: red;'>Erreur: $erreur</div>";
        }
        ?>
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
