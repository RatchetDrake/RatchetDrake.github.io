// Ecrire une fonction qui vérifie si un verbe est du premier groupe si il y est remplacer les deux dernière lettre par eur

function FirstVerb(verbe) {
    // Slice permet de decouper une chaine de caractère à des index précise par Exemple le mot Haribo si je le slice en 3 jusqu'a 6 J'aurai ibo
    // Si on parle on nombre de lettre le start est inclu si on parle en indexant le start est exlu 
    var SplitVerbe = verbe.slice(verbe.length-2,  verbe.length)

    // indexOf sert à trouver l'index dans ce que lui demande si il le trouve pas il nous renvoie -1
    if (SplitVerbe.indexOf('er') != -1){
        // replace remplace une partie que on lui donne par ce que lui demande
        console.log(verbe.replace('er', 'eur'))

    } else {

        console.log("Le verbe n'est pas du premier groupe")

    }
}


FirstVerb('Chanter')
