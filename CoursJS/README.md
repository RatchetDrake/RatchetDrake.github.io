# let, var 
Création de variable qui peuvent être modifié

# const 
Création de variable qui ne peuvent pas être modifié JAMAIS 
complétement Statique

# Type de Variables 
- INTEGER : nombre réel/ nombre Entier
- FLOAT : Nombre Imaginaire / Nombre à Virgule 
- STRING : Texte (chaîne de caractère)
- ARRAY : Variable de type Tableau
- BOOL : Vrai ou Faux
- NULL : Valeur NULL qui n'est pas un type de variable mais on le considère comme parce qu'il est null

# Concaténation
Concaténation sert ajouter certain élément a une chaine de caractère 
par exemple : 

Je suis développeur + de site web
var phrase = "Je suis développeur"
phrase = phrase + " de site web"

J'ai + 10 + nombre de stagiaire
var NombreStagiaire = ""
var nombre = 10
NombreStagiaire = "J'ai " + nombre + " nombres de stagiaire"
NombreStagiaire = `J'ai ${nombre} nombres de stagiaire`
// Les deux fonctionnes pareil 

# Les conditions 

if / else if / else / switch
Si / Sinon si/ sinon/ multi condition


if (UareAlive?()) {
    YES
} else if () {
    MAYBE
} else {
    NO
}
// Un else if ne ce met jamais après un else sinon tu meurt et ton script ausi (ps: c'est moi qui te tue)


switch(UAreAlive?()) {
    case 'Yes':
        console.log('Oui')
        break; // Faire attention a ne pas oublié le break car si on le met pas tout explose et l'action suivante ce sera jouer même si elle ne correspond pas 
    case 'No':
        console.log('Non')
        break;
    case 'MAYBE':
        console.log("Je ne sais pas")
        break;
    default:
        console.log("Je n'existe pas")
        break;
}

## Opérateurs

== egalité il ne vérifie pas le type de la variable
=== strictement egale il vérifie le type de la variable
si on a deux variables 

var nombreString = "10" Le type est STRING
var nombreInt = 10 Le type est INTEGER
if (nombreString == nombreInt) {
    il passe ici puisque les deux variable sont entre gillement les même
}
if (nombreString === nombreInt) {
    il ne passe pas ici puisque les variable n'ont pas le même type
}

< / <= inférieur / inférieur ou égal
> / >= supérieur / supérieux ou égal

!= Different de 
!== Strictement différent de 

var nombreInt = 10 Le type est INTEGER
if (nombreInt != 11) {
    il passe bien ici
}

&& Et puis 

var nombreInt = 10 Le type est INTEGER
if (NombreInt != 11 && NombreInt != 9) {
    Il va passer ici car il est différent de 11 et de 9
    Les deux valeurs doivent être correct
}

|| Ou

var nombreInt = 10 Le type est INTEGER
if (NombreInt != 11 || NombreInt != 10) {
    Il va passer ici car il est différent de 11 et de 10
    C'est soit une variable sois l'autre
}

! Inverse la variable

var Beau = true

if (!Beau) {
    Beau est false(moche) et ne passe donc pas 
}

var Calcul = 10

Caclul = Calcul - 5
Caclul -= 5

Caclul = Calcul + 5
Calcul += 5

Calcul = Calcul / 5 
Calcul /= 5

Caclul = Caclul * 5
Calcul *= 5 

Chaque double ligne revient à la même chose


# Les boucles

 for /   while    /  do while /   foreach       / for in  /    for of 
pour   tandis que    fait puis    pour chaque    pour dans     pour de 
                    tandis que      element

for (
    [Variable Incrémentante (point de départ)]; 
    [Condition (Jusqu'ou il va aller)]; 
    [Expression Incrémentante (De combien on va avancer)])

for (       
    var i=0;              
    i<10;                
    i=i+0.1) {
    console.log(`Bonjour ${i} fois`)
}

