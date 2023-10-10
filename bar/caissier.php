
<?php
// Assurez-vous que session_start() est appelé avant tout autre code PHP
session_start();

include 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caissier - Bar à Chats</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function updateSelects() {
            var clientSelect = document.getElementById("client_id");
            var caissierSelect = document.getElementById("caissier_id");
            var heureDebutInput = document.getElementById("heure_debut");
            var heureFinInput = document.getElementById("heure_fin");

            if (clientSelect.value !== "") {
                caissierSelect.value = "";
                updateStatutOptions("client");
            } else if (caissierSelect.value !== "") {
                clientSelect.value = "";
                updateStatutOptions("caissier");
            }

            // Vérifier l'heure de début et de fin
            var heureDebut = heureDebutInput.value;
            var heureFin = heureFinInput.value;

            if (heureDebut && heureFin && heureDebut >= heureFin) {
                alert("L'heure de début doit être inférieure à l'heure de fin.");
                heureDebutInput.value = "";
                heureFinInput.value = "";
            }
        }

        function updateSelects() {
            var clientSelect = document.getElementById("client_id");
            var caissierSelect = document.getElementById("caissier_id");
            var heureDebutInput = document.getElementById("heure_debut");
            var heureFinInput = document.getElementById("heure_fin");

            if (clientSelect.value !== "") {
                caissierSelect.value = "";
                updateStatutOptions("client");
            } else if (caissierSelect.value !== "") {
                clientSelect.value = "";
                updateStatutOptions("caissier");
            }

            // Vérifier l'heure de début et de fin
            var heureDebut = heureDebutInput.value;
            var heureFin = heureFinInput.value;

            if (heureDebut && heureFin) {
                var heureDebutLimite = new Date();
                heureDebutLimite.setHours(8, 0, 0); // Limite à 8h du matin

                var heureFinLimite = new Date();
                heureFinLimite.setHours(23, 59, 59); // Limite à 23h59

                var heureDebutChoisie = new Date("2023-10-06T" + heureDebut + ":00"); // Vous devez ajuster la date selon vos besoins
                var heureFinChoisie = new Date("2023-10-06T" + heureFin + ":00"); // Vous devez ajuster la date selon vos besoins

                if (heureDebutChoisie < heureDebutLimite || heureDebutChoisie >= heureFinLimite) {
                    alert("L'heure de début doit être entre 8h00 et 23h59.");
                    heureDebutInput.value = "";
                }

                if (heureFinChoisie <= heureDebutLimite || heureFinChoisie > heureFinLimite) {
                    alert("L'heure de fin doit être entre 8h00 et 23h59.");
                    heureFinInput.value = "";
                }
            }
        }

        function updateStatutOptions(reservationPour) {
            var statutSelect = document.getElementById("statut");

            // Supprimer toutes les options actuelles
            while (statutSelect.options.length > 0) {
                statutSelect.remove(0);
            }

            if (reservationPour === "caissier") {
                // Si la réservation est faite par le caissier, toutes les options de statut sont disponibles
                var options = ["En réservation", "En transfert", "Disponible", "Chez le vétérinaire"];
                for (var i = 0; i < options.length; i++) {
                    var option = document.createElement("option");
                    option.text = options[i];
                    option.value = options[i].toLowerCase().replace(/\s/g, "_");
                    statutSelect.add(option);
                }
            } else if (reservationPour === "client") {
                // Si la réservation est faite pour un client, seule l'option "Disponible" est disponible
                var option = document.createElement("option");
                option.text = "Disponible";
                option.value = "disponible";
                statutSelect.add(option);
            }
        }

        // Appeler la fonction pour initialiser les options de statut en fonction de la sélection initiale
        updateSelects();

        // Appeler la fonction updateStatutOptions() chaque fois que la page est chargée
        window.onload = function () {
            updateSelects();
        };

        // Utilisez JavaScript pour obtenir la date actuelle
        var currentDate = new Date();

        // Remplissez automatiquement le champ de date avec la date actuelle
        var dateInput = document.getElementById("date");
        dateInput.value = currentDate.toISOString().split('T')[0]; // Format de date AAAA-MM-JJ

        // Remplissez automatiquement le champ d'heure de début avec l'heure actuelle
        var heureDebutInput = document.getElementById("heure_debut");
        heureDebutInput.value = currentDate.toLocaleTimeString('en-GB', { hour: '2-digit', minute: '2-digit' });
    </script>
