<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>

    <form action="../Controllers/login_ctrl.php" method="post">
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" required><br><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" required><br><br>

        <input type="submit" value="Se connecter">
    </form>

    <br>
    <a href="../Views/index.php">Retour à la liste des utilisateurs</a>
</body>
</html>
