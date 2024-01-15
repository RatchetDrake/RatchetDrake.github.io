// Déclarer et définir 2 variables misteryNumber et myNumber 
// de type number.
// En utilisant uniquement l'opérateur ternaire, on affiche :

//     Si les 2 nombres sont égaux Congratulations !
//     Sinon
//         Si le nombre myNumber est inférieur au nombre 
//          misteryNumber, on affiche +
//         Sinon on affiche -
// Déclarer et définir les variables misteryNumber et myNumber
let misteryNumber = 5;
let myNumber = 10;

// Utiliser l'opérateur ternaire pour afficher le message approprié
let message = (misteryNumber === myNumber) ? "Congratulations !" : (myNumber < misteryNumber) ? "+" : "-";

// Afficher le résultat
console.log(message);
