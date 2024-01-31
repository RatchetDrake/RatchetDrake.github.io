<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque</title>
    <style>
        table, tr,td,th {
            border: 1px dotted black;
            padding: 10px;
            border-collapse: collapse;
        }
        button {
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>
    <form action="./Views/update.php" method="POST" id='form'>
        <button formaction='./Views/create.php'>Créer un nouveau livre</button>
        <button formaction='./Views/read.php'>Liste des livres</button>
        <table>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>ISBN</th>
                <th>Résumé</th>
                <th>Actions</th>
            </tr>
            <?php
                require_once './Controllers/read_ctrl.php';
                foreach ($ListLivre as $livre) {
                    // Syntaxe Here Document (HereDoc) sert à dire que on est bien en chaine de cractère mais permet
                    // de faire du code php quand même
                    echo <<<Heredoc
                        <tr>
                            <td>{$livre['id']}</td>
                            <td>{$livre['titre']}</td>
                            <td>{$livre['ISBN']}</td>
                            <td>{$livre['résumé']}</td>
                            <td>
                                <button name='update' value="{$livre['id']}">Modifier</button>            
                                <button formaction="./Controllers/delete_ctrl.php" name="delete" value="{$livre['id']}">Supprimer</button>
                            </td>
                        </tr>
                    Heredoc;
                    // Juste au dessus j'ai mis 'value="{$livre['id']}"' puisque dans notre read j'ai mis un fetchall 
                    // PDO::FETCH_ASSOC si je l'aurai mis en PDO::FETCH_CLASS j'aurai plutôt du mettre 'value="{$livre->id}"'
                }
            ?>
        </table>
    </form>
    <script>
        document.getElementById('form').addEventListener('submit', function(DataEvent) {
            // DataEvent stocke toute les donnée de l'événement
            // submitter est l'élément qui a était utilisé pour appelé l'évenement
            if (DataEvent.submitter.name == 'delete') {
                if (!confirm('Voulez vous vraiment supprimé le livre ?')) {
                    // confirm affiche un dialogue sur notre page ou on peu confirmer ou supprimé
                    DataEvent.preventDefault();
                    // preventDefault annule toute action par défaut d'un évenment 
                    // Cet à dire submit doit normalement envoyé le forumaire vers quelque part 
                    // preventDefault annnule cette action et lui dit de ne rien faire
                }
            }
        })
    </script>
</body>
</html> 