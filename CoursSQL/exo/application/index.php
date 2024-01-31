<?php
    require_once './function/db.php'
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style/style.css">
    <title>Application</title>
</head>
<body>
    <header>
        <nav>
            <a href="./index.php">Software</a>
            <a href="./page/author.php">Author</a>
        </nav>
    </header>
    <h1><?php
        session_start();
        if (!empty($_SESSION)) {
            echo "Je suis " . $_SESSION['name'];
        }
    ?></h1>
    <form action="./page/bug.php">
        <table>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Version</th>
                <th>Description</th>
                <th>Bug ID</th>
                <th>Bug</th>
            </tr>

        <?php
            $software = $bdd->prepare('SELECT * FROM software');
            $software->execute();
            $software = $software->fetchAll(PDO::FETCH_CLASS);

            if (!empty($software)) {
                foreach($software as $ligne) {
                    echo '<tr>';

                    foreach($ligne as $colonne) {
                        echo "<td>" . ($colonne ? $colonne : "NULL") . "</td>";
                    }

                    echo "<td><button name='software' value='" . $ligne->id . "'>Soumettre un bug</button></td>";
                    echo '</tr>';
                }
                
            }
        ?>

        </table>
    </form>
</body>
</html>