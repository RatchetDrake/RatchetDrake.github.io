<?php
require_once('../db.php')

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ATM</title>
    <link rel="stylesheet" href="atm.css">
</head>
<body>
    <a href="index.php">Page D'accueil</a>
    <a href="inscription.php">Inscription</a>
    <section>
        <form action="" method="post">
            <span class="num" id="texte">            
                <input type="text" name="username" id="username">
                <input type="password" name="number" id=invisible readonly>
                <input type="text" id='affiche' readonly>
            </span>
            <div class="num">1</div>
            <div class="num">2</div>
            <div class="num">3</div>            
            <div class="num" id="reject">Decliner<p class="red"></p></div>
            <div class="num">4</div>
            <div class="num">5</div>
            <div class="num">6</div>            
            <div class="num" id="erase">Effacer<p class="yellow"></p></div>
            <div class="num">7</div>
            <div class="num">8</div>
            <div class="num">9</div>            
            <button type="submit" class="num">Entrez<p class="green"></p></button>
            <div class="num"id='calcul-'>-</div>
            <div class="num">0</div>
            <div class="num" id='caclul+'>+</div>
        </form>
    </section>

    <?php 

        if (isset($_POST) && !empty($_POST)) {
            // echo '<pre>'; var_dump($_POST); echo '</pre>'; 
            $select = $bdd->prepare('SELECT code FROM atm WHERE code=? and username=?');
            $select->execute(array(
                sha1($_POST['number']),
                $_POST['username']
            ));
            $select = $select->fetchAll();
            if (count($select) > 0) 
                echo '<script> alert("Le code est bon") </script>';
            else 
                echo "<script> alert('Le code n\'est pas bon') </script>";
        }
    ?>

    <script>
        
        var button = document.getElementsByClassName('num')

        for (let index = 0; index < button.length; index++) {
            if (button[index].id.length > 0 || button[index].type == 'submit') continue
            button[index].addEventListener('click', function() {
                var input = document.getElementById('affiche')
                var span = document.getElementById('invisible')
                if (input.value.length == 4) {
                    input.value = ""
                    span.value = ""
                    return
                }
                span.value += button[index].innerHTML
                input.value += '*'
            })
        }
        function Stop() {
            document.getElementById('affiche').value = ''
            document.getElementById('invisible').value = ''
        }
        document.getElementById('reject').addEventListener('click', Stop)
        document.getElementById('erase').addEventListener('click', Stop)

    </script>

    <!-- 
        Faite un formulaire qui va permettre d'inscrire de nouveau code 
        dans la base de donnée vous devez mettre le nom et prénom et aussi utilisateur
        Si le nom de la personne est déja existant il n'y pas possible d'être intégrer                
     -->
</body>
</html><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../style/connexion.css">
</head>
<body>
    <form action="" method="post">
        <pre>
            <label for="username">Pseudo :</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
            <input type="submit" value="Se connecter">
            <a href="./forgotpassword.php">Mot de passe oublié ?</a>
            <a href="./register.php">Vous n'avez pas de compte ?</a>
        </pre>
    </form>
    <?php 
    if (isset($_POST) && !empty($_POST)) {
        $select = $bdd->prepare('SELECT * FROM users WHERE (username=:login OR email=:login) AND password=:pass');
        $select->execute(array(
            'login' => $_POST['username'],
            'pass' => sha1($_POST['password'])
        ));
        $select = $select->fetch(PDO::FETCH_ASSOC);
        if (!empty($select)) {
            if ($select['confirm']) {
                $_SESSION = $select;
                header('Location: index.php');
            } else 
            echo "<script> alert('Le l\'adresse mail n'est pas vérifier') </script>";
        } else
            echo "<script> alert('Le mot de passe ou le pseudo n\'est pas bon') </script>";
    }
    ?>
</body>
</html>