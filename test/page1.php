<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenue sur notre site !</h2>

        <!-- Afficher le nom de l'utilisateur si connecté -->
        <?php
        session_start();

        // Vérifiez si l'utilisateur est connecté (si le nom est stocké dans la session)
        if (isset($_SESSION['nom'])) {
            echo '<div class="user-info">Bonjour, ' . htmlspecialchars($_SESSION['nom']) . '</div>';
        }
        ?>

        <div class="links">
            <a href="index.php" class="button">Page d'accueil</a>
            <a href="page2.php" class="button">Page 2</a>
            <a href="page3.php" class="button">Page 3</a>
        </div>

        <!-- Lien de déconnexion -->
        <a href="deconnexion.php" class="button">Se déconnecter</a>
    </div>
</body>
</html>