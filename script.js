// let et var permet de dire que je créer une
// variable d'un nom souhaité
let Autruche = "Animal"
var Perche = "Poisson"
// j'ai défini des variables de type "string"
// (chaine de caractère)
let NombreStagiaire = 10
// j'ai défini une variable avec le nom NombreStagiaire
// et je lui ai donner comme donnée le nombre 10
// j'ai défini une variable de type int (nombre entier)
var heure = 14.31
// j'ai créer une variable avec le nom heure
// je lui donner la donnée 14.31
// j'ai défini une variable de type float/double 
//(nombre à virgule)
let Allumer = true
// j'ai créer une variable avec le nom Allumer
// et comme valeur je lui donner true(Vrai)
//le type de cette est boolean (true/false)
var Ventilo = null
// j'ai créer une variable avec le nom Ventilo
// Avec comme valeur null qui est rien du tout
//le type est null
let Phrase = "J'aime l'" + Autruche + 
" mais pas les " + Perche
// J'aime l'Animal mais pas le Poissons
//j'ai concaténer les chaines de caractères 
// et les variables
var calcul = heure + NombreStagiaire
// / * - %
//14.31 + 10
console.log(Phrase)
console.log(calcul)
// Je créer une fonction qui se nomme horloge sans
// paramètre
var temps = 1
function horloge() {
    // Si temps est plus petit ou égale à 10 on éxécute l'addition
    // et le console.log sinon rien
    if (temps <= 10){ //<,>,<=,>=,==,!=
        temps = temps + 1
        // temps ++ // temps --
        // temps += 1 // temp -=
        // j'additionne 1 à ma variable temps
        console.log(temps)

    }
   
}
setInterval(horloge, 2000)

// je voudrait avoir un compte à rebours qui comence à 50
// et qui fini à 0 et qui descend toutes les 2 secondes
var temps2 = 51
function horloge() {
    if(temps2 >= 1){
        temps2 = temps2 - 1
        console.log(temps2)
    }
}
