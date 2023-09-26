<?php
session_start();

// Fonction pour valider la complexité du mot de passe
function est_motdepasse_valide($motdepasse) {
    // Vérifie que le mot de passe a entre 8 et 20 caractères
    if (strlen($motdepasse) < 8 || strlen($motdepasse) > 20) {
        return false;
    }

    // Vérifie la présence de caractères spéciaux
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $motdepasse)) {
        return false;
    }

    // Vérifie la présence de minuscules, majuscules et chiffres
    if (!preg_match('/[a-z]/', $motdepasse) || 
        !preg_match('/[A-Z]/', $motdepasse) || 
        !preg_match('/[0-9]/', $motdepasse)) {
        return false;
    }

    return true;
}

// Fonction pour valider le domaine de l'adresse email
function est_domaine_valide($email) {
    $domaines_valides = array(
        'gmail.com', 
        'outlook.com', 
        'yahoo.com',
        'hotmail.com',
        'hotmail.fr',
        'aol.com',
        'icloud.com',
        'protonmail.com',
        'mail.com',
        'zoho.com',
        'yandex.com',
        'live.com',
        'live.fr',
        'gmx.com',
        'inbox.com',
        'me.com',
        'fastmail.com',
        'disroot.org',
        'tutanota.com',
        'riseup.net'
        // Ajoutez d'autres domaines au besoin
    );
    $email_parts = explode('@', $email);
    $domaine = end($email_parts);
    return in_array($domaine, $domaines_valides);
}

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

    // Vérifier que le pseudo a au moins 5 caractères
    if (strlen($pseudo) < 5) {
        $erreur = "Le pseudo doit avoir au moins 5 caractères.";
    }

    // Vérifier que les mots de passe correspondent
    if ($motdepasse !== $confirm_motdepasse) {
        $erreur = "Les mots de passe ne correspondent pas.";
    }

    // Vérifier la complexité du mot de passe
    if (!est_motdepasse_valide($motdepasse)) {
        $erreur = "Le mot de passe doit avoir entre 8 et 20 caractères, avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial.";
    }

    // Vérifier l'unicité du pseudo et de l'adresse e-mail
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE pseudo = ? OR email = ?");
    $stmt->bind_param("ss", $pseudo, $email);
    $stmt->execute();
    $resultat = $stmt->get_result();

    while ($row = $resultat->fetch_assoc()) {
        if ($row['pseudo'] === $pseudo) {
            $erreur = "Le pseudo est déjà utilisé. Veuillez en choisir un autre.";
        }
        if ($row['email'] === $email) {
            $erreur = "L'adresse e-mail est déjà utilisée. Veuillez en choisir une autre.";
        }
    }

    $stmt->close();

    // Vérifier le domaine de l'adresse e-mail
    if (!est_domaine_valide($email)) {
        $erreur = "L'adresse e-mail n'est pas valide.";
    }

    // Si aucune erreur, procéder à l'inscription
    if (empty($erreur)) {
        // Hash du mot de passe
        $motdepasse_hache = password_hash($motdepasse, PASSWORD_DEFAULT);

        // Requête SQL préparée pour insérer les données dans la table 'utilisateurs'
        $stmt = $connexion->prepare("INSERT INTO utilisateurs (pseudo, email, motdepasse) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $pseudo, $email, $motdepasse_hache);

        if ($stmt->execute()) {
            // Inscription réussie, stocker le pseudo dans la session
            $_SESSION['pseudo'] = $pseudo;
            $stmt->close();
            $connexion->close();
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
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h2>Inscription</h2>

        <form action="inscription.php" method="post" onsubmit="return validateForm()">
            <label for="pseudo">Pseudo :</label>
            <input type="text" id="pseudo" name="pseudo" required minlength="5"><br><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="login_motdepasse">Mot de passe :</label>
            <div class="password-input">
                <input type="password" id="login_motdepasse" name="login_motdepasse" required onpaste="return false">
                <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
            </div>
            <br><br>

            <label for="confirm_motdepasse">Confirmez le mot de passe :</label>
            <div class="password-input">
                <input type="password" id="confirm_motdepasse" name="confirm_motdepasse" required onpaste="return false">
                <span class="password-toggle" onclick="togglePassword('confirm_motdepasse')">👁️</span>
            </div>

            <div class="div-erreur">
                <?php
                if (!empty($erreur)) {
                    echo "<div style='color: red; text-align: center;'>Erreur: $erreur</div>";
                }
                ?>
            </div>

            <br><br>
            <input type="submit" value="S'inscrire">
        </form>
        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a>.</p>

        <!-- Lien vers la réinitialisation du mot de passe -->
        <p>Mot de passe oublié ? <a href="reset_password_form.php">Réinitialiser le mot de passe</a></p>
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
