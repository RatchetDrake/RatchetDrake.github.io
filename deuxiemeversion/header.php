<!-- header.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="test.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap">
    <style>
        /* Ajoutez ici votre CSS personnalisé pour l'effet du volet d'informations */
        /* ... Votre CSS pour l'effet de volet d'informations ... */
    </style>
</head>
<body>
<?php
        session_start();

        // Vérifiez si l'utilisateur est connecté (si le nom est stocké dans la session)
        if (isset($_SESSION['pseudo'])) {
            echo '<div class="user-info">Bonjour, ' . htmlspecialchars($_SESSION['pseudo']) . '</div>';
        }

        // Vérifier et afficher le message d'erreur d'inactivité s'il existe
        if (isset($_SESSION['erreur_inactivite'])) {
            echo '<div class="error-message">' . $_SESSION['erreur_inactivite'] . '</div>';
            unset($_SESSION['erreur_inactivite']);  // Effacer le message après l'affichage
        }
    ?>

    <!-- Lien de déconnexion -->
    <a href="deconnexion.php" class="button">Se déconnecter</a>

