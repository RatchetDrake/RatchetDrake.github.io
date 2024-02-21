/*
    Créez une classe Task avec les propriétés suivantes :
        id : Identifiant unique de la tâche.
        description : Description de la tâche.
        completed : Un booléen indiquant si la tâche est terminée ou non.

    Créez une classe TaskManager avec les méthodes suivantes :
        constructor() : Initialise une liste vide de tâches.
        addTask(description) : Ajoute une nouvelle tâche avec la description spécifiée à la liste de tâches.
        deleteTask(id) : Supprime la tâche avec l'identifiant spécifié de la liste de tâches.
        toggleTask(id) : Change l'état de la tâche avec l'identifiant spécifié entre terminé et non terminé.
        getTasks() : Renvoie la liste des tâches actuelles.
        
*/

class Task {
    constructor(id, description) {
        this.id = id;
        this.description = description;
        this.completed = false;
    }
}

class TaskManager {
    constructor() {
        this.listeTaches = [];
    }

    addTask(description) {
        const id = this.listeTaches.length + 1;
        const nouvelleTache = new Task(id, description, false);
        this.listeTaches.push(nouvelleTache);
    }

    deleteTask(id) {
        this.listeTaches = this.listeTaches.filter(tache => tache.id != id);
    }

    toggleTask(id) {
        const SelectedTache = this.listeTaches.find(tache => tache.id == id) 
        if (SelectedTache) {
            SelectedTache.completed = !SelectedTache.completed
        }
    }

    getTasks() {
        return this.listeTaches;
    }
}

const taskManager = new TaskManager();

taskManager.addTask('Faire les courses');
taskManager.addTask('Faire le ménage');
taskManager.toggleTask(1); // Marque la première tâche comme terminée
// taskManager.deleteTask(2); // Supprime la deuxième tâche

console.log(taskManager.getTasks());