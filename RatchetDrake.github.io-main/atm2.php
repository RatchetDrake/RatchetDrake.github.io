<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription de nouveaux codes</title>
</head>
<body>
  <h1>Inscription de nouveaux codes</h1>
  <form action="" method="post" onsubmit="return validateForm()">
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required><br>
    
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom" name="prenom" required><br>

    <label for="code">Code :</label>
    <input type="text" id="code" name="code" required><br>

    <button type="submit">Valider</button>
  </form>

  <script>
    function validateForm() {
      const nom = document.getElementById('nom').value;
      const prenom = document.getElementById('prenom').value;

      // Faire une requête AJAX pour vérifier l'unicité du nom et prénom
      // Si le nom et le prénom existent déjà, renvoyer false et empêcher la soumission
      // Sinon, renvoyer true pour permettre la soumission du formulaire
      // Exemple de requête AJAX :
      // ...
      
      return true; // Temporaire pour l'exemple
    }
  </script>

  <?php
  // Établissez votre connexion à la base de données
  $servername = "localhost";
  $username = "RatchetDrake";
  $password = "Azerty";
  $dbname = "cours";  // Nom de la base de données

  // Créez la connexion
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Vérifiez la connexion
  if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $code = $_POST['code'];

    // Vérifiez l'unicité du nom et prénom dans la base de données
    $sql = "SELECT * FROM atm2 WHERE nom='$nom' AND prenom='$prenom'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Le nom et le prénom existent déjà, empêchez l'ajout du nouvel enregistrement
      echo "Le nom et le prénom existent déjà dans la base de données.";
    } else {
      // Ajoutez le nouvel enregistrement dans la base de données
      $sql = "INSERT INTO atm2 (nom, prenom, code) VALUES ('$nom', '$prenom', '$code')";
      if ($conn->query($sql) === TRUE) {
        echo "Nouvel enregistrement ajouté avec succès.";
      } else {
        echo "Erreur lors de l'ajout de l'enregistrement : " . $conn->error;
      }
    }
  }
  if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
} else {
    echo "Connexion réussie !";
}

  $conn->close();
  ?>
</body>
</html>
