function calculator(valeur1, valeur2) {
    let Promesse = new Promise((resolve, reject) => {
        if (typeof valeur1 != 'number' || typeof valeur2 != 'number') {
            reject("Veuillez saisir des nombres");
        }

        resolve(valeur1 + valeur2)
    })
    return Promesse
}

console.log(calculator(10, 'lflf'))