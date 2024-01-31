<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <title>Création</title>
</head>
<body>
    <form action="../controllers/create_user.php" method="POST">
        <label for="name">Nom:</label>
        <input type="text" name="name" id="name">
        <br><br>
        <label for="description">Description:</label>
        <input type="text" name="desc" id="desc">
        <br><br>
        <input type="submit" value="Créer">
    </form>
</body>
</html>