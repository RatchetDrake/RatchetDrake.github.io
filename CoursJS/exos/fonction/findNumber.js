// Faire une fonction qui prend comme paramètre taille et un autre findMe tout les deux de type integer 
// et cette fonction devra trouver combien de fois le nombre findMe ce trouve dans tout les iterations de la boucle

// Par exemple Si on écrit les entiers de 1 à 365 combien il y aura le chiffre 3 dans cette suite
// Avec que des boucles For 
function findChiffre(taille, findMe) {
    let NombreDeFoisTrouver = 0

    for (let SelectNumber = 0; SelectNumber <= taille; SelectNumber++) {
        // toString permet de couvertir nimporte quel variable en type string
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
