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
<!--  
    <p id="minuteur">00:00:00</p>
    <form action="" method="post">
        <label for="heure">Heure(s) :</label>
        <input type="number" name="heure" id="heure" value="0" min="0"lenght="2" >  
        <label for="minute">Minute(s) :</label>
        <input type="number" name="minute" id="minute" value="0" min="0" max="59" lenght="2">
        <label for="seconde">Seconde(s) :</label>
        <input type="number" name="seconde" id="seconde"value="15" min="0" max="59" lenght="2">
        <input type="submit" value="Submit">
         <button type="button" id="pause" onclick="PauseTimer()">Pause</button>
    <button type="button" id="play">Play</button>

    </form>
   
    <?php
    
    /* echo'<script>
    var heure = '.(!empty( $_POST["heure"])?$_POST["heure"]:'0').'
    var minute =  '.(!empty( $_POST["minute"])?$_POST["minute"]:'0').'
    var seconde =  '.(!empty( $_POST["seconde"])?$_POST["seconde"]:'15').'
    function timer(){
        document.getElementById("minuteur").innerHTML=
        `${(heure<10 ? "0":"")+heure}:${(minute<10 ?"0":"")+minute}
        :${(seconde<10 ?"0":"")+seconde}`
        if(seconde<=0) return
        
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
          seconde--        
    }
    var interval= setInterval(timer, 1000)
    function PauseTimer(){
        clearInterval(interval)
        interval = null
        document.getElementById("minuteur").style.textDecoration ="red wavy underline"
    }
    function ResetTimer(){
        clear
    }
    document.getElemenById("play").addEventListenner("click",function(){
        if(interval ==null){
           interval = setInterval(timer,1000)
           document.getElementById("minuteur").style.opacitu="1"
        }
        
    })

</script>';*/
 
    ?>-->
    <h1>Compte à rebours</h1>

<label for="hoursInput">Heures :</label>
<input type="number" id="hoursInput">
<label for="minutesInput">Minutes :</label>
<input type="number" id="minutesInput">
<label for="secondsInput">Secondes :</label>
<input type="number" id="secondsInput">
<button id="startButton" onclick="startCountdown()">Démarrer</button>
<button id="stopButton" onclick="stopCountdown()">Stop</button>
<button id="resetButton" onclick="resetCountdown()">Réinitialiser</button>

<div id="timer">00:00:00</div>

<script>
var countdownInterval;
var countdownTime;
var isRunning = false;

function startCountdown() {
    if (!isRunning) {
        var hours = parseInt(document.getElementById("hoursInput").value || 0);
        var minutes = parseInt(document.getElementById("minutesInput").value || 0);
        var seconds = parseInt(document.getElementById("secondsInput").value || 0);
        
        countdownTime = (hours * 3600 + minutes * 60 + seconds) * 1000; // Converti en millisecondes
        countdownInterval = setInterval(updateCountdown, 1000);
        isRunning = true;
    }
}

function stopCountdown() {
    if (isRunning) {
        clearInterval(countdownInterval);
        isRunning = false;
    }
}

function resetCountdown() {
    clearInterval(countdownInterval);
    isRunning = false;
    document.getElementById("hoursInput").value = "";
    document.getElementById("minutesInput").value = "";
    document.getElementById("secondsInput").value = "";
    document.getElementById("timer").textContent = "00:00:00";
}

function updateCountdown() {
    if (isRunning && countdownTime > 0) {
        countdownTime -= 1000;
        var hours = Math.floor(countdownTime / 3600000);
        var minutes = Math.floor((countdownTime % 3600000) / 60000);
        var seconds = Math.floor((countdownTime % 60000) / 1000);

        // Format de temps HH:MM:SS
        var formattedTime = padZero(hours) + ":" + padZero(minutes) + ":" + padZero(seconds);

        // maj de l'affichage du temps
        document.getElementById("timer").textContent = formattedTime;
    } else {
        clearInterval(countdownInterval);
        isRunning = false;
        document.getElementById("timer").textContent = "00:00:00";
    }
}

function padZero(num) {
    return (num < 10 ? "0" : "") + num;
}
</script>
    



</body>
</html>