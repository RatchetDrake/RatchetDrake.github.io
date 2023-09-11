<?php
    $bdd =new PDO('mysql:host=localhost;dbname=cours;charset=utf8;','RatchetDrake','Azerty' )
    


?>
    


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php echo "<p class='test'>Bonjour</p>";
    //j'affiche Bonjour sur ma page dans une balise p avec comme 
    //class test
    echo "<p>".'Bonjour'."</p>";
    $COOKIE=10; //integer
    // Je defini ma variable avec $ 
    // puis je lui donne le nom COOKIE
    //et je lui rentre la valeur 10
    $phrase = "je suis une phrase"; //string
    $nombre = "1,4";//float
    $choix=true; //booléens
    
    /*integer => Nombre Entier comme 50,47,874698
    FLoat => Nombre à virgule comme 74.58, 4.202987, 1.0004 
    String => Chaine de caractères comme 
    "Bonjour"
    "Je code sur ordinateur"
    Booléens => true(vrai) ou false(faux) 
    Array =>
    indexés 
    Associatif
    Null => NULL
    */
    echo "<H1>".$phrase."</H1>";


    $titre ='je suis un titre';
    echo $phrase."<br>";
    echo $titre ."<br>" ;
    $condition = false;
    if($condition){
    echo"Je passe ici donc c'est vrai ";
}else{
    echo "je passe par la donc c'est faux";
}
    
$code = 4227;
//== ça prend en ompte que la variable sois égale
//=== ça prend en compte que la variable sois égale
// et du même type
if($code==4227){
    echo "<br> le code est correct";
}else{
    echo "<br> le code n'est pas correct";
}
$couleur ='gris';
if($couleur =='rouge'){ //si
    echo "J'ai une autruche de couleur rouge";
}elseif ($couleur=="bleu"){ //sinon si
    echo "j'ai une autruche de couleur bleu";
}else{ //sinon
    echo"<p>j'ai pas d'autruche</p>";
}
//Ecriture ternaire
$a =15;
$un= $a > 11? 1 :0;
//Si $a supérieur à 11 alor $un est égale à 1 sinon il 
// sera égale à 0
// les Switch
$taille = 187;
switch ($taille) {
    case 120:
        echo "<p>tu es atteint de nanisme.</p>";
        break;
    case 150:
        echo "<p> Tu es très petit(e)</p>";
        break;
            case 170:
            echo "<p>Tu à une taille convenable</p>";
            case 200:
                echo"<p>Bonjour Monsieur !</p>";
                break;
            default:
    echo"tu n'existe pas !";
        break;
}

// les Tableaux
$tableau=[
42, //0
78, //1
48, //2
1486658, //3
"Une Autruche" //4
];
echo"<br>".$tableau[4] ."<br>". $tableau[0];
echo '<br>'."<pre>";
var_dump($tableau);
echo '</pre>';

$exo = [4,12,78,98,65];
$resultat = $exo[2]-$exo[0]*$exo[1];
echo"<br>".$resultat;
$resultat = ($exo[3]-$exo[4]-$exo[1]/$exo[0]);
// la valeur de $exo[2]-$exo[0]*$exo[1]$resultat doit être égal à 30 en utilisant
//que les nombre qu'il ce trouve dnas le tableau exo
echo"<br>".$resultat;

//Tableaux Associatifs  

$tab_assoc =[
"voiture" => 'Volkswagen', // type string 
"animal"=> "Perroquet",// type string
"chffire" =>"10",// type integer
"calvitie" => true, //type Boolean
"legumes" => null //type Null
];
//j'ai fait un tableau avec 5 valeurs qui ont une index
// que j'ai défini moi même
// Voiture est une index et volkswagen est sa valeur
//Animal est une index et Perroquet est sa veleur
//Ainsi de suite
$tab_assoc['bras'] = false;
// j'ai défini une nouvelle index bras avec comme valeur faux
echo"<pre>"; var_dump($tab_assoc); echo"</pre>";

//le boucles
// la boucle while
$o= 0;
while (true) {
   $o++;
   echo "Je passe dans la boucle while <br>";
    if($o == 10){
       break;
        //sert à caser les boucle
    }
}
//la boucle do-while
do{
   echo 'je passe dans la boucle do-while <br>';
}while (false);

for ($i=0; $i<0 ; $i++) { 
    echo "je suis passer ".$i." fois dans la boucle for";
}for ($i=0; $i<10;$i++){
    echo "<br> je suis passer ".$i+1 ." fois dans la boucle";
}
    
    /* 
    Créer un tableau Associatif en mettant une 
    index bras de type booléen et une index 
    jambe qui va être un integer
    */

    //
    //Si il n'a pas de jambe ni de bras
      //  Tu es un e-tronc !
    //Sinon si il n'a pas de bras
      //  Pas de bras pas de chocolat
    //Sinon
        //Tu es basique donc tu es nul
        
        $tab_assoc2 =[
        "bras" => true,
        "jambes" => "2"];

        if($tab_assoc2 ["bras"]== false && $tab_assoc2["jambes"]!= "2"){
            echo "<br><br><br><br><br><br><br><br><br><br><br> Tu es un e-tronc";
        }elseif ($tab_assoc2["bras"]== false){
            echo "<br><br><br><br><br><br><br><br><br><br><br> pas de bras pas de chocolat";
        }else{
            echo"<br><br><br><br><br><br><br><br><br><br><br> tu es basique donc tu es nul";
        };




    ?>
    <form action="" method="post">
        <h2>Register</h2>
    <label for="Fname" class="texte">First name:<br> </label>
        <input type="text" name="Fname" id="Fname">
        <br><br>
        <label for="Lname" class="texte">Last name: <br></label>
        <input type="text" name="Lname" id="Lname">
        <br><br>
        <label for="email" class="texte3">E-mail:<br></label>
            <input type="email" name="email" id="email">
        <br><br>
        <label for="password" class="texte3">Password :<br></label>
            <input type="password" name="password" id="password">
        <br><br>
        <label for="password" class="texte3"> Confirm password :<br></label>
            <input type="password" name="password" id="password">
        <br>
        <p>Gender:</p>
        <input type="radio" name="gender" id="Male"value="Male" >
        <label for="Male" class="texte">Male</label>
    
        <input type="radio" name="gender" id="Female"value="Female">
        <label for="Female" class="texte">Female</label>
    
        <input type="radio" name="gender" id="Other" value="Other">
        <label for="Other" class="texte">Other</label>
    <br><br><br>
        <input type="submit" value="Submit">
    </form>
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
        


    }// je prépare ma commande
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
    
    
    
    
    
    ?>
</body>
</html>