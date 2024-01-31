<?php
    session_start();
    if (empty($_SESSION)) {
        header('Location: ../index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/style.css">
    <title>Bug</title>
</head>
<body>
    <form action="../controllers/create_bug.php" method="post">
        <input type="text" name="app_id" id="app_id" readonly style="display:none;" value="<?php echo $_GET['software'] ?>">    
        <label for="owner">Nom</label>
        <input type="text" name="owner" id="owner">

        <label for="severity">Sévéritée du bug</label>
        <select name="severity" id="severity">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <label for="summary">Sommaire</label>
        <input type="textarea" name="summary" id="summary">

        <label for="description">Description</label>
        <input type="textarea" name="description" id="description">

        <input type="submit" value="Envoi">
    </form>
</form>
</body>
</html>