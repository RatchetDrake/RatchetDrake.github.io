<?php
include 'config.php';

// Vérification de la session
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

$message = "";

if(isset($_POST['connexion'])) {
    if(isset($_POST['type_utilisateur']) && isset($_POST['carte_identite']) && isset($_POST['mot_de_passe'])) {
        $type_utilisateur = $_POST['type_utilisateur'];
        $carte_identite = $_POST['carte_identite'];
        $mot_de_passe = $_POST['mot_de_passe'];

        switch($type_utilisateur) {
            case 'client':
                $stmt = $pdo->prepare("SELECT * FROM clients WHERE carte_identite = ? AND mot_de_passe = ?");
                $stmt->execute([$carte_identite, $mot_de_passe]);
                $user = $stmt->fetch();
                if($user) {
                    $_SESSION['client_id'] = $user['client_id'];
                    header("Location: client.php");
                    exit;
                } else {
                    $message = "Erreur d'authentification!";
                }
                break;
            case 'caissier':
                $stmt = $pdo->prepare("SELECT * FROM caissiers WHERE carte_identite = ? AND mot_de_passe = ?");
                $stmt->execute([$carte_identite, $mot_de_passe]);
                $user = $stmt->fetch();
                if($user) {
                    $_SESSION['caissier_id'] = $user['caissier_id'];
                    header("Location: caissier.php");
                    exit;
                } else {
                    $message = "Erreur d'authentification!";
                }
                break;
            case 'gerant':
                $stmt = $pdo->prepare("SELECT * FROM gerants WHERE carte_identite = ? AND mot_de_passe = ?");
                $stmt->execute([$carte_identite, $mot_de_passe]);
                $user = $stmt->fetch();
                if($user) {
                    $_SESSION['gerant_id'] = $user['gerant_id'];
                    header("Location: gerant.php");
                    exit;
                } else {
                    $message = "Erreur d'authentification!";
                }
                break;
        }
    } else {
        $message = "Tous les champs sont requis!";
    }
}
?>

<!-- Afficher les messages -->
<?php if(isset($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<!-- Formulaire de connexion -->
<link rel="stylesheet" href="index.css">
<form method="post" action="connexion.php">
    <label for="type_utilisateur">Type d'utilisateur:</label>
    <select name="type_utilisateur" id="type_utilisateur">
        <option value="client">Client</option>
        <option value="caissier">Caissier</option>
        <option value="gerant">Gérant</option>
    </select><br>
    
    <label for="carte_identite">Carte d'identité:</label>
    <input type="text" name="carte_identite" id="carte_identite" required><br>
    
    <label for="mot_de_passe">Mot de passe:</label>
    <input type="password" name="mot_de_passe" id="mot_de_passe" required><br>
    
    <input type="submit" name="connexion" value="Se connecter">
</form>