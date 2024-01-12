// Faire un exercice qui détermine en combien de temps un escargot sortira d'un puit en sachant le profondeur du puit en cm
// l'escargot avance de 7 cm chaque jour et recule de 2 cm chaque nuit

// Exemple : 
// Jour 1 : 7  - 2     = 5 cm
// Jour 2 : 5  + 7 - 2 = 10 cm
// Jour 3 : 10 + 7 - 2 = 15 cm
// Jour 4 : 15 + 7 - 2 = 20 cm
// Jour 5 : 20 + 7 - 2 = 25 cm
// Jour 6 : 25 + 7 - 2 = 32 cm

function tempsEscargotSortiePuit(profondeurPuit) {
    if (profondeurPuit <= 0) {
      return "Le puits est déjà vide.";
    }
  
    let jours = 0;
    let positionEscargot = 0;
  
    while (positionEscargot < profondeurPuit) {
      jours++;
      positionEscargot += 7; // L'escargot avance de 7 cm chaque jour
      if (positionEscargot >= profondeurPuit) {
        break;
      }
      positionEscargot -= 2; // L'escargot recule de 2 cm chaque nuit
    }
  
    return `L'escargot mettra ${jours} jours pour sortir d'un puits de ${profondeurPuit} cm.`;
  }
  
  const profondeurPuit = 32; // Remplacez cette valeur par la profondeur du puits souhaitée
  const resultat = tempsEscargotSortiePuit(profondeurPuit);
  console.log(resultat);
  





  function DistanceParcouruEscargot(profondeur) {
    let distance = 0
    let jour

    for (jour = 0; distance <= profondeur; jour++) {        
        console.log(`Jour ${jour} : ${distance == 0 ? '' : (distance + ' +')} 7 - 2 = ${distance+7-2} `)
        distance += 7 - 2
    }

    return `L'escargot mettera ${jour} jour pour sortir du puit` 
}


console.log(DistanceParcouruEscargot(32))

