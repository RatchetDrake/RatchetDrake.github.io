<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <title>Modifier un bateau</title>
    <style>
        form {
            width: 15%;
            margin: 220px auto 0;
            border: 1px solid lightgray;
            border-radius: 15px;
            padding: 35px;
        }

    </style>
</head>
<body>
    <?php
        $_GET['id'] = $_POST['update'];
        require_once("../Controllers/read_ctrl.php");
    ?>
    <form action="../Controllers/update_ctrl.php" method="POST" class="form">
        <div class="mb-3">
            <label for="IDbat" class="form-label">ID du bateau : </label>
            <input type="text" class="form-control" name="id" value="<?php echo $ListBateau[0]['id'] ?>">
        </div>
        <div class="mb-3">
            <label for="nomBat" class="form">Nom du bateau : </label>
            <input type="text" class="form-control" name="nom" value="<?php echo $ListBateau[0]['nom'] ?>">
        </div>
        
        <div class="mb-3">
            <label for="modeleBat" class="form-label">Modèle du bateau : </label>
            <input type="text" class="form-control" name="modele" value="<?php echo $ListBateau[0]['modele'] ?>">
        </div>
        <div class="mb-3">
            <label for="tailleBat" class="form-label">Taille du bateau : </label>
            <input type="text" class="form-control" name="taille" value="<?php echo $ListBateau[0]['taille'] ?>">
        </div>
        <div class="mb-3">
            <label for="ownerBat" class="form-label">Propriétaire du bateau : </label>
            <input type="text" class="form-control" name="owner" value="<?php echo $ListBateau[0]['proprietaire'] ?>">
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</body>
</html>