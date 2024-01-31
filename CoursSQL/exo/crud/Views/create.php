<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un livre</title>
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
<form action="../Controllers/create_ctrl.php" method='post'>
        <fieldset>
            <legend>Créer un livre</legend>
            <pre>
                <label for="titre">Titre :</label>
                <input type="text" name="titre" id="titre">
                <label for="isbn">ISBN :</label>
                <input type="text" name="isbn" id="isbn" maxlength="49" pattern='{0,50}'>
                <label for="resume">Résumé :</label>
                <textarea name="resume" id="resume" cols="30" rows="10"></textarea>
                <input type="submit" value="Créer">
            </pre>
        </fieldset>
    </form>
</body>
</html>