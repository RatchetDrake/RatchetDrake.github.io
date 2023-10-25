<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <script src="../../script.js/jquery-3.7.1.min.js.js"></script>
    <link rel="stylesheet" href="../../scss/Correctionexo/main.css">
    <title>My Personal Profile</title>
</head>
<body>
    <div class="centre">
        <span>Spin</span>
        <div class="fleche"></div>
    </div>

    <div class="circle">
        <?php
            for ($i=1; $i <= 36; $i++) { 
                echo "<div class='box-$i'><div class='choix' id='b-$i'> <span>$i</span> </div></div>";
            }
        ?>
    </div>
    <script>
        $('.centre').click(function() {
            $('.circle').css('rotate', Math.random() * 360 + 'deg')
        })
        
    </script>
</body>
</html>