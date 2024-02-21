/* 
Créer une classe personne qui prend en attribut nom et age
Avec une méthode afficheDetails  qui affiche le nom et l’age de la personne.

Créer une classe étendu de personne qui s'appelle Etudiant qui prend un attribut niveau
Avec la méthode afficheDetails qui affiche  les informations de la personne ainsi que son niveau d’étude.

*/

class Personne {
    constructor(nom, age) {
        this.Nom = nom
        this.Age = age
    }
    afficherDetails() {
        return (`Le nom est ${this.Nom} et l'âge est ${this.Age} ans`);
    }
}

class Etudiant extends Personne {
    constructor(nom, age, niveau) {
        super(nom, age)
        this.Niveau = niveau
    }
    afficherDetails() {
        // Le mot clé super permet d'appeler la méthode de la class parente (Personne)
        return super.afficherDetails() + ` et le niveau d'étude est ${this.Niveau}`
    }
}
// Instancier un objet de la classe Personne
const personne1 = new Personne("Alice", 25);

// Instancier un objet de la classe Etudiant
const etudiant1 = new Etudiant("Bob", 20, "Licence");

// Appeler la méthode pour afficher les détails de la personne
console.log(personne1.afficherDetails())

// Appeler la méthode pour afficher les détails de l'étudiant
console.log(etudiant1.afficherDetails())
