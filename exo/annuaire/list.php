<?php
include 'bdd.php'; // Incluez la connexion à la base de données

$query = $pdo->prepare("SELECT * FROM annuaire");
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des entrées</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Profession</th>
                <th>Ville</th>
                <th>Code Postal</th>
                <th>Adresse</th>
                <th>Date de Naissance</th>
                <th>Sexe</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row) : ?>
                <tr>
                    <td><?= $row['id_annuaire'] ?></td>
                    <td><?= $row['nom'] ?></td>
                    <td><?= $row['prenom'] ?></td>
                    <td><?= $row['telephone'] ?></td>
                    <td><?= $row['profession'] ?></td>
                    <td><?= $row['ville'] ?></td>
                    <td><?= $row['codepostal'] ?></td>
                    <td><?= $row['adresse'] ?></td>
                    <td><?= $row['date_de_naissance'] ?></td>
                    <td>
                        <?php if ($row['sexe'] === 'h') : ?>
                            Homme
                        <?php elseif ($row['sexe'] === 'f') : ?>
                            Femme
                        <?php else : ?>
                            Autre
                        <?php endif; ?>
                    </td>
                    <td><?= $row['description'] ?></td>
                    <td>
                        <a href="modifier.php?id=<?= $row['id_annuaire'] ?>">Modifier</a>  |
                        <a href="supprimer.php?id=<?= $row['id_annuaire'] ?>">Supprimer</a> |
                        <a href="formulaire.php">Retourner au formulaire</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
