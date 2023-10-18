<?php

include 'bdd.php';

// Vérification de l'ID passé en GET
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID non valide.');
}

$id = $_GET['id'];

// Si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "UPDATE annuaire SET 
                nom = :nom, 
                prenom = :prenom, 
                telephone = :telephone,
                profession = :profession,
                ville = :ville,
                codepostal = :codepostal,
                adresse = :adresse,
                date_de_naissance = :date_de_naissance,
                sexe = :sexe,
                description = :description
            WHERE id_annuaire = :id_annuaire";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':nom', $_POST['nom']);
    $stmt->bindParam(':prenom', $_POST['prenom']);
    $stmt->bindParam(':telephone', $_POST['telephone']);
    $stmt->bindParam(':profession', $_POST['profession']);
    $stmt->bindParam(':ville', $_POST['ville']);
    $stmt->bindParam(':codepostal', $_POST['codepostal']);
    $stmt->bindParam(':adresse', $_POST['adresse']);
    $stmt->bindParam(':date_de_naissance', $_POST['date_de_naissance']);
    $stmt->bindParam(':sexe', $_POST['sexe']);
    $stmt->bindParam(':description', $_POST['description']);
    $stmt->bindParam(':id_annuaire', $id);

    $stmt->execute();

    echo "Informations mises à jour avec succès!";
}

// Récupération des informations actuelles de l'utilisateur pour l'affichage initial
$sql = "SELECT * FROM annuaire WHERE id_annuaire = :id_annuaire";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_annuaire', $id);
$stmt->execute();
$user = $stmt->fetch();

if (!$user) {
    die('Utilisateur non trouvé.');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un utilisateur</title>
</head>
<body>
<form method="post">
    Nom: <input type="text" name="nom" value="<?= $user['nom'] ?>"><br>
    Prénom: <input type="text" name="prenom" value="<?= $user['prenom'] ?>"><br>
    Téléphone: <input type="text" name="telephone" value="<?= $user['telephone'] ?>"><br>
    Profession: <input type="text" name="profession" value="<?= $user['profession'] ?>"><br>
    Ville: <input type="text" name="ville" value="<?= $user['ville'] ?>"><br>
    Code Postal: <input type="text" name="codepostal" value="<?= $user['codepostal'] ?>"><br>
    Adresse: <input type="text" name="adresse" value="<?= $user['adresse'] ?>"><br>
    Date de Naissance: <input type="date" name="date_de_naissance" value="<?= $user['date_de_naissance'] ?>"><br>
    Sexe:<br>
    Homme: <input type="radio" name="sexe" value="h" <?= ($user['sexe'] === 'h') ? 'checked' : '' ?>><br>
    Femme: <input type="radio" name="sexe" value="f" <?= ($user['sexe'] === 'f') ? 'checked' : '' ?>><br>
    Description: <textarea name="description"><?= $user['description'] ?></textarea><br>
    <input type="submit" value="Mettre à jour">
</form>
<a href="formulaire.php">Retourner au formulaire</a>


</body>
</html>

