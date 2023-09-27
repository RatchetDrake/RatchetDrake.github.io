

<?php
require_once('../../db.php');
require_once('./mail.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mot de passe oublié</title>
    <link rel="stylesheet" href="../connexion.css">
</head>
<body>
    <form action="" method="post">
        <h1>Réinitialisation du mot de passe</h1>
        <label for="email">Adresse Email</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" value="Envoyer le lien">
    </form>
    <?php 
    if (isset($_POST) && !empty($_POST)) {
        $select = $bdd->prepare('SELECT * FROM users WHERE email=?');
        $select->execute(array($_POST['email']));
        $select = $select->fetchAll();
        if (empty($select)) {
            echo '<script> alert("Cette adresse n\'est pas inscrite sur ce site") </script>';
        } else {
            // GenerateToken(50);
            SendEmail(10, "ABC", "enfants54@gmail.com");
        }
    }
    
    
    ?>
</body>
</html>