// Exercice : Gestion de tâches en JavaScript

// 1. Créez un objet "Tache" avec les propriétés suivantes :
//    - Titre
//    - Description
//    - État (en cours, terminée, annulée)

// 2. Ajoutez des méthodes à l'objet "Tache" :
//    - Une méthode "afficherDetails" qui affiche le titre, la description et l'état de la tâche.
//    - Une méthode "terminer" qui change l'état de la tâche à "terminée".
//    - Une méthode "annuler" qui change l'état de la tâche à "annulée".

// 3. Créez un objet "Projet" avec la propriété suivante :
//    - Liste de tâches (tableau d'objets Tache)

// 4. Ajoutez des méthodes à l'objet "Projet" :
//    - Une méthode "ajouterTache" qui prend en paramètre une tâche et l'ajoute à la liste.
//    - Une méthode "afficherTaches" qui affiche les détails de toutes les tâches du projet.

// 5. Créez une instance de l'objet "Projet" et ajoutez au moins deux tâches.

// 6. Affichez les détails de toutes les tâches du projet.

function Tache(title, description) {
    this.Title = title
    this.Description = description
    this.etat = "En cours"

    this.afficherDetails = function() {
        let Phrase = `Tache : ${this.Title}, Description : ${this.Description}, Etat : ${this.etat}`
        console.log(Phrase)
        return Phrase
    }

    this.terminer = function() {
        this.etat = 'terminée'
        console.log(`La tache ${this.Title} a été marquée comme terminée !`)
    }

    this.annuler = function() {
        this.etat = 'annulée'
        console.log(`La tache ${this.Title} a été annulée !`)
    }
}

function Projet() {
    this.listeDeTaches = []

    this.ajouterTache = function(tache) {
        this.listeDeTaches.push(tache)
    }

    this.afficherTaches = function() {
        let Phrase = []
        this.listeDeTaches.forEach((tache) => {
            Phrase.push(tache.afficherDetails() + ` <button type="button">Terminer</button> <button type="button">Annulée</button>`)
            console.log('---------------------------------')
            
        })
        return Phrase.join('<br><br>')
    }

}

let NewSiteWeb = new Tache("Création site internet", "Créer un site internet fonctionnel.");
let MisePage = new Tache("Mise en page des pages", "Rédaction du contenu des différentes pages du site.");
NewSiteWeb.afficherDetails(); // On peut afficher les details de la première tache
NewSiteWeb.annuler()
MisePage.terminer()

let projet = new Projet()
projet.ajouterTache(NewSiteWeb);
projet.ajouterTache(MisePage)
projet.ajouterTache(new Tache("Création d'animation", "En CSS ou en JavaScript"))
projet.afficherTaches()


function CreateTache() {
    let titre = document.getElementById('titre');
    let description = document.getElementById('description');
    if (titre != "" && description != ""){
        let nouvelleTache = new Tache(titre.value, description.value);
        ////
        projet.ajouterTache(nouvelleTache)
        // OU
        // projet.ajouterTache(new Tache(titre.value, description.value))
        ////
    }
    titre = ""
    description = ""
}

function ViewTaches() {
    document.getElementById('afficher').innerHTML = projet.afficherTaches()  
    projet.afficherTaches()
}