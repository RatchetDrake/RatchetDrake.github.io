// Créez la classe Personne
class Personne {
    constructor(nom, age) {
      this.nom = nom;
      this.age = age;
    }
  
    afficherDetails() {
      console.log(`Nom : ${this.nom}, Age : ${this.age}`);
    }
  }
  
  // Créez la classe Etudiant qui étend Personne
  class Etudiant extends Personne {
    constructor(nom, age, niveau) {
      super(nom, age);
      this.niveau = niveau;
    }
  
    afficherDetails() {
      super.afficherDetails(); // Appelez la méthode de la classe parente pour afficher le nom et l'âge
      console.log(`Niveau d'étude : ${this.niveau}`);
    }
  }
  
  // Instanciez un objet de la classe Personne
  const personne1 = new Personne("Alice", 25);
  
  // Instanciez un objet de la classe Etudiant
  const etudiant1 = new Etudiant("Bob", 20, "Licence");
  
  // Appelez la méthode pour afficher les détails de la personne
  personne1.afficherDetails();
  
  // Appelez la méthode pour afficher les détails de l'étudiant
  etudiant1.afficherDetails();
  