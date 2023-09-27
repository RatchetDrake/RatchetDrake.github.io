<!DOCTYPE html>
<html>
<head>
    <title>Réinitialisation du mot de passe</title>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <style>
        .error-message, .success-message {
            text-align: center;
            margin-bottom: 10px;
        }

        .error-message {
            color: red;
        }

        .success-message {
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Réinitialisation du mot de passe</h2>

        <form action="reset_password.php" method="post">
            <label for="identifier">E-mail ou Pseudo :</label>
            <input type="text" id="identifier" name="identifier" required>
            <br><br>

            <label for="login_motdepasse">Nouveau mot de passe :</label>
            <div class="password-input">
                <input type="password" id="login_motdepasse" name="login_motdepasse" required>
                <span class="password-toggle" onclick="togglePassword('login_motdepasse')">👁️</span>
            </div>

            <!-- Afficher les messages d'erreur ici -->
            <?php
                if (isset($error_message)) {
                    echo "<div class='error-message'>$error_message</div>";
                }
            ?>

            <!-- Afficher les messages de succès ici -->
            <?php
                if (isset($success_message)) {
                    echo "<div class='success-message'>$success_message</div>";
                }
            ?>

            <!-- Déplacer le bouton à la fin -->
            <br><br>
            <input type="submit" value="Réinitialiser le mot de passe">
        </form>

        <!-- Liens pour rediriger vers la page d'inscription et la page de connexion -->
        <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
        <p>Déjà un compte ? <a href="connexion.php">Connectez-vous ici</a>.</p>
    </div>

    <script>
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>
