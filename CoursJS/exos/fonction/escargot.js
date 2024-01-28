// Faire une function qui détermine en combien de temps un escargot sortira d'un puit en sachant le profondeur du puit en cm
// l'escargot avance de 7 cm chaque jour et recule de 2 cm chaque nuit

// Exemple : Puis de 32 cm
// Jour 1 : 7  - 2     = 5 cm
// Jour 2 : 5  + 7 - 2 = 10 cm
// Jour 3 : 10 + 7 - 2 = 15 cm
// Jour 4 : 15 + 7 - 2 = 20 cm
// Jour 5 : 20 + 7 - 2 = 25 cm
// Jour 6 : 25 + 7 - 2 = 30 cm
// Jour 7 : 30 + 7 - 2 = 35 cm

function DistanceParcouruEscargot(profondeur) {
    let distance = 0
    let jour

    for (jour = 0; distance <= profondeur; jour++) {  
        // Jour 1 : la distance s'affiche que si elle n'est pas égal à 0 sinon il n'affiche rien puis 7 - 2 = au resultat
        console.log(`Jour ${jour+1} : ${distance == 0 ? '' : (distance + ' + ')}7 - 2 = ${distance+7-2} `)
        distance += 7 - 2
    }

    return `L'escargot mettera ${jour} jour pour sortir du puit` 
}


console.log(DistanceParcouruEscargot(32))

