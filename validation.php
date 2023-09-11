<?php
    //Si method post rentrer dans le formulaire il faut
    // utiliser $_POST
    //Sinon si la method get est rentrer dans le formulaire il 
    // faut utilsier $_GET
    // la fonction isset sert à regarder si la variable qui lui 
    // est donner est bien défini dans ce cas si elle regarde
    // si la variable  $_POST est défini
    if(isset($_POST) && !empty($_POST)){ // $_GET
        echo'<pre>'; var_dump($_POST); echo'</pre>';
        echo $_POST['Fname'] . "<br>";
        // Sha1 Hash ke mot c'est à dire
        // le compléxifi et le rend ilisible
        // Sha1 / md5
        echo sha1($_POST['password']). "<br>";
        echo md5($_POST['password']). "<br>";


       $insert =$bdd->prepare('INSERT INTO utilisateur(
        firstname,
        lastname,
        email,
        password,
        gender)VALUES (?,?,?,?,?)');
        $insert->execute(array($_POST['Fname'],
        $_POST['Lname'],
        $_POST['email'],
        md5($_POST['password']),
        $_POST['gender'])); 
        


    }
    // je prépare ma commande
    $select = $bdd->prepare('SELECT * FROM utilisateur WHERE gender= ? ;');
    // Je l'execture en lui donnant une valeur à la place des ?
    $select->execute(array('female'));
    // je récupére tout ce que le renvoir ma commande
    $total = $select->fetchALL(PDO:: FETCH_ASSOC);
    // Je l'affiche
    echo '<pre>';
    var_dump($total);
    echo '</pre>';

    echo $total[8]('gender');