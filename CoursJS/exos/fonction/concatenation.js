// Créez une fonction qui accepte deux paramètres et, si les deux paramètres sont des chaînes, 
// additionnez-les comme s’ils étaient des entiers ou si les deux paramètres sont des entiers, concaténez-les.

// add("2", "3") ➞ 5

// add(2, 3) ➞ "23"

// add("2", 3) ➞ null


function add(a, b) {
    if (typeof a != typeof b) {
        return null
    }
    
    if (typeof a == "string")
        return Number(a) + Number(b)

    return `${a}${b}`

}

console.log(add("2", "3"));
console.log(add(2, 3));
console.log(add("2", 3));
