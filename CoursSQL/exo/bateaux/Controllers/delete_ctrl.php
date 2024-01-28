<?php
$BDD = new PDO
(
    'mysql:host=localhost; dbname=bateau; charset=utf8;',
    'Anto',
    'Azerty123'
);
if (isset($_POST) && !empty($_POST)) {
    $delete = $BDD->prepare('DELETE FROM bateaux WHERE id=?');
    $delete->execute(array(
        $_POST['delete']
    ));
}
header('Location: ../index.php');