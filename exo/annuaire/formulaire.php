<?php
include 'bdd.php';

$nom = $prenom = $telephone = $profession = $ville = $codepostal = $adresse = $date_de_naissance = $sexe = $description = "";
$telephone_error = $codepostal_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $profession = $_POST['profession'];
    $ville = $_POST['ville'];
    $codepostal = $_POST['codepostal'];
    $adresse = $_POST['adresse'];
    $date_de_naissance = $_POST['date_de_naissance'];
    $sexe = $_POST['sexe'];
    $description = $_POST['description'];

    // Validation du numéro de téléphone (seulement des chiffres)
    if (!preg_match("/^[0-9]+$/", $telephone)) {
        $telephone_error = "Le numéro de téléphone doit contenir uniquement des chiffres.";
    }

    // Validation du code postal (seulement des chiffres)
    if (!preg_match("/^[0-9]+$/", $codepostal)) {
        $codepostal_error = "Le code postal doit contenir uniquement des chiffres.";
    }

    if (empty($telephone_error) && empty($codepostal_error)) {
        $sql = "INSERT INTO annuaire (nom, prenom, telephone, profession, ville, codepostal, adresse, date_de_naissance, sexe, description)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $telephone, $profession, $ville, $codepostal, $adresse, $date_de_naissance, $sexe, $description]);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>
<form action="formulaire.php" method="post">
    Nom: <input type="text" name="nom"><br>
    Prénom: <input type="text" name="prenom"><br>
    Téléphone: <input type="text" name="telephone">
    <span class="error"><?php echo $telephone_error; ?></span><br>
    Profession: <input type="text" name="profession"><br>
    Ville: <input type="text" name="ville"><br>
    Code Postal: <input type="text" name="codepostal">
    <span class="error"><?php echo $codepostal_error; ?></span><br>
    Adresse: <input type="text" name="adresse"><br>
    Date de Naissance: <input type="date" name="date_de_naissance"><br>
    Sexe: 
    Homme: <input type="radio" name="sexe" value="h">
    Femme: <input type="radio" name="sexe" value="f"><br>
    Description: <textarea name="description"></textarea><br>
    <input type="submit" value="Enregistrement">
    <a href="list.php">Voir la liste des entrées</a>
</form>
</body>
</html>
