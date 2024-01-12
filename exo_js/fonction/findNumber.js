// Faire une fonction qui prend comme paramètre taille et un autre findMe tout les deux de type integer 
// et cette fonction devra trouver combien de fois le nombre findMe ce trouve dans tout les iterations de la boucle

// Par exemple Si on écrit les entiers de 1 à 365 combien il y aura le chiffre 3 dans cette suite
// Avec que des boucles For 

function trouverOccurrences(taille, findMe) {
    if (typeof taille !== 'number' || typeof findMe !== 'number' || taille < 0 || findMe < 0 || findMe > 9) {
      return "Veuillez fournir des valeurs valides pour 'taille' et 'findMe' (entiers positifs de 0 à 9).";
    }
  
    let count = 0;
  
    for (let i = 1; i <= taille; i++) {
      let nombre = i.toString(); // Convertir le nombre en chaîne de caractères pour le traitement
  
      for (let j = 0; j < nombre.length; j++) {
        if (parseInt(nombre[j]) === findMe) {
          count++;
        }
      }
    }
  
    return `Le chiffre ${findMe} se trouve ${count} fois dans la suite des entiers de 1 à ${taille}.`;
  }
  
  const taille = 365;
  const findMe = 3;
  const resultat = trouverOccurrences(taille, findMe);
  console.log(resultat);
  






  function findChiffre(taille, findMe) {
    let NombreDeFoisTrouver = 0

    for (let SelectNumber = 0; SelectNumber <= taille; SelectNumber++) {
        let SelectNumberString = SelectNumber.toString()

        for (let i = 0; i < SelectNumberString.length; i++) {
            
            if (SelectNumberString[i] == findMe) {
                NombreDeFoisTrouver++
            }
        }
    }

    console.log(NombreDeFoisTrouver)
}

findChiffre(365, 3)
