class Animal {
    constructor(nom, age) {
        this.nom = nom;
        this.age = age;
    }

    afficherDetails() {
        console.log(`Nom de l'animal : ${this.nom}`);
        console.log(`Âge de l'animal : ${this.age}`);
    }
}

// Création de deux instances de la classe Animal
const animal1 = new Animal("Chien", 3);
const animal2 = new Animal("Chat", 5);

// Appel de la méthode afficherDetails pour afficher les détails de chaque animal
animal1.afficherDetails();
animal2.afficherDetails();
