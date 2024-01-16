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
if (UareAlive?()) {
    YES
} else if () {
    MAYBE
} else {
    NO
}
```
Un else if ne ce met jamais après un else sinon tu meurt et ton script ausi (ps: c'est moi qui te tue)

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

== egalité il ne vérifie pas le type de la variable

=== strictement egale il vérifie le type de la variable

si on a deux variables 
```js
var nombreString = "10" Le type est STRING
var nombreInt = 10 Le type est INTEGER
if (nombreString == nombreInt) {
    il passe ici puisque les deux variable sont entre gillement les même
}
if (nombreString === nombreInt) {
    il ne passe pas ici puisque les variable n'ont pas le même type
}
```
< / <= inférieur / inférieur ou égal

\> / >= supérieur / supérieux ou égal

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

Caclul = Calcul - 5
Caclul -= 5

Caclul = Calcul + 5
Calcul += 5

Calcul = Calcul / 5 
Calcul /= 5

Caclul = Caclul * 5
Calcul *= 5 
```
Chaque double ligne revient à la même chose

### Modulo

Le modulo sert à récupérer le reste d'une division euclidienne 

Exemple : 

    7 % 2 = 1 Car on a bien un reste
    8 % 3 = 2 Car on a bien un autre reste
    340 % 5 = 0 Car on a pas de reste


# Les boucles

for /   while    /  do while /   foreach       / for in  /    for of 
pour   tandis que    fait puis    pour chaque    pour dans     pour de 
                    tandis que      element

### For
```js
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
```
### While
```js
while (true) { // Tant qu'il est vrai la boucle continue
    // Si je suis faux je ne tourne jamais
    console.log('Je tourne')
}
```
### Do While
```js
do {
    // Je m'execute une fois
} while (true) // Puis tant que je suis vrai je continue
```
### For in
```js
let tab = [1, 2, 3, 4, 5, 6]

// Mon for ici va récupérer les index de mon tableau tab
for (const index in tab) {
}
```
Exemple : 
```js
//         0  1  2  3  4  5
let tab = [1, 2, 3, 4, 5, 6]
//                 age        prenom          nom
let tab_assoc = {age: 10, prenom: "alfred", nom: "ok"}

for (let index in tab_assoc) {
    console.log("Voici l'index du tableau : " + index)
    console.log("Voici la valeur de mon tableau : " + tab_assoc[index])
}
```
### For of 
Exemple : 
```js
//         0  1  2  3  4  5
let tab = [1, 2, 3, 4, 5, 6]

// Pour les tableau associatif ca ne fonctionne pas !

for (let valeur of tab) {
    console.log('Voici les valeurs du tableau :' + valeur)
}
```

### ForEach
```js
// Index   0  1  2  3  4  5 
let tab = [1, 2, 3, 4, 5, 6]

// Pour les tableau associatif ca ne fonctionne pas !

tab.forEach((valeur, index) => {
    console.log(valeur, index)
})
```


# Les Tableaux

Le nom qu'on leur porte est Array

## Tableau Indexé
Un tableau indexé est un tableau qui a ces propre index fixe qui sont des nombre de 0 a infiniement selon la taille du tableau
Exemple d'un tableau indexé : 
```js
//Les index    0 1  2     3               4
let tableau = [1,0,504,74545746, 45465465456465465456]
```

## Tableau Associatif
Un tableau associatif est un tableau qui a besoin d'avoir des index définis par l'utilisateur
Exemple d'un tableau associatif :
```js
// Les index défini    prenom               nom             
let tableauAssocie = {"prenom" : "Pierre", "nom" : "GrandJean"}
```

# Fonctions pour les Tableau
```js
var TableauExemple = [1, 2, 3, 4, 'a', 'b', 'c', 'abc']
```

## push()
Ajoute une ou plusieurs valeurs à la fin d'un tableau

Exemple : 
```js
TableauExemple.push(8); // Je rajoute le nombre 8 à la fin du tableau
TableauExemple.push('coucou') // Je rajoute la string coucou à la fin du tableau
TableauExemple.push('d', 'e', 'f', 'g') // Je rajoute les string d e f g à la fin du tableau dans l'ordre que j'ai donne
```

## unshift()
Ajoute une ou plusieurs valeurs au début d'un tableau

Exemple : 
```js
TableauExemple.unshift(8); // Je rajoute le nombre 8 au début du tableau
TableauExemple.unshift('coucou') // Je rajoute la string coucou au début du tableau
TableauExemple.unshift('d', 'e', 'f', 'g') // Je rajoute les string d e f g au début du tableau dans l'ordre que j'ai donne
```

## shift()
Supprime le premier élément d'un tableau

Exemple : 
```js
TableauExemple.shift()
// En considérant que le premier element du tableau est 1 en faisais la ligne du dessus le 1 est supprimé du tableau
```

## pop()
Supprime le dernier élément d'un tableau

Exemple : 
```js
TableauExemple.pop()
// En considérant que le dernier element du tableau est abc en faisais la ligne du dessus abc est supprimé du tableau 
```

## sort()
Permet de trier un tableau

Exemple : 
```js
TableauExemple.sort((chiffreActuel, chiffreSuivant) => chiffreActuel - chiffreSuivant)
// Mon tableau va ce trier en sorte que le chiffre le plus petit soit en premier et les plus grand en dernier
// Le sort n'est utilisé que pour les tableaux de nombre
```

## reverse()
Permet de retourner un tableau le dernier deviens le premier et le premier deviens le dernier

Exemple : 
```js
TableauExemple.reverse()
// Notre tableau deviens
// ['abc', 'c', 'b', 'a', 4, 3, 2, 1]
```

## join()
Permet d'améliorer l'affiche d'un tableau

Exemple : 
```js
TableauExemple.join('')
// affiche 1234abcabc
```

## concat()
Permet de fusionner deux tableaux en un seul en allant à la fin du tableau 

Exemple : 
```js
let tableau = ["z", 'y', 'x', 10, 11, 12]
TableauExemple.contact(tableau)
// [1, 2, 3, 4, 'a', 'b', 'c', 'abc', "z", 'y', 'x', 10, 11, 12]
```

## slice()
Permet de récupérer une partie du tableau

Exemple : 
```js
TableauExemple.slice(2, 5)
// [4, 'a', 'b']
```

## indexOf()
Permet de récupérer un élément bien précis dans un tableau

Exemple : 
```js
TableauExemple.indexOf('c')
// Renvoie 6
```

## filter()
Permet de filtrer un tableau, renvoi uniquement les éléments demander

Exemple : 
```js

```

## map()
Permet de transformer chaque éléments d'un tableau en une autre chose

Exemple : 
```js

```

# Fonction JavaScript

## toFixed 
Sert à mettre ou retirer des chiffres après la virgule

## split
Découpe une chaine de caractère avec un séparateur bien précis

## replace
Remplace tout ce qui correspond a une expression régulière par une chaîne de caractère donnée

## parseFloat
Convertit une chaîne de caractères en nombre décimal (à virgule)

## parseInt
Convertit une chaîne de caractères en entier 

## toString
Transforme un nombre en chaîne de caractère

## slice
Extrait une portion d’une chaîne et/ou d’un tableau. Retourne
la sous-chaîne ou le sous-tableau demandé

## indexOf
Retourne l'index du premier caractère dans la chaîne qui correspond au paramètre donnée