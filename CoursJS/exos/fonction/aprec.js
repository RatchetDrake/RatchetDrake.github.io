// Créez une fonction nommée remarque qui :

//     prend une note sur 20 en argument
//     renvoie Hideux si la note est entre 0 et 7 exclus
//     renvoie Moche si la note entre 7 et 10 exclus
//     renvoie Nice si la note entre 10 et 15 exclus
//     renvoie GG si la note entre 15 et 20 inclus
//     renvoie BUG si la note n'est pas correcte

function Remarque(note) {
    if (note < 7) {
        return "Hideux"
    } else if (note >= 7 && note < 10) {
        return "Moche"
    } else if (note >= 10 && note < 15) {
        return "Nice"
    } else if (note >= 15 && note <= 20) {
        return "GG"
    }
    return "BUG"
}
console.log(Remarque(11))

// Faire une boucle qui affiche 10, 20, 30, ...., 100
for (let i = 10; i <= 100; i += 10) {
    console.log(i)
}