</head>

<body>
    <?php
    include 'config.php';

    if (!isset($_SESSION['caissier_id'])) { // Pour caissier.php
        header("Location: index.php");
        exit;
    }

    // Récupérer le nom du caissier connecté
    $stmt = $pdo->prepare("SELECT nom FROM caissiers WHERE caissier_id = ?");
    $stmt->execute([$_SESSION['caissier_id']]);
    $user = $stmt->fetch();
    $nom_utilisateur = $user['nom'];

    // Liste des caissiers pour la liste déroulante
    $caissiers = $pdo->query("SELECT * FROM caissiers")->fetchAll();

    // Ajouter une réservation de chat
    if (isset($_POST['ajouter_reservation'])) {
        if (isset($_POST['chat_id'])) {
            $chat_id = $_POST['chat_id'];
            $caissier_id = !empty($_POST['caissier_id']) ? $_POST['caissier_id'] : null; // Gérer le caissier_id
            $heure_debut = $_POST['date'] . ' ' . $_POST['heure_debut'];
            $heure_fin = $_POST['date'] . ' ' . $_POST['heure_fin'];
            $statut = $_POST['statut'];
            $numero_table = $_POST['numero_table'];
            $client_id = !empty($_POST['client_id']) ? $_POST['client_id'] : null; // Gérer le client_id

            // Vérifier si le chat est disponible pour la période sélectionnée
            $stmt = $pdo->prepare("SELECT * FROM reservations WHERE chat_id = ? AND (heure_debut <= ? AND heure_fin >= ?) AND statut != 'disponible'");
            $stmt->execute([$chat_id, $heure_fin, $heure_debut]);
            $existing_reservation = $stmt->fetch();

            if (!$existing_reservation) {
                $stmt = $pdo->prepare("INSERT INTO reservations (client_id, chat_id, caissier_id, heure_debut, heure_fin, statut, numero_table) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$client_id, $chat_id, $caissier_id, $heure_debut, $heure_fin, $statut, $numero_table]);
                $message = "Réservation ajoutée avec succès!";
            } else {
                $message = "Le chat n'est pas disponible pour cette période.";
            }
        } else {
            $message = "Veuillez sélectionner un chat.";
        }
    }

    // Modifier les horaires de réservation des chats et leur statut
    if (isset($_POST['modifier_reservation']) && isset($_POST['reservation_id'])) {
        $reservation_id = $_POST['reservation_id'];
        $heure_debut = $_POST['date'] . ' ' . $_POST['heure_debut'];
        $heure_fin = $_POST['date'] . ' ' . $_POST['heure_fin'];
        $statut = $_POST['statut'];

        $stmt = $pdo->prepare("UPDATE reservations SET heure_debut = ?, heure_fin = ?, statut = ? WHERE reservation_id = ?");
        $stmt->execute([$heure_debut, $heure_fin, $statut, $reservation_id]);
        $message = "Réservation modifiée avec succès!";
    }

    // Supprimer une réservation de chat
    if (isset($_POST['supprimer_reservation']) && isset($_POST['reservation_id'])) {
        $reservation_id = $_POST['reservation_id'];

        $stmt = $pdo->prepare("DELETE FROM reservations WHERE reservation_id = ?");
        $stmt->execute([$reservation_id]);

        $message = "Réservation supprimée avec succès!";
    }

    // Liste des réservations pour modification
    $reservations = $pdo->query("SELECT reservations.*, clients.nom AS nom_client, chats.nom AS nom_chat, caissiers.nom AS nom_caissier FROM reservations
                            LEFT JOIN clients ON reservations.client_id = clients.client_id
                            LEFT JOIN chats ON reservations.chat_id = chats.chat_id
                            LEFT JOIN caissiers ON reservations.caissier_id = caissiers.caissier_id")->fetchAll();

    // Liste des clients pour la liste déroulante
    $clients = $pdo->query("SELECT * FROM clients")->fetchAll();

    // Liste des chats pour la liste déroulante
    $chats = $pdo->query("SELECT * FROM chats")->fetchAll();
    ?>

    <!-- Affichage du nom de l'utilisateur et du bouton de déconnexion -->
    <p>Bienvenue, <?php echo $nom_utilisateur; ?>! <a href="deconnexion.php">Se déconnecter</a></p>

    <!-- Afficher les messages -->
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <!-- Formulaire pour ajouter une réservation -->
    <form method="post">
        <?php if ($_SESSION['caissier_id']) : ?>
            Caissier: <select name="caissier_id" id="caissier_id" onchange="updateSelects()">
                <option value="">Sélectionner un caissier</option>
                <?php foreach ($caissiers as $caissier) : ?>
                    <option value="<?php echo $caissier['caissier_id']; ?>"><?php echo $caissier['nom']; ?></option>
                <?php endforeach; ?>
            </select>
        <?php endif; ?>
        Client: <select name="client_id" id="client_id" onchange="updateSelects()">
            <option value="">Sélectionner un client</option>
            <?php foreach ($clients as $client) : ?>
                <option value="<?php echo $client['client_id']; ?>"><?php echo $client['nom']; ?></option>
            <?php endforeach; ?>
        </select>
        Chat: <select name="chat_id">
            <?php foreach ($chats as $chat) : ?>
                <option value="<?php echo $chat['chat_id']; ?>"><?php echo $chat['nom']; ?></option>
            <?php endforeach; ?>
        </select>
        Date: <input type="date" name="date" id="date" required>
        Heure de début: <input type="time" name="heure_debut" id="heure_debut" required>
        Heure de fin: <input type="time" name="heure_fin" required>
        Statut: <select name="statut" id="statut">
            <!-- Options de statut générées dynamiquement en fonction de la sélection de "Réservation pour" -->
        </select>
        Numéro de table: <input type="number" name="numero_table" required>
        <input type="submit" name="ajouter_reservation" value="Ajouter">
    </form>

    <!-- Liste des réservations avec possibilité de modification et suppression -->
    <table>
        <thead>
            <tr>
                <th>Participant</th>
                <th>Caissier</th>
                <th>Chat</th>
                <th>Date</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Statut</th>
                <th>Numéro de table</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation) : ?>
                <tr>
                    <td><?php echo isset($reservation['nom_caissier']) ? $reservation['nom_caissier'] : $reservation['nom_client']; ?></td>
                    <td><?php echo $reservation['nom_caissier']; ?></td>
                    <td><?php echo $reservation['nom_chat']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($reservation['heure_debut'])); ?></td>
                    <td><?php echo date("H:i", strtotime($reservation['heure_debut'])); ?></td>
                    <td><?php echo date("H:i", strtotime($reservation['heure_fin'])); ?></td>
                    <td><?php echo $reservation['statut']; ?></td>
                    <td><?php echo $reservation['numero_table']; ?></td>
                    <td>
                        <!-- Formulaire pour modifier et supprimer la réservation -->
                        <form method="post">
                            <input type="hidden" name="reservation_id" value="<?php echo $reservation['reservation_id']; ?>">
                            Date: <input type="date" name="date" value="<?php echo date("Y-m-d", strtotime($reservation['heure_debut'])); ?>" required>
                            Heure de début: <input type="time" name="heure_debut" value="<?php echo date("H:i", strtotime($reservation['heure_debut'])); ?>" required>
                            Heure de fin: <input type="time" name="heure_fin" value="<?php echo date("H:i", strtotime($reservation['heure_fin'])); ?>" required>
                            Statut: <select name="statut" id="statut">
                                <!-- Options de statut générées dynamiquement en fonction de la sélection de "Réservation pour" -->
                            </select>
                            <input type="submit" name="modifier_reservation" value="Modifier">
                            <!-- Ajout du bouton de suppression -->
                            <input type="submit" name="supprimer_reservation" value="Supprimer">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
