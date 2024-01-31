<?php
require_once './db.php';

$ListLivre = $BDD->prepare('SELECT * FROM livre');
$ListLivre->execute();
$ListLivre = $ListLivre->fetchAll(PDO::FETCH_ASSOC);
