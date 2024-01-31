<?php
require_once('../db.php');


if (isset($_POST) && !empty($_POST)) {
    $select = $BDD->prepare('SELECT * FROM livre WHERE ISBN=?');
    $select->execute(array(
        $_POST['isbn']
    ));
    $select = $select->rowCount();

    if ($select < 1) {
        $create = $BDD->prepare('INSERT INTO livre (titre, ISBN, résumé) VALUES (?, ?, ?)');
        $create->execute(array(
            $_POST['titre'],
            $_POST['isbn'],
            $_POST['resume']
        ));
        header('Location: ../index.php');
    } else {
        echo '<script>
                alert("Ce ISBN existe déjà !"); 
                window.location.replace("../index.php")
            </script>';
    }
}
