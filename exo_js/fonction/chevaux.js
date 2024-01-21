
// L’Hippodrome de Casablanca organise un nouveau type de course de chevaux : 
// les duels. Lors d’un duel, seulement deux chevaux participent à la course. 
// Pour que la course soit intéressante, il faut sélectionner 
// deux chevaux qui ont une puissance similaire.

// Écrivez un programme qui, à partir d’un ensemble donné de puissances, 
// identifie les deux puissances les plus proches et affiche leur écart avec un nombre entier positif.

const NombreChevaux = parseInt(readline());

var PuissanceCheval = []
var EcartGlobal = Infinity
for (let i = 0; i < NombreChevaux; i++) {
    PuissanceCheval[i] = parseInt(readline());
}
PuissanceCheval.sort((Cheval1, Cheval2) => Cheval1 - Cheval2)

for (let i = 0; i < NombreChevaux; i++) {
    const ChevalActuel = PuissanceCheval[i] // 5 // 8
    const ChevalSuivant = PuissanceCheval[i + 1] // 8 // 9

    //                     8 // 9         -  5 // 8
    const EcartActuel =  ChevalSuivant - ChevalActuel // 3 // 1

    //  3 // 1       <   Infinity // 3 
    if (EcartActuel < EcartGlobal) {
        EcartGlobal = EcartActuel // il passe // il passe encore
        // Ecart Global egal a 3 // Ecart Global egal a 1 
    }
}

console.log(EcartGlobal); // Il est égal à 1
