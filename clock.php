<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horloge</title>
</head>
<body>
    <!-- faite une horloge sois numérique 
    sois analogique on doit pouvoir changer l'heure
avec un formulaire -->
    <?php
    date_default_timezone_set("Europe/Paris");
    $jour=date("d");
    $mois=date("m");
    $annee=date("Y");
    $heure=date("H");
    $min=date("i");
    echo"nous somme le :".$jour."/".$mois."/".$annee 
    ."<br> et il est ".$heure.":".$min
    
    
    ?>
    <form action="" method="post">        
    
    <label for="Yname" class="texte">Your name<br> </label>
        <input type="text" name="Yname" id="Yname">
        <br><br>
    
        <label for="Ymail" class="texte3">Your mail:<br></label>
            <input type="email" name="Ymail" id="Ymail">
        <br><br>
        <label for="Ymessage" class="texte3">Your message<br></label>
        <textarea name="Ymessage" id="Ymessage" cols="30" rows="10"></textarea>
        <br><br>
        <label for="number" class="texte3">Give me a number !<br></label>
            <input type="text" name="number" id="number">
       
        <br><br>
        <input type="submit" value="Submit">

       
    </form>
</body>
</html>