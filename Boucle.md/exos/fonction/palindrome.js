/* 
Un palindrome est un mot qui s’écrit de la même manière après l’inversion de ce dernier. ‘ada’ est un palindrome. 
Écrire une fonction qui vérifie si une chaîne est un palindrome.

isPalindrome("NON") ➞ true

isPalindrome("TOTO") ➞ false

isPalindrome("SOS") ➞ true

isPalindrome("SELLES") ➞ true
*/

function isPalindrome(str) {
    // Première Façon 
    var Reverse = str.split('').reverse().join('')
    if (Reverse == str) return true;
    return false

    // Deuxième Façon 
    return [...str].reverse().join('') == str
}

console.log(isPalindrome("NON"));
console.log(isPalindrome("TOTO"));
console.log(isPalindrome("SOS"));
console.log(isPalindrome("SELLES"));


/*
Créez une fonction qui prend une chaîne de caractère et renvoie une chaîne avec des espaces entre tous les caractères.

addSpace("waytolearnx") ➞ "w a y t o l e a r n x"

addSpace("Hello BoB") ➞ "H e l l o  B o B"

addSpace("Thank you") ➞ "T h a n k  y o u"
*/

function addSpace(str) {
    // return str.split('').join(' ')
    return [...str].join(' ')
}


console.log(addSpace("waytolearnx"));
console.log(addSpace("Hello BoB"));
console.log(addSpace("Thank you"));