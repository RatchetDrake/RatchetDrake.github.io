<!DOCTYPE html>
<html>
<head>
    <title>Page d'accueil</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap">
</head>
<body>
    <div class="user-info">
        <?php
        session_start();

        // Vérifiez si l'utilisateur est connecté (si le nom est stocké dans la session)
        if (isset($_SESSION['nom'])) {
            echo 'Bonjour, ' . htmlspecialchars($_SESSION['nom']);
            echo ' - <a href="deconnexion.php" class="button">Se déconnecter</a>';
        }
        ?>
    </div>

    <div class="container">
        <h2>Bienvenue sur notre site !</h2>
        <!-- Contenu du conteneur -->
    </div>

    <nav class="nav-links">
        <a href="page1.php">Page 1</a>
        <a href="page2.php">Page 2</a>
        <a href="page3.php">Page 3</a>
    </nav>
</body>
</html>
