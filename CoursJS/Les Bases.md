[Retour](https://github.com/TamakiYagami/Cours/tree/main/CoursJS)

# let, var 

Création de variable qui peuvent être modifié 
Exemple: 
```js
let MaVariable = "Coucou"
var MaVariableSecondaire = "Hello"

MaVariable = "Hello"
MaVariableSecondaire = "Coucou"

```

# const 

Création de variable qui ne peuvent pas être modifié JAMAIS 
complètement Statique
```js
const MaConstante = "Je suis une constante"
// MaConstante = "Je suis un autre texte" // Erreur
```

# Type de Variables 

- INTEGER : nombre réel/ nombre Entier
- FLOAT : Nombre Imaginaire / Nombre à Virgule 
- STRING : Texte (chaîne de caractère)
- ARRAY : Variable de type Tableau
- BOOL : Vrai ou Faux
- NULL : Valeur NULL qui n'est pas un type de variable mais on le considère comme parce qu'il est null

# Concaténation

Concaténation sert ajouter/additioner certain élément a une chaîne de caractère 
par exemple : 

Je suis développeur + de site web
```js
var phrase = "Je suis développeur"
phrase = phrase + " de site web"
```
J'ai + 10 + nombre de stagiaire
```js
var NombreStagiaire = ""
var nombre = 10
NombreStagiaire = "J'ai " + nombre + " nombres de stagiaire"
NombreStagiaire = `J'ai ${nombre} nombres de stagiaire`
```
Les deux fonctionnes pareil 

# Les conditions 

if / else if / else / switch
Si / Sinon si/ sinon/ multi condition

```js
if (UarrAlive?()) {
    YES
} else if () {
    MAYBE
} else {
    NO
}
```
Un else if ne ce met jamais après un else sinon tu meurt et ton script aussi (ps: c'est moi qui te tue)

```js
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
```

## Opérateurs

== égalité il ne vérifie pas le type de la variable

=== strictement égale il vérifie le type de la variable

si on a deux variables 
```js
var nombreString = "10" Le type est STRING
var nombreInt = 10 Le type est INTEGER
if (nombreString == nombreInt) {
    //il passe ici puisque les deux variable sont entre guillemet les même
}
if (nombreString === nombreInt) {
    //il ne passe pas ici puisque les variable n'ont pas le même type
}
```
< / <= inférieur / inférieur ou égal

\> / >= supérieur / supérieur ou égal

### != Different de 
### !== Strictement différent de 
```js
var nombreInt = 10 Le type est INTEGER
if (nombreInt != 11) {
    il passe bien ici
}
```

### && Et puis 
```js
var nombreInt = 10 Le type est INTEGER
if (NombreInt != 11 && NombreInt != 9) {
    Il va passer ici car il est différent de 11 et de 9
    Les deux valeurs doivent être correct
}
```
### || Ou
```js
var nombreInt = 10 Le type est INTEGER
if (NombreInt != 11 || NombreInt != 10) {
    Il va passer ici car il est différent de 11 et de 10
    C'est soit une variable sois l'autre
}
```

### ! Inverse la variable
```js
var Beau = true

if (!Beau) {
    Beau est false(moche) et ne passe donc pas 
}
```
### Les Calculs
```js 
var Calcul = 10

Calcul = Calcul - 5
Calcul -= 5

Calcul = Calcul + 5
Calcul += 5

Calcul = Calcul / 5 
Calcul /= 5

Calcul = Calcul * 5
Calcul *= 5 
```
Chaque double ligne revient à la même chose

### Modulo

Le modulo sert à récupérer le reste d'une division euclidienne 

Exemple : 

    7 % 2 = 1 Car on a bien un reste
    8 % 3 = 2 Car on a bien un autre reste
    340 % 5 = 0 Car on a pas de reste

```js
var Deux = 2
var Sept = 7
console.log(Sept  % Deux) // Affiche 1 car il y a un reste

```



