<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['pseudo']) && isset($_POST['description'])) {
        $user_id = $_POST['id'];
        $pseudo = $_POST["pseudo"];
        $description = $_POST["description"];

        try {
            // Préparation de la requête SQL pour la mise à jour de l'utilisateur
            $sql = "UPDATE user SET pseudo = :pseudo, description = :description WHERE id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':pseudo', $pseudo);
            $stmt->bindParam(':description', $description);

            // Exécution de la requête
            if ($stmt->execute()) {
                header("Location: ../Views/index.php"); // Rediriger vers la liste des utilisateurs après la mise à jour
                exit();
            } else {
                echo "Erreur lors de la mise à jour de l'utilisateur.";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Données de mise à jour manquantes.";
    }
} else {
    echo "Accès non autorisé.";
}
?>
