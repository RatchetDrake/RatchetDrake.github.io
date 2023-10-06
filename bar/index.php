<?php
include 'config.php';
session_start();

$message = "";

if(isset($_POST['inscription'])) {
    $type_utilisateur = $_POST['type_utilisateur'];
    $carte_identite = $_POST['carte_identite'];
    $mot_de_passe = $_POST['mot_de_passe'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    switch($type_utilisateur) {
        case 'client':
            $stmt = $pdo->prepare("INSERT INTO clients (carte_identite, mot_de_passe, nom, prenom) VALUES (?, ?, ?, ?)");
            $stmt->execute([$carte_identite, $mot_de_passe, $nom, $prenom]);
            $_SESSION['client_id'] = $pdo->lastInsertId();
            header("Location: client.php");
            exit;
            break;
        case 'caissier':
            $stmt = $pdo->prepare("INSERT INTO caissiers (carte_identite, mot_de_passe, nom, prenom) VALUES (?, ?, ?, ?)");
            $stmt->execute([$carte_identite, $mot_de_passe, $nom, $prenom]);
            $_SESSION['caissier_id'] = $pdo->lastInsertId();
            header("Location: caissier.php");
            exit;
            break;
        case 'gerant':
            $stmt = $pdo->prepare("INSERT INTO gerants (carte_identite, mot_de_passe, nom, prenom) VALUES (?, ?, ?, ?)");
            $stmt->execute([$carte_identite, $mot_de_passe, $nom, $prenom]);
            $_SESSION['gerant_id'] = $pdo->lastInsertId();
            header("Location: gerant.php");
            exit;
            break;
    }

    $message = "Inscription réussie!";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar à Chats</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>

<!-- Header avec la navbar -->
<header>
    <nav>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Réservations</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header>

<div class="container">
    <!-- Afficher les messages -->
    <?php if(isset($message)): ?>
        <div class="message">
            <p><?php echo $message; ?></p>
        </div>
    <?php endif; ?>

    <!-- Formulaire d'inscription -->
    <form method="post">
        <label>Type d'utilisateur:</label>
        <select name="type_utilisateur">
            <option value="client">Client</option>
            <option value="caissier">Caissier</option>
            <option value="gerant">Gérant</option>
        </select><br>
        <label>Carte d'identité:</label> <input type="text" name="carte_identite" required><br>
        <label>Mot de passe:</label> <input type="password" name="mot_de_passe" required><br>
        <label>Nom (uniquement pour les clients):</label> <input type="text" name="nom"><br>
        <label>Prénom (uniquement pour les clients):</label> <input type="text" name="prenom"><br>
        <input type="submit" name="inscription" value="S'inscrire">
        <a href="connexion.php">Se connecter</a>
    </form>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2023 Bar à Chats. Tous droits réservés.</p>
</footer>

</body>
</html>
