<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT); // Hasher le mot de passe
    $description = $_POST["description"];

    try {
        // Vérifier si l'utilisateur existe déjà
        $checkSql = "SELECT id FROM user WHERE pseudo = :pseudo";
        $checkStmt = $pdo->prepare($checkSql);
        $checkStmt->bindParam(':pseudo', $pseudo);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo "Un utilisateur avec le même pseudo existe déjà.";
        } else {
            // Préparation de la requête SQL
            $insertSql = "INSERT INTO user (pseudo, mot_de_passe, description) VALUES (:pseudo, :mot_de_passe, :description)";
            $stmt = $pdo->prepare($insertSql);

            // Liaison des paramètres
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':mot_de_passe', $mot_de_passe);
            $stmt->bindParam(':description', $description);

            // Exécution de la requête
            if ($stmt->execute()) {
                header("Location: ../Views/index.php"); // Rediriger vers la liste des utilisateurs
                exit();
            } else {
                echo "Erreur lors de l'exécution de la requête.";
            }
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
