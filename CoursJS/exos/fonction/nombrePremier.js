// Créer une fonction qui renvoie les 100 premier nombres premiers et ensuite leur somme 

function NombrePremier() {
    let nombrePremiers = []
    let somme = 0
    var IsFirstNumber = true
    // J'ai ma boucle pour tester chaque nombre jusqu'a temps que la taille du tableau soit égal à 100
    for (let nombreTester = 2; nombrePremiers.length < 100; nombreTester++) {
        IsFirstNumber = true

        // J'imbrique une boucle dans une autre boucle
        // Cette boucle va tester le nombreTester avec une valeur incrémentante pour vérifier si son nombre
        // et divisible par un autre, si il est divisible par un autre la boucle s'arrete et modifie une variable IsFirstNumber en faux puisqu'un nombre
        // premier n'est divisible que par lui meme et 1 donc je regarde si la variable IsFirstNumber est vrai si elle est vrai j'insert dans le tableau
        // Le modulo (%) est un opérateur mathématique qui sert à récupérer le reste d'une division euclidienne par exemple 4 divié par 3 sa fait 1.33... mais 4 modulo de 3 sa fait 1
        for (let ValeurIncrementante = 2; ValeurIncrementante < nombreTester; ValeurIncrementante++) {
            if (nombreTester % ValeurIncrementante === 0) {
                IsFirstNumber = false
                break
            }
        }
        if (IsFirstNumber) {
            somme = somme + nombreTester
            // Push pousse une valeur dans le tableau
            nombrePremiers.push(nombreTester)
        }
    }
    return {nombrePremiers, somme}
}

let Nombre = NombrePremier()

console.log(Nombre.nombrePremiers.join(" / "))
document.getElementById('nombre').innerHTML = Nombre.nombrePremiers.join(' - ')
