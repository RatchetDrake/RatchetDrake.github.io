# Cours JSON 
Le JSON veux dire JavaScript Object Notation, il est issu du JavaScript. 
C'est un format textuel conçu pour l'échange de données. Il représente des données structurées basées sur un sous-ensemble du langage de programmation JavaScript. Donc un programme JavaScript peux convertir des données JSON en objet JavaScript natifs sans analyser ou 
sérialiser les données.

Le JSON est populaire en raison de son style autodescriptif, facile à comprendre, léger et compact. Il est compatible avec de nombreux langages de programmation, environnements et bibliothèques

Les données on des syntaxe propre : 

- Les données sont présentées sous forme de paires clé/valeur
- Les éléments de données sont séparés par des virgules
- Les crochets {} désignes les objets
- Les crochets [] désigne les tableaux

Exemple pour un litteral objets en JSON : 
```json
{
    "key": "value", 
    "key": "value", 
    "key": "value"
}

{ 
    "id": 1,
    "prenom" : "John", 
    "nom" : "Doe",
    "pv": 100
}

```
:fu:
## Types de valeurs
Il y a plusieurs type de valeur similaire au JavaScript

### Les tableaux
Les tableau stock plusieurs valeur pouvent contenir des objet JSON en utiliser les concepts de clé/valeur
Exemple: 
```json
"students": [
    {
        "firstname":"John",
        "lastname":"Doe"
    },
    {
        "firstname":"Anna",
        "lastname":"Smith"
    }
    {
        "firstname":"Adam", 
        "lastname":"Cooper"
    }
]
```

### Les objets
Les objets JSON sont constitués de paires de deux composants : 

- Les clés sont des chaine de caractère 
- Les valeurs sont des types de données JSON valides (Tableau, Objet, Chaine de caractères, boolean, nombre, null)

Exemple: 
```json
"employees": {
    "employee1": {
        "firstname": "John", 
        "age":35, 
        "congé": true, 
        "travail":null
    },
    "salaire" : 1000,
}
```

### Les différent type de variable 

```json
[ // Tableau
    { // Objet
        "nombre": 42, // Nombre
        "chaine": "Bonjour le monde !", // Chaine de caractère / String
        "booléen": false, // Booléan
        "objet": {"clé": "valeur"}, // Objet
        "tableau": [1, 2, 3, 4, 5], // Tableau
        "nul": null // Null 
    }
]
```

## Récupérer les donnée JSON en JS
Pour récupérer une données JSON dans un fichier JavaScript, on utilise généralement la méthode fetch
qui est une fonction défini par JavaScript, elle sert à récupérer quelque chose comme son nom l'indique.
La syntaxe de cette méthode est la suivante : `fetch(url[, options])`.

Exemple : 
```js
// On a un fichier qui ce nomme PieceAuto.json
// On veux récupérer tout de ce fichier
// On fait donc
let PieceAuto
fetch('./PieceAuto.json')
    .then((response) => {
        return response.json();
    })
    .then((json) => {
        PieceAuto = json
    })
console.log(PieceAuto)
```
