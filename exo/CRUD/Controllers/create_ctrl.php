<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pseudo = $_POST["pseudo"];
    $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT); // Hasher le mot de passe
    $description = $_POST["description"];

    try {
        // Préparation de la requête SQL
        $sql = "INSERT INTO user (pseudo, mot_de_passe, description) VALUES (:pseudo, :mot_de_passe, :description)";
        $stmt = $pdo->prepare($sql);

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
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
