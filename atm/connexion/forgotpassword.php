<?php
require_once('../../db.php');
require_once('./mail.php');
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
            $token = GenerateToken(50);
            $update = $bdd->prepare('UPDATE users SET token=? WHERE email=? AND id=?');
            $update->execute(array(
                $token,
                $_POST['email'],
                $select[0]['id']
            ));
            SendEmail($select[0]['id'], $token, $_POST['email']);
        }
    }
    
    
    ?>
</body>
</html>