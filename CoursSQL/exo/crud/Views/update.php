<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Un Livre</title>
    <style> 
        form {
            width: 50%;
            margin: 100px auto;
        }
        form * {
            margin: 5px;
            padding: 10px;
        }

    </style>
</head>
<body>
    <?php
    require_once('../db.php');
    if (isset($_POST) && !empty($_POST)) {
        $update = $BDD->prepare('SELECT * FROM livre WHERE id=?');
        $update->execute(array(
            $_POST['update']
        ));
        $update = $update->fetch(PDO::FETCH_ASSOC);
    }
    ?>
    <form action="../Controllers/update_ctrl.php" method='post'>
        <fieldset>
            <legend>Modifier un livre</legend>
            <pre>
                <label for="id">ID :</label>
                <input type="number" name="id" id="id" readonly value="<?php echo $update['id'] ?>">
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre" value="<?php echo $update['titre'] ?>">
                <label for="isbn">ISBN :</label>
                <input type="text" name="isbn" id="isbn" maxlength="49" pattern='{0,50}' value="<?php echo $update['ISBN'] ?>">
                <label for="resume">Résumé :</label>
                <textarea name="resume" id="resume" cols="30" rows="10"><?php echo $update['résumé'] ?></textarea>
                <input type="submit" value="Modifier">
            </pre>
        </fieldset>
    </form>
    
</body>
</html>