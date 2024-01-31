// Avec deux nombres, retournez TRUE si la somme des deux nombres 
// est inférieure à 100. Sinon, retournez FALSE.

// Exemple:
// check(5, 20) ➞ true
// // 5 + 20 = 25

// check(60, 55) ➞ false
// // 60 + 55 = 115

function check(a, b) {
    return a + b < 100;
}

console.log(check(5, 20));
console.log(check(60, 55));