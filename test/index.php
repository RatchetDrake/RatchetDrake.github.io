<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'inscription et de connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Formulaire d'inscription et de connexion</h2>
    <div class="container">
        <select id="action" onchange="toggleForm()">
            <option value="inscription">Inscription</option>
            <option value="connexion">Connexion</option>
        </select>
        <div id="inscriptionForm" style="display: none;">
            <h3>Inscription</h3>
            <form action="inscription.php" method="post">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required><br><br>

                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required><br><br>

                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required><br><br>
                <label for="login_motdepasse">Mot de passe :</label>
                <input type="password" id="login_motdepasse" name="login_motdepasse" required><br><br>

                <input type="submit" value="S'inscrire">
            </form>
        </div>
        <div id="connexionForm" style="display: none;">
            <h3>Connexion</h3>
            <form action="connexion.php" method="post">
                <label for="login_email">Email :</label>
                <input type="email" id="login_email" name="login_email" required><br><br>

                <label for="login_motdepasse">Mot de passe :</label>
                <input type="password" id="login_motdepasse" name="login_motdepasse" required><br><br>

                <input type="submit" value="Se connecter">
            </form>
        </div>
    </div>
    <script>
        function toggleForm() {
            var action = document.getElementById("action").value;
            if (action === "inscription") {
                document.getElementById("inscriptionForm").style.display = "block";
                document.getElementById("connexionForm").style.display = "none";
            } else if (action === "connexion") {
                document.getElementById("inscriptionForm").style.display = "none";
                document.getElementById("connexionForm").style.display = "block";
            }
        }
    </script>
</body>
</html>
