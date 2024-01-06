<?php
session_start();

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers une page de connexion ou une autre page appropriée
header("Location: ../Views/login.php");
exit();
?>
