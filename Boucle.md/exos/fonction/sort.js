/* 
tInit = Tableau Initial
tInf  = Tableau inférieur à 10
tSup  = Tableau supérieur à 10
Vous disposez d'un tableau contenant des nombres et 


vous devez créer une fonction sortNumbers(tInit, tInf, tSup) qui va ranger :

    tous les éléments de tInit inférieurs à 10 dans le tableau tInf
    et tous les éléments de tInit supérieurs ou égaux à 10 dans le 
    tableau tSup

la fonction doit fonctionner quel que soit le tableau tInit

Exemple : 
tInit = [
    5, 18, 2, 9, 3, 17, 4, 16, 1, 11
]
tInf = [
    5, 2, 9, 3, 4, 1
]
tSup = [
    18, 17, 16, 11
]
*/



tInit = [
    5, 18, 2, 9, 3, 17, 4, 16, 1, 11
]
function sortNumbers(tInit) {
    let tInf = tInit.filter(nb => nb < 10)
    let tSup = tInit.filter(nb => nb > 10)
    return [tInf, tSup]
}
console.log(sortNumbers(tInit))

/*
Vous avez un tableau de boissons, chaque boisson étant un objet avec deux propriétés: nom et prix. 
Créez une fonction qui a le tableau des boissons comme argument et retournez l’objet boissons 
trié par prix dans l’ordre croissant.

Supposons que le tableau d’objets de boisson suivant doit être trié:

boissons = [
    {nom: "citron", prix: 50},
    {nom: "menthe", prix: 35},
    {nom: "fraise", prix: 5}
]

Le tableau trié : 

boissons = [
    {nom: "fraise", prix: 5}, 
    {nom: "menthe", prix: 35},
    {nom: "citron", prix: 50}
]
*/
function sortBoissonsByPriceAscending(boissons){
    return boissons.sort((a, b) => a.prix - b.prix)
}
boissons = [
    {nom: "citron", prix: 50},
    {nom: "menthe", prix: 35},
    {nom: "fraise", prix: 5}
]
console.log(sortBoissonsByPriceAscending(boissons))