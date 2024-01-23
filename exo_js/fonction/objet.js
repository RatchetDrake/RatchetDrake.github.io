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
/*
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

var PiscineEnorme = new Piscine(100,100,100,100)

*/

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
possède deux méthode démarrer et accélérer il affiche soit un message 
Démarrer ou Accélère

Créer les objets Véhicule, Voiture et Camion


*/
class Vehicule {
  constructor(matricule, annee, modele, prix) {
      this._matricule = matricule;
      this._annee = annee;
      this._modele = modele;
      this._prix = prix;
  }

  // Méthodes getter pour accéder aux attributs privés
  get matricule() {
      return this._matricule;
  }

  get annee() {
      return this._annee;
  }

  get modele() {
      return this._modele;
  }

  get prix() {
      return this._prix;
  }
}

class Voiture extends Vehicule {
  // Utiliser 'super' pour appeler le constructeur de la classe parent
  constructor(matricule, annee, modele, prix) {
      super(matricule, annee, modele, prix);
  }

  demarrer() {
      console.log("La voiture démarre");
  }

  accelerer() {
      console.log("La voiture accélère");
  }
}

class Camion extends Vehicule {
  constructor(matricule, annee, modele, prix) {
      super(matricule, annee, modele, prix);
  }

  demarrer() {
      console.log("Le camion démarre");
  }

  accelerer() {
      console.log("Le camion accélère");
  }
}

// Exemple d'utilisation
const maVoiture = new Voiture("123ABC", 2022, "Sedan", 25000);
const monCamion = new Camion("456XYZ", 2020, "Cargo", 45000);

console.log("Matricule de la voiture : " + maVoiture.matricule);
console.log("Année du camion : " + monCamion.annee);

maVoiture.demarrer();
monCamion.accelerer();
