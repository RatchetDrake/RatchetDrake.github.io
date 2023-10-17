<?php

include 'bdd.php'; // Incluez la connexion à la base de données

// Vérifiez si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Assurez-vous que l'ID est un entier

    // Supprimer l'entrée avec cet ID
    $query = $pdo->prepare("DELETE FROM annuaire WHERE id_annuaire = :id");
    $query->bindParam(':id', $id);
    $result = $query->execute();

    if ($result) {
        echo "Entrée supprimée avec succès.";
    } else {
        echo "Erreur lors de la suppression.";
    }
} else {
    echo "ID non fourni.";
}

?>

<a href="list.php">Retour à la liste</a>
