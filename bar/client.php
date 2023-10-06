<?php
include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['client_id'])) {
    header("Location: index.php");
    exit;
}

// Récupérer le nom de l'utilisateur connecté
$stmt = $pdo->prepare("SELECT nom FROM clients WHERE client_id = ?");
$stmt->execute([$_SESSION['client_id']]);
$user = $stmt->fetch();
$nom_utilisateur = $user['nom'];

$message = "";

// Authentification du client
if (isset($_POST['connexion'])) {
    $carte_identite = $_POST['carte_identite'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $stmt = $pdo->prepare("SELECT * FROM clients WHERE carte_identite = ? AND mot_de_passe = ?");
    $stmt->execute([$carte_identite, $mot_de_passe]);
    $client = $stmt->fetch();

    if ($client) {
        $_SESSION['client_id'] = $client['client_id'];
        $message = "Connexion réussie!";
    } else {
        $message = "Erreur d'authentification!";
    }
}

// Réserver un chat
if (isset($_POST['reserver_chat']) && isset($_SESSION['client_id'])) {
    $chat_id = $_POST['chat_id'];
    $heure_debut = $_POST['heure_debut'];
    $heure_fin = $_POST['heure_fin'];
    $numero_table = $_POST['numero_table'];

    $stmt = $pdo->prepare("INSERT INTO reservations (client_id, chat_id, heure_debut, heure_fin, statut, numero_table) VALUES (?, ?, ?, ?, 'en réservation', ?)");
    $stmt->execute([$_SESSION['client_id'], $chat_id, $heure_debut, $heure_fin, $numero_table]);
    $message = "Réservation effectuée avec succès!";
}

// Liste des chats disponibles
$chats = $pdo->query("SELECT * FROM chats")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client - Bar à Chats</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="center-container">
        <!-- Affichage du nom de l'utilisateur et du bouton de déconnexion -->
        <p>Bienvenue, <?php echo $nom_utilisateur; ?>! <a href="deconnexion.php">Se déconnecter</a></p>

        <!-- Afficher les messages -->
        <?php if (isset($message)) : ?>
            <p><?php echo $message; ?></p>
        <?php endif; ?>

        <?php if (isset($_SESSION['client_id'])) : ?>
            <!-- Formulaire pour ajouter une réservation -->
            <form method="post" class="centered-form">
                Chat: <select name="chat_id">
                    <?php foreach ($chats as $chat) : ?>
                        <option value="<?php echo $chat['chat_id']; ?>"><?php echo $chat['nom']; ?></option>
                    <?php endforeach; ?>
                </select>
                Heure de début: <input type="datetime-local" name="heure_debut" required>
                Heure de fin: <input type="datetime-local" name="heure_fin" required>
                Numéro de table: <input type="number" name="numero_table" required>
                <input type="submit" name="reserver_chat" value="Réserver">
            </form>
        <?php endif; ?>

        <!-- Liste des chats disponibles -->
        <table class="centered-table">

            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>Numéro de puce</th>
                        <th>Description</th>
                        <th>Bar</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($chats as $chat) : ?>
                        <tr>
                            <td><?php echo $chat['nom']; ?></td>
                            <td><img src="<?php echo $chat['image_url']; ?>" alt="<?php echo $chat['nom']; ?>" width="100" class="clickable-img"></td>
                            <td><?php echo $chat['numero_puce']; ?></td>
                            <td><?php echo $chat['description']; ?></td>
                            <td><?php echo $chat['bar_id']; ?></td>
                            <td>
                                <!-- Formulaire pour réserver un chat -->
                                <form method="post">
                                    <input type="hidden" name="chat_id" value="<?php echo $chat['chat_id']; ?>">
                                    <input type="submit" name="reserver_chat" value="Réserver">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </table>
    </div>
    <!-- Modal pour afficher l'image agrandie -->
    <div id="myModal" class="modal">
        <img class="modal-content" id="img01">
    </div>

    <style>
        /* Styles pour la modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }
    </style>

    <script>
        // Récupère la modal
        var modal = document.getElementById("myModal");

        // Récupère l'image et insère-la dans la modal
        var modalImg = document.getElementById("img01");

        // Lorsque l'utilisateur clique sur l'image, ouvre la modal
        document.addEventListener('click', function(e) {
            if (e.target.className === 'clickable-img') {
                modal.style.display = "block";
                modalImg.src = e.target.src;
            }
        });

        // Lorsque l'utilisateur clique sur l'image agrandie ou en dehors, ferme la modal
        modal.onclick = function() {
            modal.style.display = "none";
        }
    </script>

</body>

</html>