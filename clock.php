<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horloge</title>
    <link rel="stylesheet" href="./style2.css">
</head>
<body>
<script>
    var temps_attente = <?php echo $temps_attente; ?>;
    
    function updateTimer() {
        var temps_actuel = Math.floor(Date.now() / 1000);
        var temps_restant = temps_attente - temps_actuel;
    
        if (temps_restant <= 0) {
            document.body.innerHTML += "La minuterie s'est déclenchée !";
        } else {
            var minutes = Math.floor(temps_restant / 60);
            var secondes = temps_restant % 60;
            document.body.innerHTML += "Temps restant : " + minutes + " min " + secondes + " sec";
            setTimeout(updateTimer, 1000);
        }
    }
    
    updateTimer();
    </script>

  
    <form action="" method="post">   
    <label for="date"><br></label>
            <input type="date" name="date" id="date">
            
    
        <label for="heure"><br></label>
            <input type="time" name="heure" id="heure">
       
        <br><br>
        <input type="submit" value="Submit">

       
    </form>
<?php
date_default_timezone_set('Europe/Paris');
    if(isset($_POST) && empty($_POST)){ 
        $jour=date("d");
        $mois=date("m");
        $annee=date("Y");
        $heure=date("H");
        $minute=date("i");
        echo "Nous somme le $jour/$mois/$annee et il est $heure:$minute"."<br>";

        

      
    }else{echo"nous somme le :".$_POST['date'] 
        ."<br> et il est ".$_POST['heure']."<br>";

    }
    
    ?>

    <p id="minuteur">00:00:00</p>
    <form action="" method="post">
        <label for="heure">Heure(s) :</label>
        <input type="number" name="heure" id="heure" value="0" min="0"lenght="2" >  
        <label for="minute">Minute(s) :</label>
        <input type="number" name="minute" id="minute" value="0" min="0" max="59" lenght="2">
        <label for="seconde">Seconde(s) :</label>
        <input type="number" name="seconde" id="seconde"value="15" min="0" max="59" lenght="2">
        <input type="submit" value="Submit">

    </form>
    <?php
    
    echo'<script>
    var heure = '.(!empty( $_POST["heure"])?$_POST["heure"]:'0').'
    var minute =  '.(!empty( $_POST["minute"])?$_POST["minute"]:'0').'
    var seconde =  '.(!empty( $_POST["seconde"])?$_POST["seconde"]:'15').'
    setInterval(function(){
        document.getElementById("minuteur").innerHTML=
        `${(heure<10 ? "0":"")+heure}:${(minute<10 ?"0":"")+minute}
        :${(seconde<10 ?"0":"")+seconde}`
        if(seconde<=0) return
        seconde--
        if(seconde==0){
            if(minute>0){
                seconde = 59
                minute--
            }else{
                if(heure>0){
                    heure--
                    minute==59
                    seconde=59
                }
            }
        }
        heure = parseInt(mili /1000/60/60)
        minute = parseInt(mili /1000/60/60)
        seconde= parseInt(mili /1000)
        console.log(heure, minute, seconde)
                  
    }, 1000)

</script>';
 
    ?>
    



</body>
</html>