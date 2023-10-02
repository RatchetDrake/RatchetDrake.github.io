<?php
session_start();

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

$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse_bd = "Azerty";
$nomBaseDeDonnees = "projet";

try {
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse_bd);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

$erreur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $erreur = "Les mots de passe ne correspondent pas.";
    } elseif (!est_motdepasse_valide($password)) {
        $erreur = "Le mot de passe doit avoir entre 8 et 20 caractères, avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial.";
    }

    if (empty($erreur)) {
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);

        $id = $_GET['id'];
        $token = '';

        $update = $connexion->prepare('UPDATE utilisateurs SET motdepasse=?, token=? WHERE id=? AND token=?');
        if ($update->execute(array($password_hashed, $token, $id, $_GET['token']))) {
            header('Location: ../connexion.php');
            exit();
        } else {
            die('Erreur lors de la mise à jour du mot de passe : ' . $update->errorInfo()[2]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Changement du mot de passe</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>Modification du mot de passe</h1>
            <label for="login_motdepasse">Nouveau mot de passe :</label>
            <div class="password-input">
                <input type="password" name="password" id="login_motdepasse" required onpaste="return false">
                <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
            </div>
            <br>
            <label for="confirm_login_motdepasse">Confirmation du nouveau mot de passe :</label>
            <div class="password-input">
                <input type="password" name="confirm_password" id="confirm_login_motdepasse" required onpaste="return false">
                <span class="password-toggle" onclick="togglePassword('confirm_login_motdepasse')">👁️</span>
            </div>

            <div class="div-erreur">
                <?php
                if (!empty($erreur)) {
                    echo "<div style='color: red; text-align: center;'>Erreur: $erreur</div>";
                }
                ?>
            </div>

            <br><br>
            <input type="submit" value="Modifier le mot de passe">
        </form>
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