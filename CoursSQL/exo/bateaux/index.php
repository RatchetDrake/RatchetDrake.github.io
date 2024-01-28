<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les bateaux</title>
    <style>
        table {
            margin: 50px auto;
        }
        table,tr,th,td {
            border: 1px solid #747779;
            border-collapse: collapse;
            padding: 20px;            
        }
        th, td {   
            font-weight: bolder;
            text-align: center;         
            width: 250px;
        }
        th {
            color: blue;
        }
        button {
            padding: 15px;
            border-radius: 30px;
            margin: 5px;
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <form id="form" action="./Views/update.php" method='POST'>
        <button formaction="./Views/create.php">Créer un bateau</button>
        <table>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Modèle</th>
                <th>Taille</th>
                <th>Propriètaire</th>
                <th>Actions</th>
            </tr>
            <?php
                require_once('./Controllers/read_ctrl.php');
                foreach($ListBateau as $bateau) {
                    echo "<tr>";
                    foreach ($bateau as $colonne) {
                        echo "<td>$colonne</td>";
                    }
                    echo "<td>
                        <button name='update' value='" . $bateau['id'] . "'>Modifier</button>
                        <button formaction='./Controllers/delete_ctrl.php' name='delete' value='" . $bateau['id'] . "'>Supprimer</button>
                    </td>";
                    echo "</tr>";
                }
            ?>
            <script>
                // Dans la fonction addEventListener la première valeur que on rentre est une valeur de JS
                document.getElementById("form").addEventListener("submit", function(eventData){
                    if (eventData.submitter.name == "delete") {
                        var conf = confirm("Voulez vous vraiment supprimer ce bateau ?");
                        if (conf) {
                            conf = confirm("Vous etes vraiment sur ?");
                            if (conf) {
                                conf = confirm("Vraiment vraiment ?");
                                if (!conf) {
                                    eventData.preventDefault();
                                }
                            } else {
                                eventData.preventDefault();    
                            }
                        } else {
                            eventData.preventDefault();
                        }
                    }
                })
            </script>
        </table>
    </form>
</body>
</html>