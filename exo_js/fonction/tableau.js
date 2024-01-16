// Vous devrez créer un tableau avec dix éléments. Ce tableau devra être stocké dans une variable intitulée MonTableau. 
// Les éléments du tableau peuvent être n'importe quoi vos plats ou vos groupes de musique préférés

// Ensuite, modifiez les deux premiers éléments du tableau en utilisant ce que vous voulais
// Puis ajoutez un nouvel élément au début du tableau et un autre en fin de tableau.

// Création d'un tableau avec dix éléments
let MonTableau = ["Plat 1", "Plat 2", "Plat 3", "Plat 4", "Plat 5", "Plat 6", "Plat 7", "Plat 8", "Plat 9", "Plat 10"];

// Afficher le tableau initial
console.log("Tableau initial :");
console.log(MonTableau);

// Modifier les deux premiers éléments
MonTableau[0] = "Nouveau Plat 1";
MonTableau[1] = "Nouveau Plat 2";

// Ajouter un nouvel élément au début du tableau
MonTableau.unshift("Plat au Début");

// Ajouter un nouvel élément à la fin du tableau
MonTableau.push("Plat à la Fin");

// Afficher le tableau après les modifications
console.log("\nTableau après les modifications :");
console.log(MonTableau);

// Ajouter un nouvel élément au début du tableau
MonTableau.unshift("Nouveau Plat au Début");

// Ajouter un nouvel élément à la fin du tableau
MonTableau.push("Nouveau Plat à la Fin");

// Afficher le tableau après les ajouts
console.log("\nTableau après les ajouts :");
console.log(MonTableau);










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
    page 
}

console.log(reverseTab([1, 2, 3]));
console.log(reverseTab([1, 1, 2, 2, 3]));