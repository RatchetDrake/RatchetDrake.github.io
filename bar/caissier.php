<?php
include 'config.php';
session_start();

if(!isset($_SESSION['caissier_id'])) { // Pour caissier.php
    header("Location: index.php");
    exit;
}


// Récupérer le nom du caissier connecté
$stmt = $pdo->prepare("SELECT nom FROM caissiers WHERE caissier_id = ?");
$stmt->execute([$_SESSION['caissier_id']]);
$user = $stmt->fetch();
$nom_utilisateur = $user['nom'];

?>

<!-- Affichage du nom de l'utilisateur et du bouton de déconnexion -->
<p>Bienvenue, <?php echo $nom_utilisateur; ?>! <a href="deconnexion.php">Se déconnecter</a></p>

<?php

// Ajouter une réservation de chat
if(isset($_POST['ajouter_reservation'])) {
    if(isset($_POST['client_id']) && isset($_POST['chat_id'])) {
        $client_id = $_POST['client_id'];
        $chat_id = $_POST['chat_id'];
        $heure_debut = $_POST['heure_debut'];
        $heure_fin = $_POST['heure_fin'];
        $statut = $_POST['statut'];
        $numero_table = $_POST['numero_table'];

        $stmt = $pdo->prepare("INSERT INTO reservations (client_id, chat_id, heure_debut, heure_fin, statut, numero_table) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$client_id, $chat_id, $heure_debut, $heure_fin, $statut, $numero_table]);
        $message = "Réservation ajoutée avec succès!";
    } else {
        $message = "Veuillez sélectionner un client et un chat.";
    }
}

// Modifier les horaires de réservation des chats et leur statut
if(isset($_POST['modifier_reservation']) && isset($_POST['reservation_id'])) {
    $reservation_id = $_POST['reservation_id'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $statut = $_POST['statut'];

    $stmt = $pdo->prepare("UPDATE reservations SET heure_debut = ?, heure_fin = ?, statut = ? WHERE reservation_id = ?");
    $stmt->execute([$heure_debut, $heure_fin, $statut, $reservation_id]);
    $message = "Réservation modifiée avec succès!";
}

// Liste des réservations pour modification
$reservations = $pdo->query("SELECT * FROM reservations")->fetchAll();

// Liste des clients pour la liste déroulante
$clients = $pdo->query("SELECT * FROM clients")->fetchAll();

// Liste des chats pour la liste déroulante
$chats = $pdo->query("SELECT * FROM chats")->fetchAll();
?>

<!-- Afficher les messages -->
<?php if(isset($message)): ?>
    <p><?php echo $message; ?></p>
<?php endif; ?>

<!-- Formulaire pour ajouter une réservation -->
<link rel="stylesheet" href="styles.css">
<form method="post">
    Client: <select name="client_id">
        <?php foreach($clients as $client): ?>
            <option value="<?php echo $client['client_id']; ?>"><?php echo $client['nom']; ?></option>
        <?php endforeach; ?>
    </select>
    Chat: <select name="chat_id">
        <?php foreach($chats as $chat): ?>
            <option value="<?php echo $chat['chat_id']; ?>"><?php echo $chat['description']; ?></option>
        <?php endforeach; ?>
    </select>
    Heure de début: <input type="datetime-local" name="heure_debut" required>
    Heure de fin: <input type="datetime-local" name="heure_fin" required>
    Statut: <select name="statut">
        <option value="en réservation">En réservation</option>
        <option value="en transfert">En transfert</option>
        <option value="disponible">Disponible</option>
        <option value="chez le vétérinaire">Chez le vétérinaire</option>
    </select>
    Numéro de table: <input type="number" name="numero_table" required>
    <input type="submit" name="ajouter_reservation" value="Ajouter">
</form>

<!-- Liste des réservations avec possibilité de modification -->
<table>
    <thead>
        <tr>
            <th>Client</th>
            <th>Chat</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
            <th>Statut</th>
            <th>Numéro de table</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($reservations as $reservation): ?>
            <tr>
                <td><?php echo $reservation['client_id']; ?></td>
                <td><?php echo $reservation['chat_id']; ?></td>
                <td><?php echo $reservation['heure_debut']; ?></td>
                <td><?php echo $reservation['heure_fin']; ?></td>
                <td><?php echo $reservation['statut']; ?></td>
                <td><?php echo $reservation['numero_table']; ?></td>
                <td>
                    <!-- Formulaire pour modifier la réservation -->
                    <form method="post">
                        <input type="hidden" name="reservation_id" value="<?php echo $reservation['reservation_id']; ?>">
                        Heure de début: <input type="datetime-local" name="heure_debut" value="<?php echo $reservation['heure_debut']; ?>">
                        Heure de fin: <input type="datetime-local" name="heure_fin" value="<?php echo $reservation['heure_fin']; ?>">
                        Statut: <select name="statut">
                            <option value="en réservation" <?php if($reservation['statut'] == 'en réservation') echo 'selected'; ?>>En réservation</option>
                            <option value="en transfert" <?php if($reservation['statut'] == 'en transfert') echo 'selected'; ?>>En transfert</option>
                            <option value="disponible" <?php if($reservation['statut'] == 'disponible') echo 'selected'; ?>>Disponible</option>
                            <option value="chez le vétérinaire" <?php if($reservation['statut'] == 'chez le vétérinaire') echo 'selected'; ?>>Chez le vétérinaire</option>
                        </select>
                        <input type="submit" name="modifier_reservation" value="Modifier">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
