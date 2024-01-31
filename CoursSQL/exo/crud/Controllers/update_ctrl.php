<?php
require_once('../db.php');


if (isset($_POST) && !empty($_POST)) {
    $update = $BDD->prepare('UPDATE livre SET titre=?, ISBN=?, résumé=? WHERE id=?');
    $update->execute(array(
        $_POST['titre'],
        $_POST['isbn'],
        $_POST['resume'],
        $_POST['id']
    ));
}
header('Location: ../index.php');