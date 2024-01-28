/*
Vous allez créer un objet piscine de type fonction. 
Cet objet piscine aura besoin de 4 informations stockées dans des attributs : 
la longueur, la largeur, la hauteur de la piscine et le débit de remplissage en m3 par minute.

A cette étape vous pouvez déja instancier un objet piscine basique en lui passant 4 valeurs en argument. 
Le problème c'est que cet objet ne fait rien pour le moment. 
Vous allez donc lui ajouter une méthode(fonction) remplissage.

La fonction remplissage calcul le temps de remplissage de la piscine grâce aux attributs de 
l'objet et retourne ce résultat. A ce stade votre objet est fonctionnel et fait ce qu'on lui demande, 
il prend des valeurs et calcul un débit.

*/

function Piscine(longeur, largeur, haut, débit) {
    this.longueur = longeur;
    this.largeur = largeur;
    this.hauteur = haut;
    this.débit = débit;
    
    this.remplissage = () => {
        return (this.longueur * this.largeur * this.hauteur) / this.débit
    }
}

var piscinecreusée = new Piscine(8, 10, 3, 2)
console.log(`La piscine va ce remplir en ${piscinecreusée.remplissage()} minutes`)
console.log(piscinecreusée)
var PiscineEnorme = new Piscine(100,100,100,100)



// function Personne(fiche) {
//     this.Prenom = fiche.Prenom;
//     this.Nom = fiche.Nom;
//     this.Age = fiche.Age;
//     this.Adresse = fiche.Adresse;
//     this.Tel = fiche.Tel;
//     this.Email = fiche.Email;
//     this.Sexe = fiche.Sexe;
//     this.Caractere = fiche.Caractere;
// }
// function Etudiant(fiche, note) {

    

//     this.LaFicheDeLétudiant = fiche;
//     this.LaNoteEst = note;
//     Personne.call(this, fiche);
// }
// var Didier = new Etudiant(
//     {
//         Prenom: 'Didier',
//         Nom: 'Lefebre',
//         Age: 25,
//         Adresse: "Rue de la liberté",
//         Tel: 0676497564,
//         Email: "didier@gmail.com",
//         Sexe: "Masculin",
//         Caractere: "Trop accro au PMU"
//     }, 
//     10
// )
// let Tab = []
// onclick = function() {
//     Tab.push(new Etudiant({
//         Prenom: InputPrenom.value,
//         Nom: InputNom.value,
//         Age: InputAge.value,
//         Adresse: "",
//         Tel: 0676497564,
//         Email: "didier@gmail.com",
//         Sexe: "Masculin",
//         Caractere: "Trop accro au PMU"
//     }, 
//     10))
// }
// console.log(Didier)

/*
C'est un parc auto qui ce compose de voiture et de camion
qui ont des caractéristiques communes regroupées dans un 
Objet Véhicule 

Chaque Véhicule est caractérisé par son matricule, l'année, le modèle,
son prix
Tout les attributs de l'objet Véhicule sont supposée être privés donc
il faudra avoir des fonction get
Ensuite les objets Voiture et Camion son hérité de Véhicule et 
possède deux (fonction) démarrer et accélérer il affiche soit un message 
Démarrer ou Accélère

Créer les objets Véhicule, Voiture et Camion

*/

function Véhicule(matricule, annee, modèle, prix) {
    this.getMatricule = function() {
        return matricule;
    }
    this.getAnnee = function() {
        return annee;
    }
    this.getModele = function() {
        return modèle;
    }
    this.getPrix = function() {
        return prix;
    }
    this.getAll = function() {
        return [matricule, annee, modèle, prix]
    }
}

function Voiture(matricule, annee, modèle, prix) {
    Véhicule.call(this, matricule, annee, modèle, prix)

    this.demarrer = function() {
        return 'La voiture à démarrer'
    }
    this.accellerer = function() {
        return 'La voiture a accéléré'
    }
}

function Camion(matricule, annee, modèle, prix) {
    Véhicule.call(this, matricule, annee, modèle, prix)

    this.demarrer = function() {
        return 'Le camion à démarrer'
    }
    this.accellerer = function() {
        return 'Le camion a accéléré'
    }
}

let Fiat = new Voiture('AB-1012', 2000, 'Panda', 1000)
let Scania = new Camion('BC-7894', 2010, 'O', 100000)
console.log(Fiat)
console.log(Fiat.getAnnee(), Fiat.getPrix())
console.log(Fiat.demarrer())
console.log(Scania.demarrer())

let EleveA = {
    Classe: "Terminale A", 
    Matiere: {
        math: 10,
        science: 15
    }
}
let EleveB = {
    Classe: "Terminale B"
}

// console.log(EleveA.Matiere.math)
// console.log(EleveB.Matiere.math)


let Ladder = {
    step: 0,
    up() {
        this.step++
        return this
    },
    down() {
        this.step--
        return this
    },
    show() {
        console.log(this.step)
    }
}

Ladder
    .up()
    .up()
    .down()
    .down()
    .up()
    .show()
