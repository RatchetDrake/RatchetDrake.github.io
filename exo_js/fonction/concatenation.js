// Créez une fonction qui accepte deux paramètres et, si les deux paramètres sont des chaînes, 
// additionnez-les comme s’ils étaient des entiers ou si les deux paramètres sont des entiers, concaténez-les.

// add("2", "3") ➞ 5

// add(2, 3) ➞ "23"

// add("2", 3) ➞ null


function add(a, b) {
    if (typeof a === "string" && typeof b === "string") {
        return parseInt(a) + parseInt(b);
    } else if (typeof a === "number" && typeof b === "number") {
        return a.toString() + b.toString();
    } else {
        return null;
    }
}

console.log(add("2", "3"));   // ➞ 5
console.log(add(2, 3));       // ➞ "23"
console.log(add("2", 3));     // ➞ null
