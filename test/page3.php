<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="styleP3.css">

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
        if (isset($_SESSION['nom'])) {
            echo '<div class="user-info">Bonjour, ' . htmlspecialchars($_SESSION['nom']) . '</div>';
        }

        // Vérifier et afficher le message d'erreur d'inactivité s'il existe
        if (isset($_SESSION['erreur_inactivite'])) {
            echo '<div class="error-message">' . $_SESSION['erreur_inactivite'] . '</div>';
            unset($_SESSION['erreur_inactivite']);  // Effacer le message après l'affichage
        }
    ?>

    <!-- Lien de déconnexion -->
    <a href="deconnexion.php" class="button">Se déconnecter</a>
    <div class="container">
        <h2>Contenu de la Page 1</h2>
        <p>Bienvenue sur la page 1. Voici du contenu intéressant...</p>
    </div>
<div class="navpage2">
    <nav class="nav-links">
        <a href="index.php">Accueil</a>
        <a href="page2.php">Page 2</a>
        <a href="page3.php">Page 3</a>
    </nav>
    </div>
<div class="controls">
  <label for="subgrid">Use Subgrid?</label>
  <input type="checkbox" id="subgrid" />
</div>

<main>
  <article class=card>
    <img src="https://picsum.photos/300/200?random=2" alt="">
    <h2>Exploring</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
    <a href="#">Read more...</a>
  </article>
  <article class=card>
    <img src="https://picsum.photos/300/200?random=3" alt="">
    <h2>CSS Subgrid</h2>
    <p>Id dolor laborum vitae. Enim ex ratione consectetur omnis consequuntur optio provident, possimus laborum nulla fugit</p>
    <a href="#">Read more...</a>
  </article>
  <article class=card>
    <img src="https://picsum.photos/300/200?random=5" alt="">
    <h2>Superpower</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
    <a href="#">Read more...</a>
  </article>
</main>
<script src="page3.js"></script>