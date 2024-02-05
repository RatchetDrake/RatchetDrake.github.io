let PieceAuto

function JSONGet(FichierJSON) {
    return FichierJSON.json();
}

let test = async function() {
    // L'async permet de désynchroniser la fonction par rapport au reste du code
    await fetch('./pieceAuto.json')
    // Fetch récupère toute les données du fichier avec meta donnée(date de création, format, taille, lieu )
    // Await permet d'attendre que la fonction qui le suit sois terminée
    //////////////////////////////
        .then((FichierJSON) => {
            return FichierJSON.json();
        })
        // .then(JSONGet)
        //////////////////////
        .then((donnée) => {
            PieceAuto = donnée
        })
    console.log(PieceAuto)
    // Ici je récupère l'intégralité du fichier JSON
    for (let i = 0; i < PieceAuto.length; i++) {
        if (PieceAuto[i].nom == "Ampoule LED") {
            PieceAuto[i].disponible = false
        } 
    }
    PieceAuto[0].disponible = false

    let TableHTML = document.createElement('table')
    document.body.appendChild(TableHTML)
    // Ici je créer mon tableau en HTML et je le met enfant du body 

    let TR = document.createElement('tr')
    // Ici je créer ma première ligne qui contient les noms des colonnes
    for (const [key, value] of Object.entries(PieceAuto[0])) {
        // Object.entries permet de rendre un objet literal c'est à dire le rendre apte a être lu par une boucle
        let th = document.createElement('th')
        // Je créer mes premiers th qui contient le noms des colonnes
        th.textContent = key
        // Je défini le texte de chaque th
        TR.appendChild(th)
        // Je met chaque th enfant de ma ligne tr
    }    
    TableHTML.appendChild(TR)
    // Je met tr enfant de mon tableau html

    PieceAuto.forEach(element => {
        // Mon forEach permet de lire ma variable PieceAuto
        let TR = document.createElement('tr')
        // Je créer mon TR

        for (const [key, value] of Object.entries(element)) {
            let td = document.createElement('td')
            // Je créer mon td
            td.textContent = value
            // Je défini le texte de chaque colonne
            TR.appendChild(td)
            // Je met chaque td enfant de tr
        }
        TableHTML.appendChild(TR);
        // Je met chaque tr enfant de ma table html
    });
    // Récupérer des valeurs de la variable PieceAuto et les afficher sur la page web
}

// test()



const maChaine = '{"prenom": "Paul", "age" : 45}'
const MonAutre = "Bonjour m'appelle paul j'ai 45 ans"

let monObjetParse = JSON.parse(maChaine);
console.log(monObjetParse) // Il me renvoie ma chaine de caractère en format objet

// Alors que si je fait 
let MonAutreObjet = JSON.parse(MonAutre)
console.log(MonAutreObjet) // Il me faire une erreur parceque le texte n'est pas dans le format Json