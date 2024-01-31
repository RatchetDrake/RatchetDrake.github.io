<?php
    require_once('../function/db.php');
    if (isset($_POST) && !empty($_POST)) {
        $insert = $bdd->prepare('INSERT INTO attachement (author, body) VALUES (?, ?)');
        $insert = $insert->execute(array(
            $_POST['name'],
            $_POST['desc']
        ));
    }        
    session_start();
    $_SESSION = $_POST;
    header('Location: ../index.php');

?>