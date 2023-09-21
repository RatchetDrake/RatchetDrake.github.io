<?php
// Détruire la session
session_start();
session_destroy();

// Rediriger vers la page de connexion
header("Location: connexion.php");
exit();
?>
