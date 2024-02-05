/*
Exercice : Création d'une classe Animal

Créez une classe Animal avec les propriétés suivantes :
    nom (une chaîne de caractères représentant le nom de l'animal)
    age (un nombre entier représentant l'âge de l'animal)

Ajoutez une méthode afficherDetails à la classe Animal qui affiche les détails 
de l'animal (nom et âge) dans la console.

Créez deux instances de la classe Animal avec des noms et des âges différents.

Appelez la méthode afficherDetails pour afficher les détails de chaque animal.
    
*/

class Animal {
    constructor(nom, age){
        this.Nom = nom
        this.Age = age
    }

    afficherDetails() {
        console.log(`L'animal est appelé ${this.Nom} et il a ${this.Age} ans.`)
    }
}

const chat = new Animal('Mia', 6)
const Autruche = new Animal('Johnny', 41)

chat.afficherDetails()
Autruche.afficherDetails()