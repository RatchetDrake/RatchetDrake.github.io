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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'identifiant (e-mail ou pseudo) et le nouveau mot de passe
    $identifier = $_POST['identifier'];
    $nouveau_motdepasse = $_POST['login_motdepasse'];

    // Vérifier la validité du nouveau mot de passe
    if (!est_motdepasse_valide($nouveau_motdepasse)) {
        $error_message = "Le mot de passe doit avoir entre 8 et 20 caractères, avec au moins une minuscule, une majuscule, un chiffre et un caractère spécial.";
    } else {
        // Connexion à la base de données
        $serveur = "localhost";
        $utilisateur = "RatchetDrake";
        $motdepasse_bd = "Azerty";
        $nomBaseDeDonnees = "projet";

        $connexion = new mysqli($serveur, $utilisateur, $motdepasse_bd, $nomBaseDeDonnees);

        if ($connexion->connect_error) {
            die("La connexion à la base de données a échoué : " . $connexion->connect_error);
        }

        // Vérifier si l'identifiant est un e-mail ou un pseudo
        $field = filter_var($identifier, FILTER_VALIDATE_EMAIL) ? 'email' : 'pseudo';

        // Vérifier l'existence de l'identifiant dans la base de données
        $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE $field = ?");
        $stmt->bind_param("s", $identifier);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // L'utilisateur existe, mettre à jour le mot de passe
            $row = $result->fetch_assoc();

            // Hash du nouveau mot de passe
            $nouveau_motdepasse_hache = password_hash($nouveau_motdepasse, PASSWORD_DEFAULT);

            // Mettre à jour le mot de passe dans la base de données
            $stmt = $connexion->prepare("UPDATE utilisateurs SET motdepasse = ? WHERE $field = ?");
            $stmt->bind_param("ss", $nouveau_motdepasse_hache, $identifier);
            $stmt->execute();

            // Afficher le message de succès
            $success_message = "Mot de passe mis à jour avec succès.";
        } else {
            // Afficher le message d'erreur
            $error_message = "Aucun utilisateur trouvé avec cet e-mail ou pseudo.";
        }

        $stmt->close();
        $connexion->close();
    }
}
?>

<!-- Inclure le formulaire avec les messages d'erreur ou de succès -->
<?php include('reset_password_form.php'); ?>
