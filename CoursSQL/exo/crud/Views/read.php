<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des livres</title>
    <style>
        li {
            margin: 15px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <ol>
        <?php
            require_once '../db.php';

            $ListLivre = $BDD->prepare('SELECT * FROM livre');
            $ListLivre->execute();
            $ListLivre = $ListLivre->fetchAll(PDO::FETCH_ASSOC);
        
            foreach ($ListLivre as $livre) {
                echo <<<echo
                <li>
                    <ul>
                        <li>{$livre['id']}</li>
                        <li>{$livre['titre']}</li>
                        <li>{$livre['ISBN']}</li>
                        <li>{$livre['résumé']}</li>
                    </ul>
                </li>
                echo;
            }
        ?>
    </ol>
</body>
</html>