<!DOCTYPE html>
<html>
<head>
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h2>Réinitialisation du mot de passe</h2>
        <form action="reset_password.php" method="post">
            <div class="form-group">
                <label for="resetToken">Jeton de réinitialisation :</label>
                <input type="text" id="resetToken" name="resetToken" class="input-field" required>
            </div>

            <div class="form-group">
                <label for="newPassword">Nouveau mot de passe :</label>
                <input type="password" id="newPassword" name="newPassword" class="input-field" required>
            </div>

            <input type="submit">

            <!-- Lien vers la page d'inscription -->
            <p>Pas encore de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
        </form>
    </div>
</body>
</html>
