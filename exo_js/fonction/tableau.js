

// Vous devrez créer un tableau avec dix éléments. Ce tableau devra être 
// stocké dans une variable intitulée MonTableau.
// Les éléments du tableau peuvent être n'importe quoi vos plats ou vos 
// groupes de musique préférés

// Ensuite, modifiez les deux premiers éléments du tableau en utilisant 
// ce que vous voulais
// Puis ajoutez un nouvel élément au début du tableau et un autre en 
// fin de tableau.

let MonTableau = [
    "Pizza",
    "Tacos",
    1234567890,
    "Dutroux",
    "Mark",
    "Epstein",
    1,
    2,
    3, 
    629595
]

MonTableau[0] = "Sushi"
MonTableau[1] = "Curry"

MonTableau.push("Budget")
MonTableau[MonTableau.length] = 7466532

MonTableau.unshift("Vegetables")

console.log(MonTableau)


// Écrivez une fonction pour inverser un tableau. 
// Attention: N’utilisez pas la méthode intégrée reverse();

// Exemple:
// reverseTab([1, 2, 3]) ➞ [3, 2, 1]

// reverseTab([1, 1, 2, 2, 3]) ➞ [3, 2, 2, 1, 1]

function reverseTab(tab) {
    let newTab = []

    for(var i = tab.length - 1; i >= 0; i--) {
        newTab.push(tab[i])
    }
    return newTab
}

console.log(reverseTab([1, 2, 3]));
console.log(reverseTab([1, 1, 2, 2, 3]));


// Écrivez une fonction qui prend un tableau d’éléments et ne renvoie que les entiers.
// Exemple : 

// getInt([1, 2, "3", "4", "5", 6]) ➞ [1, 2, 6]

// getInt(["Vache", 20, "Cheval", 1, "Poule", 50]) ➞ [20, 1, 50]

// getInt(["Str", false, 5.56, 6]) ➞ [6]

function getInt(tab) {
    // Première façon de faire l'exercice
    let NewTab = []
    for (let i = 0; i < tab.length; i++) {
        if (Number.isInteger(tab[i])) {
            NewTab.push(tab[i])
        }
    }    
    return NewTab

    // Deuxième façon de faire l'éxercice
    return tab.filter(Number.isInteger)
}

console.log(getInt([1, 2, "3", "4", "5", 6]));
console.log(getInt(["Vache", 20, "Cheval", 1, "Poule", 50]));
console.log(getInt(["Str", false, 5.56, 6]));


/*
Créez une fonction qui prend un tableau associatif comme argument et renvoie 
une chaîne de caractère qui représente une personne. 
Les attributs de la personne devront être extraits des trois 
propriétés du tableau :

nom
age
adresse

La chaîne doit avoir le format suivant: 

X a Y ans. Il habite à Z. 
(où X est le nom de la personne, Y est l’age et Z est l’adresse).

Exemple : 
let Tab = {
    "nom": "Thomas", 
    "age": "25", 
    "adresse": "Paris"
}
formatPrs(Tab)
➞ "Thomas a 25 ans. Il habite à Paris."

Tab = {
    "nom": "Emily", 
    "age": "22", 
    "adresse": "Nantes"
}
formatPrs(Tab)
➞ "Emily a 22 ans. Il habite à Nantes."
*/

function formatPrs(personne) {
    // return `${personne.nom} a ${personne.age} ans. Il habite à ${personne.adresse}`

    // return `${personne['nom']} a ${personne['age']} ans. Il habite à ${personne['adresse']}`
    
    const {nom, age, adresse} = personne
    return `${nom} a ${age} ans. Il habite à ${adresse}`

    
}
let Tab = {
    "nom": "Thomas", 
    "age": "25", 
    "adresse": "Paris"
}

console.log(formatPrs(Tab));
Tab = {
    "nom": "Emily", 
    "age": "22", 
    "adresse": "Nantes"
}
console.log(formatPrs(Tab));