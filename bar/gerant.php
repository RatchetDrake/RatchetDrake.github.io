<?php
include 'config.php';
session_start();

if(!isset($_SESSION['gerant_id'])) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT nom FROM gerants WHERE gerant_id = ?");
$stmt->execute([$_SESSION['gerant_id']]);
$user = $stmt->fetch();
$nom_utilisateur = $user['nom'];

$message = "";

// Fonction pour générer un numéro de puce aléatoire
function generateRandomPuceNumber() {
    return sprintf('%015d', mt_rand(1, 999999999999999));
}

// Ajouter un chat au stock d'un bar
if(isset($_POST['ajouter_chat'])) {
    $numero_puce = $_POST['numero_puce'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];
    $bar_id = $_POST['bar_id'];

    if(strlen($numero_puce) != 15) {
        $message = "Le numéro de puce doit comporter 15 chiffres.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO chats (numero_puce, nom, description, image_url, bar_id) VALUES (?, ?, ?, ?, ?)");
        if($stmt->execute([$numero_puce, $nom, $description, $image_url, $bar_id])) {
            $message = "Chat ajouté avec succès!";
        } else {
            $message = "Erreur lors de l'ajout du chat.";
        }
    }
}

// Modifier la description d'un chat
if(isset($_POST['modifier_description'])) {
    $chat_id = $_POST['chat_id'];
    $new_description = $_POST['new_description'];

    $stmt = $pdo->prepare("UPDATE chats SET description = ? WHERE chat_id = ?");
    if($stmt->execute([$new_description, $chat_id])) {
        $message = "Description modifiée avec succès!";
    } else {
        $message = "Erreur lors de la modification de la description.";
    }
}

// Supprimer un chat du stock
if(isset($_POST['supprimer_chat'])) {
    $chat_id = $_POST['chat_id'];

    $stmt = $pdo->prepare("DELETE FROM chats WHERE chat_id = ?");
    if($stmt->execute([$chat_id])) {
        $message = "Chat supprimé avec succès!";
    } else {
        $message = "Erreur lors de la suppression du chat.";
    }
}

// Ajouter un bar à sa liste
if(isset($_POST['ajouter_bar'])) {
    $enseigne = $_POST['enseigne'];
    $adresse = $_POST['adresse'];

    $stmt = $pdo->prepare("INSERT INTO bars (enseigne, adresse) VALUES (?, ?)");
    if($stmt->execute([$enseigne, $adresse])) {
        $message = "Bar ajouté avec succès!";
    } else {
        $message = "Erreur lors de l'ajout du bar.";
    }
}

// Récupérer la liste des bars pour le formulaire
$bars = $pdo->query("SELECT * FROM bars")->fetchAll();

// Récupérer la liste des chats pour les formulaires de modification et de suppression
$chats = $pdo->query("SELECT * FROM chats")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des bars et chats</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <p>Bienvenue, <?php echo $nom_utilisateur; ?>! <a href="deconnexion.php">Se déconnecter</a></p>

    <?php if(!empty($message)): ?>
        <div class="message">
            <p><?php echo $message; ?></p>
        </div>
    <?php endif; ?>

    <div class="form-container">
        <!-- Section pour gérer les bars -->
        <div class="form-section">
            <h2>Gestion des bars</h2>
            <h3>Ajouter un bar</h3>
            <form method="post">
                Enseigne: <input type="text" name="enseigne" required>
                Adresse: <textarea name="adresse"></textarea>
                <input type="submit" name="ajouter_bar" value="Ajouter">
            </form>
        </div>

        <!-- Section pour gérer les chats -->
        <div class="form-section">
            <h2>Gestion des chats</h2>
            <h3>Ajouter un chat</h3>
            <form method="post">
                Numéro de puce: <input type="text" name="numero_puce" value="<?php echo generateRandomPuceNumber(); ?>" required readonly>
                Nom: <input type="text" name="nom" required>
                Description: <textarea name="description"></textarea>
                Image URL: <input type="text" name="image_url" required>
                Bar: <select name="bar_id">
                    <?php foreach($bars as $bar): ?>
                        <option value="<?php echo $bar['bar_id']; ?>"><?php echo $bar['enseigne']; ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" name="ajouter_chat" value="Ajouter">
            </form>

            <!-- Formulaire pour modifier la description d'un chat -->
            <details>
                <summary>Modifier la description d'un chat</summary>
                <form method="post">
                    Chat: <select name="chat_id">
                        <?php foreach($chats as $chat): ?>
                            <option value="<?php echo $chat['chat_id']; ?>"><?php echo $chat['description']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    Nouvelle description: <textarea name="new_description"></textarea>
                    <input type="submit" name="modifier_description" value="Modifier">
                </form>
            </details>

            <!-- Formulaire pour supprimer un chat -->
            <details>
                <summary>Supprimer un chat</summary>
                <form method="post">
                    Chat: <select name="chat_id">
                        <?php foreach($chats as $chat): ?>
                            <option value="<?php echo $chat['chat_id']; ?>"><?php echo $chat['description']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="submit" name="supprimer_chat" value="Supprimer">
                </form>
            </details>
        </div>
    </div>
</div>
</body>
</html>
