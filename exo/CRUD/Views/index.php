<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
    <style>
        th, td {
            border: 1px solid black;
            padding: 25px;
        }
    </style>
</head>
<body>
    <!-- CRUD: CREATE(INSERT INTO), READ(SELECT), UPDATE, DELETE

    
    Vous allez avoir plusieurs fichier 
    Dans un dossier 'Views' vous avez: create.php, read.php, update.php
    Dans un dossier 'Controllers' vous avez: create_ctrl.php, read_ctrl.php, update_ctrl.php, delete_ctrl.php 

    Vous devez créer une base de donnée que vous nommerez crud avec interclassement 
    utf8_general_ci (mb3 ou mb4)

    Dans cette base de donnée, vous allez créer une table user avec 3 attributs id, pseudo, mot_de_passe, description

    L'id' sera un entier et la clé primaire de la table sera auto incrémenté
    "Pseudo" sera en varchar 255 tout comme "motDePasse"
    "description" sera en TEXT

    L'index.php affichera un tableau de user, chaque ligne de ce tableau affichera les informations 
    (id, pseudo, mot de passe hashé, description) de cet user et permettra aussi la suppression, 
    la modification et l'affichage d'un user via un bouton ou un lien
    L'index.php affichera aussi un bouton permettant la création d'un user
    create.php affichera le formulaire de création d'user
    update.php affichera le formulaire prérempli d'user afin de le modifier
    read.php afficher une liste à puce des informations de l'user

-->
    <?php
    include '../Controllers/db.php';

    // Récupérer la liste des utilisateurs depuis la base de données
    $sql = "SELECT * FROM user";
    $stmt = $pdo->query($sql);

    // Vérifier s'il y a des utilisateurs à afficher
    if ($stmt->rowCount() > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Pseudo</th>';
        echo '<th>Mot de passe haché</th>'; // Affiche le mot de passe haché
        echo '<th>Description</th>';
        echo '<th>Action</th>';
        echo '</tr>';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['pseudo'] . '</td>';
            echo '<td>' . $row['mot_de_passe'] . '</td>'; // Affiche le mot de passe haché
            echo '<td>' . $row['description'] . '</td>';
            echo '<td>';
            echo '<a href="update.php?id=' . $row['id'] . '">Mettre à jour</a> | '; // Lien de mise à jour
            echo '<a href="../Controllers/delete_ctrl.php?id=' . $row['id'] . '">Supprimer</a>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "Aucun utilisateur trouvé.";
    }
    ?>

    <br>
    <a href="create.php">Créer un nouvel utilisateur</a>
    <?php
    if (isset($_SESSION['user_id'])) {
        echo '<br><a href="../Controllers/logout_ctrl.php">Déconnexion</a>';
    }
    ?>
</body>
</html>
