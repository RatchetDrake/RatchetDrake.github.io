let Caclul = 0
async function calculator(valeur1, valeur2) {
    let Promesse = await new Promise((resolve, reject) => {
        if (typeof valeur1 != 'number' || typeof valeur2 != 'number') {
            reject("Veuillez saisir des nombres");
        }

        resolve(valeur1 + valeur2)
    }).then((response) => { Caclul = response})
    console.log(Caclul)
}

calculator(10, 10)
