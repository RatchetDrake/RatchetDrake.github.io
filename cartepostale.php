<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./carte.css">
    <title>Carte Postale</title>
</head>

<body>
    








    <div class="carte">
        <div class="texte">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, porro quisquam? Ex, deserunt vitae veritatis quae dolorem nisi, cumque alias quam et beatae natus, iusto asperiores molestiae esse molestias inventore?</p>
        </div>
        <div class="timbre">
            <img src="./image/timbre.png" alt="Timbre">
        </div>
        <img src="./image/tampon.png" alt="Tampon">
        <p class="tampon">
        <?php echo date('d/m/y'); ?>
        </p>
        <img src="./image/obliteration.png" alt="Obliteration">
        <div class="separateur"></div>
        <div class="information">
            <p>Jean Philipe Smet</p>
            <p>Cimitière de Lorient</p>            
            <p>Saint Barthélemy</p>
            <p>France</p>
        </div>
        <div class="copyright">&copy; | La carte Parisienne Tel : <a href="#">03.82.47.10.53</a></div>
    </div>
</body>

</html>