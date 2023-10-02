<?php

$serveur = "localhost";
$utilisateur = "RatchetDrake";
$motdepasse_bd = "Azerty";
$nomBaseDeDonnees = "projet";

try {
    // Connexion à la base de données avec PDO
    $connexion = new PDO("mysql:host=$serveur;dbname=$nomBaseDeDonnees", $utilisateur, $motdepasse_bd);
    // Configure PDO to throw exceptions on error
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("La connexion à la base de données a échoué : " . $e->getMessage());
}

if (isset($_GET) && !empty($_GET)) {
    $select = $bdd->prepare('SELECT * FROM utilisateurs WHERE id=? AND token=?');
    $select->execute(array(
        $_GET['id'],
        $_GET['token']
    ));
    $select = $select->fetchAll();

    if (empty($select)) 
        header('Location: login.php');
    elseif (!$select['confirm']) header('Location: login.php');
} else 
    header('Location: login.php');

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../connexion.css">
    </head>
<body>
    <form action="" method="post">
        <pre>
            <h1>Modification du mot de passe</h1>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
            <br>
            <label for="confirm_password">Confirmation du mot de passe :</label>
            <input type="password" name="confirm_password" id="confirm_password" required oninput="ChangeValue()">
            <br>
            <input type="submit" value="Modifier">
        </pre>
    </form>
    <?php 
        if (isset($_POST) && !empty($_POST)) {
            $update = $bdd->prepare('UPDATE utilisateurs SET password=?, token=? WHERE id=? AND token=?');
            $update->execute(array(
                sha1($_POST['password']),
                '',
                $_GET['id'],
                $_GET['token']
            ));
            $update = $update->rowCount();
            if ($update > 0) 
                header('Location: login.php');
            else
                echo 'Une erreur c\'est produite ';
        }
    ?>
    <script>
        function ChangeValue() {
            let Password = document.getElementById('password')
            let confirmPassword = document.getElementById('confirm_password')
            
            if (Password.value == confirmPassword.value)                
                confirmPassword.setCustomValidity('')
            else                 
                confirmPassword.setCustomValidity('Les mots de passe doivent être identique')      
        }
    </script>
</body>
</html>