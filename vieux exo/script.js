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
    if (temps <= 10) { //<,>,<=,>=,==,!=
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
    if (temps2 >= 1) {
        temps2 = temps2 - 1
        // console.log(temps2)
    }
}
// Array = tableau
//  C'est un tableau indexer
// Type de variable qui est elle même un tableau
var tab = [10, "bonjour", 7.5, null]
// Cette variable est un tableau qui contient 4 valeurs dans l'ordre
// 10
// "bonjour"
// 7.5
// null
console.log(tab[1])
// On affiche la valeur qui ce trouve à la position 1 qui est "bonjour"
console.log(tab[3])
// on affice la valeur qui ce trouve à la position 3 qui est null

// je voudrais un tableau qui ce nomme Chmilblik qui comporte 5 
// valeur de type string et 5 valeur de type int ou float

var Chmilblik = ["chien", "chat", "hamster", "autruche", "rats", 2, 5, 7, 8, 10]
console.log(Chmilblik)
console.log(Chmilblik, length)

// document.getElementById("animal").innerHTML = "Autruche"
let animal = "Autruche"
let temp = ""
document.getElementById("animal").addEventListener('click', function () {
    // Je regarde le texte qui cetrouve dans cet élement
    temp = document.getElementById("animal").innerHTML
    // Je modifie le texte qui ce trouve dans cet élément par la valeur
    // de la variable animal
    document.getElementById("animal").innerHTML = animal
    animal = temp
})
while (false) { } //Tandis que ce qu'il ce trouve dans les parenthèses
// est vrai elle tourne
for (var i = 0; i <= 10; i++) {
    //Je défini une variable i qui s'incrément de 1 tout les tours
    // de la boucle grâce à i++
    //et je lui demande de tourner jusqu'a ce que i
    // soit supériur à 10
    console.log(i)
}
for (var i = 0; i < Chmilblik.length; i++) {
    console.log(Chmilblik[i])
    if (i == 3) {
        break
    }
}
do {

    console.log('BONJOUR')
    //Elle s'exécutre une fois même si la condition est fausse
    //et elle continue de s'éécuter si la condition est vrai
}
while (false);
for (index in Chmilblik) {
    console.log(index)
}
//tableau associatif 
var tab_assoc = { "ami": "Chien", "cafe": "Caféine" }
for (index in tab_assoc) {
    console.log(index)
}
for (var i = 10; i >= 0; i--) {
    // console.log( 'il reste',i, 'ligne(s) à écrire')
    console.log(`il reste ${i} ligne${i <= 1 ? '' : 's'} à écrire`)
}
//if(i<=1){
//si vrai
//  console.log('')
//}else{// Sinon faux
//console.log('s')
//}
function diviseur(n) {
    var i = 2;
    var temp = '1';
    while (i <= n) {
        if (n % i == 0) {
            temp = temp + ',' + i;
        }
        i++;
    }
    return temp
}


//for (let index = 1; i <= 100; index++) {
 //   console.log(`les diviseurs de ${index} sont :${diviseur(index)}`)
//}


