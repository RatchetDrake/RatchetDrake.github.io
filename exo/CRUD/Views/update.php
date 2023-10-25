<!DOCTYPE html>
<html>
<head>
    <title>Mettre à jour un utilisateur</title>
</head>
<body>
    <h2>Mettre à jour un utilisateur</h2>

    <?php
    include '../Controllers/db.php';

    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        // Récupérer les informations de l'utilisateur à mettre à jour
        $sql = "SELECT * FROM user WHERE id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
    ?>
            <form action="../Controllers/update_ctrl.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" value="<?php echo $user['pseudo']; ?>" required><br><br>

                <label for="description">Description :</label>
                <textarea name="description" rows="4" cols="50"><?php echo $user['description']; ?></textarea><br><br>

                <input type="submit" value="Mettre à jour">
            </form>

            <br>
            <a href="../Views/index.php">Retour à la liste des utilisateurs</a>
    <?php
        } else {
            echo "Utilisateur non trouvé.";
        }
    } else {
        echo "ID de l'utilisateur à mettre à jour non spécifié.";
    }
    ?>
</body>
</html>
