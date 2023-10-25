<!DOCTYPE html>
<html>
<head>
    <title>Créer un nouvel utilisateur</title>
</head>
<body>
    <h2>Créer un nouvel utilisateur</h2>

    <form action="../Controllers/create_ctrl.php" method="post">
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" required><br><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br><br>

        <label for="description">Description :</label>
        <textarea name="description" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="S'inscrire">
    </form>

    <br>
    <a href="../Views/index.php">Retour à la liste des utilisateurs</a>
</body>
</html>
