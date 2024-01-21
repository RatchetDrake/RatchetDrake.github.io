// Vous disposez d'un tableau contenant des nombres aléatoires et 
// vous devez créer une fonction sortNumbers(tInit, tInf, tSup) qui va ranger :

//     tous les éléments de tInit inférieurs à 10 dans le tableau tInf
//     et tous les éléments de tInit supérieurs ou égaux à 10 dans le 
//      tableau tSup

// 💡 la fonction doit fonctionner quel que soit le tableau tInit

// Fonction pour trier les nombres en fonction de leur valeur
function sortNumbers(tInit, tInf, tSup) {
    for (let i = 0; i < tInit.length; i++) {
        if (tInit[i] < 10) {
            tInf.push(tInit[i]);
        } else {
            tSup.push(tInit[i]);
        }
    }
}

// Fonction pour trier les boissons par prix
function trierBoissonsParPrix(boissons) {
    return boissons.sort((a, b) => a.prix - b.prix);
}

// Exemple d'utilisation de la fonction sortNumbers
let tInit = [5, 18, 2, 9, 3, 17, 4, 16, 1, 11];
let tInf = [];
let tSup = [];
sortNumbers(tInit, tInf, tSup);

console.log("Tableau inférieur à 10 :", tInf);
console.log("Tableau supérieur ou égal à 10 :", tSup);

// Exemple d'utilisation de la fonction trierBoissonsParPrix
let boissons = [
    { nom: "citron", prix: 50 },
    { nom: "menthe", prix: 35 },
    { nom: "fraise", prix: 5 }
];

let boissonsTriees = trierBoissonsParPrix(boissons);
console.log("Boissons triées par prix :", boissonsTriees);
