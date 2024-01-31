[Retour](https://github.com/TamakiYagami/Cours/tree/main/CoursJS)


# Fonction JavaScript

## toFixed 
Sert à mettre ou retirer des chiffres après la virgule
Exemple : 
```js
var nombre = 5
console.log(nombre.toFixed(2)) // Me retourne 5.00 dans la console
console.log(nombre.toFixed(10)) // Me retourne 5.0000000000 dans la console
```

## split
Découpe une chaîne de caractère avec un séparateur bien précis et la transforme en tableau
Exemple : 
```js
var Texte = "Bonjour, je suis de bonne humeur"
console.log(Texte.split(' ')) // Découpe à chaque occurrence du caractère de l'espace
// Renvoie donc ['Bonjour,', 'je', 'suis', 'de', 'bonne', 'humeur']
```

## [... <Variable>] Opérateur spread
Converti une chaîne de caractère en tableau a chaque occurrence 
```js
var Texte = "Bonjour, je suis de bonne humeur"
console.log([...Texte]) // Transforme la variable Texte en tableau
// ['B', 'o', 'n', 'j', 'o', 'u', 'r', ',', ' ', 'j', 'e', ' ', 's', 'u', 'i', 's', ' ', 'd', 'e', ' ', 'b', 'o', 'n', 'n',
// 'e', ' ', 'h', 'u', 'm', 'e', 'u', 'r']
```

## replace
Remplace tout ce qui correspond a une expression régulière par une chaîne de caractère donnée
Exemple : 
```js
var Texte = 'A mon temps perdu je suis un hacker'
console.log(Texte.replace('a', '@')) // Change toute les occurrences de la lettre a et la remplace par @ 
// Me renvoie 'A mon temps perdu je suis un h@cker'
```

## parseFloat
Convertit une chaîne de caractères en nombre décimal (à virgule)
Exemple : 
```js
var NombreText = '14.74587'
console.log(parseFloat(NombreText)) // Convertit le texte en flottant 
// Me renvoie 14.74587
```
## Number 
Convertit une variable en entier 
```js
var NombreText = '1445454'
console.log(Number(NombreText)) // Convertit le texte en nombre entier
// Renvoie 1445454
```
## parseInt
Convertit une chaîne de caractères en entier 
Exemple : 
```js
var NombreText = '14.74587'
console.log(parseInt(NombreText)) // Convertit le texte en nombre entier
// Renvoie 14
```

## toString
Transforme un nombre en chaîne de caractère
Exemple : 
```js
var Nombre = 14584654654
console.log(Nombre.toString()) // Me renvoie '14584654654'
```

## slice
Extrait une portion d’une chaîne et/ou d’un tableau. Retourne
la sous-chaîne ou le sous-tableau demandé
Exemple : 
```js
var Texte = 'Je suis un Alien qui mange des haribo'
console.log(Texte.slice(11, 17)) // Me renvoie 'Alien'
```

## indexOf
Retourne l'index de la première occurrence dans la chaîne qui correspond au paramètre donnée
Exemple : 
```js
var Texte = "J'ai manger un kiwi et maintenant il est absent"
console.log(Texte.indexOf('absent')) // Me renvoie 20
```

# Variable JavaScript 

## Infinity
Infinity contient le plus grand nombre imaginable et possible 
Exemple : 
```js
var High = Infinity
```

## typeof 
La fonction `typeof` permet de savoir quel type de variable on a utilisé
Exemple :
```js
var Nombre = 10155
var Float = 12.145
var Texte = 'ABCDEFG'
var Bool = false
console.log(typeof Nombre) // Renvoie NUMBER puisque Nombre est un entier
console.log(typeof Texte) // Renvoie STRING puisque Texte est une chaîne de caractère 
console.log(typeof Float) // Renvoie FLOAT puisque Float est un nombre flottant
console.log(typeof Bool) // Renvoie BOOLEAN puisque Bool est un true ou false
if (typeof Nombre == "Number") {
    console.log("C'est un nombre")
}
```