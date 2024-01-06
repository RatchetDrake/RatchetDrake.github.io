<?php
// Vérifier si une session a déjà été démarrée
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si les index existent avant d'accéder aux données du formulaire
    if (isset($_POST["pseudo"]) && isset($_POST["mot_de_passe"])) {
        $pseudo = $_POST["pseudo"];
        $mot_de_passe_saisi = $_POST["mot_de_passe"];

        // Le reste de votre code de gestion de connexion va ici
        // Assurez-vous de vérifier les informations de connexion par rapport à votre base de données

        // Exemple de vérification basique (remplacez-le par votre logique de connexion réelle)
        try {
            // Connexion à la base de données en utilisant PDO
            $pdo = new PDO("mysql:host=localhost;dbname=crud", "RatchetDrake", "Azerty");

            // Définition des attributs PDO pour gérer les erreurs et les exceptions
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête pour récupérer le mot de passe haché de l'utilisateur
            $sql = "SELECT mot_de_passe FROM user WHERE pseudo = :pseudo";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->execute();

            if ($stmt->rowCount() == 1) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $mot_de_passe_hash = $row['mot_de_passe'];

                // Vérifier le mot de passe saisi par l'utilisateur avec le mot de passe haché
                if (password_verify($mot_de_passe_saisi, $mot_de_passe_hash)) {
                    // Authentification réussie, définissez des variables de session
                    $_SESSION["user_id"] = 1; // Vous pouvez utiliser l'ID de l'utilisateur réel ici
                    $_SESSION["pseudo"] = $pseudo;
                    header("Location: ../Views/index.php"); // Rediriger vers la page d'accueil ou une autre page appropriée après la connexion
                    exit();
                } else {
                    // Mot de passe incorrect
                    echo "Mot de passe incorrect. Veuillez réessayer.";
                }
            } else {
                // Utilisateur non trouvé
                echo "Utilisateur non trouvé. Veuillez vérifier vos informations de connexion.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Les données du formulaire de connexion sont manquantes.";
    }
}
?>
