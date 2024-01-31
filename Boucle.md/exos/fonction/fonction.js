/*
Créez une fonction qui renvoie le nombre d’arguments avec lesquels elle a été appelée.

Exemple : 

nbrArgs() ➞ 0

nbrArgs({}) ➞ 1

nbrArgs("A") ➞ 1

nbrArgs("A", "B") ➞ 2
*/

function nbrArgs() {
    return arguments.length
}

console.log(nbrArgs());
console.log(nbrArgs({}));
console.log(nbrArgs("A"));
console.log(nbrArgs("A", "B"));

function MaFonctionInterdite(transmetteur, receveur, message, date){
    this.LeMessage = message

    this.getDate = function() {
        return date
    }
    this.getTransmetteur = function() {
        return transmetteur
    }
    this.getReceveur = function() {
        return receveur
    }
}
var Kévin = new MaFonctionInterdite("Didi", 'Kévin', "Tu viens au PMU ?", '15:00:00-22-01-2024')
console.log(Kévin.getTransmetteur()) // Me retourne Didi
Kévin.LeMessage = "Tu viens à l'apero ?"
console.log(Kévin)