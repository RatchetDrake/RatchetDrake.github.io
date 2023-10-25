<?php
include 'db.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    try {
        // Préparation de la requête SQL pour la suppression de l'utilisateur
        $sql = "DELETE FROM user WHERE id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);

        // Exécution de la requête
        if ($stmt->execute()) {
            header("Location: ../Views/index.php"); // Rediriger vers la liste des utilisateurs après la suppression
            exit();
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "ID de l'utilisateur à supprimer non spécifié.";
}
?>
