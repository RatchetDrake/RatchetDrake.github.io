<!DOCTYPE html>
<html>
<head>
    <title>Minuterie</title>
</head>
<body>
    <?php
    // Temps en secondes pour la minuterie
    $temps_attente = 1; // Par exemple, 60 secondes (1 minute)

    // Temps actuel
    $temps_actuel = time();

    // Temps de déclenchement de la minuterie
    $temps_declenchement = $temps_actuel + $temps_attente;

    // Vérifiez si la minuterie s'est écoulée
    if ($temps_actuel >= $temps_declenchement) {
        echo "La minuterie s'est déclenchée !";
    } else {
        $temps_restant = $temps_declenchement - $temps_actuel;
        $minutes = floor($temps_restant / 60);
        $secondes = $temps_restant % 60;
        echo "Temps restant : $minutes min $secondes sec";
    }
    ?>
</body>
</html>
