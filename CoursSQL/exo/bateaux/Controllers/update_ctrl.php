<?php
$BDD = new PDO
(
    'mysql:host=localhost; dbname=bateau; charset=utf8;',
    'Anto',
    'Azerty123'
);

if (isset($_POST) && !empty($_POST)) {
    $update = $BDD->prepare('UPDATE bateaux SET nom=?, modele=?, taille=?, proprietaire=? WHERE id=?');
    $update->execute(array(
        $_POST['nom'],
        $_POST['modele'],
        $_POST['taille'],
        $_POST['owner'],
        $_POST["id"]
    ));
}    
header('Location: ../index.php');
