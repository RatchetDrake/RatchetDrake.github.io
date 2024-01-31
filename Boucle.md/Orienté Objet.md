[Retour](https://github.com/TamakiYagami/Cours/tree/main/CoursJS)

# Orienté Objet
La programmation orienté objet en JS permet de classé de façon propre son code et de pouvoir le réutilisé comme on le veux à la demande 
Une classe est une énorme boite
Un objet est une petite boite

- Les objets sont des instances de classes, ces classes définissent un ensemble de propriétés
(attributs) et méthodes (fonctions).
- Une classe peut être considérée comme une blueprint pour créer plusieurs objets.
- Les objets ont accès aux propriétés et méthodes définies dans leur classe
parente. Elles peuvent également avoir leurs propres propriétés et méthodes.

## Création simple d'un objet
Un objet est créé avec l'instruction `new Object()`
```js
var MaBoite = new Object;
// Mon objet est créer mais vide
```
### Création de variable dans mon objet
```js
var MaBoite = new Object;
MaBoite.MaVariable = "Ok mec"
// J'ai créer une Variable qui ce nomme MaVariable dans mon objet et elle contient la chaîne de caractère
// Ok mec
```
### Création d'une fonction dans mon objet
```js
var MaBoite = new Object;
MaBoite.MaFonction = function() {
    alert ("Je suis une fonction");
}
MaBoite.MaFonctionFléchée = () => {
    alert ("Je suis une fonction");
}
// J'ai créer une fonction qui ce nomme MaFonction qui ce trouve
// dans la boite MaBoite 
```
### Appelé une fonction qui ce trouve dans mon objet
```js
MaBoite.MaFonction()
// J’appelle la fonction MaFonction qui ce trouve dans MaBoite
```

## Création d'un littéral objet 
Cela permet de décrire plus rapidement qu'avec l'instruction `new Object()`. On utilise `{ }` pour délimiter les paires clé/valeur
NE FONCTION PAS DANS LES ANCIENS NAVIGATEUR (Internet Explorer)
Attention a ne pas confondre avec un tableau associatif

Exemple: 
```js
var MaBoiteLitteral = {
    MaVariable : "Ok mec",
    MaFonction : function(){
        alert("Je suis une fonction")
    },
}
MaBoiteLitteral.MaFonction()
```

## Utilisation des fonction comme objet
Une fonction peux être utiliser comme un objet 
Exemple : 
```js
function MaFonctionObjet(TonPrenom, TonGenre, TaDate, Toncaractere) {
    this.CePrenom = TonPrenom;
    this.CeGenre = TonGenre;
    this.CetteDateDeNaissance = TaDate;
    this.CeCaractere = Toncaractere;
}
var Dylan = new MaFonctionObjet("Dylan", "oiseau", 2024, "Parle trop")
console.log(Dylan.CeGenre) // Me retourne oiseau

var Véronique = new MaFonctionObjet('Véronique', 'fomme', 1990, 'Trop conne')
console.log(Véronique.CeCaractere) // Me retourne Trop conne
```

### Le this 
On l'a légèrement vu il veux dire ceci donc dans notre cas il veux dire dans cette fonction 
le but du this est de dire au variable que je vais mettre juste après lui séparer d'un point 
est de dire je vais créer une variable dans cette fonction elle y sera local mais pourra être réutilisé 
dans des objets distinct

### Interdire la modification de certaine propriété 
Il est possible pouvoir interdire de modifier les propriété d'une fonction orienté objet
Exemple : 
```js
function MaFonctionInterdite(transmetteur, receveur, message, date){
    this.LeMessage = message

    this.getDate = function() {
        return date
    }
    this.getTransmetteur = function() {
        return transmetteur
    }
    this.getReceveur = function() {
        return receveur
    }
    this.setDate = function(time) {
        date = time
    }
}
var Kévin = new MaFonctionInterdite("Didi", 'Kévin', "Tu viens au PMU ?", '15:00:00-22-01-2024')
console.log(Kévin.getTransmetteur()) // Me retourne Didi
Kévin.setDate(15:00:00-23-01-2024) // Je re défini Date
Kévin.LeMessage = "Tu viens à l’apéro ?"
```

### Système d'héritage
Le système d'héritage sert à récupérer des variables, des fonctions et tout ce qu'il s'y trouve dans 
un autre objet
Exemple : 
```js
function Personne(prenom, nom, age, adresse, tel, email, sexe, caractere) {
    this.Prenom = prenom;
    this.Nom = nom;
    this.Age = age;
    this.Adresse = adresse;
    this.Tel = tel;
    this.Email = email;
    this.Sexe = sexe;
    this.Caractere = caractere;
}
function Etudiant(fiche, note) {

    Personne.call(this, fiche.Prenom, fiche.Nom, fiche.Age, fiche.Adresse, fiche.Tel, fiche.Email, fiche.Sexe, fiche.Caractere);

    this.LaFicheDeLétudiant = fiche;
    this.LaNoteEst = note;

}
```

### Objet Conditionnelle 
Un objet conditionnelle est un objet ou va lui demander si il existe avant d'être utiliser
Exemple : 
```js
let EleveA = {
    Classe: "Terminale A", 
    Matiere: {
        math: 10
        science: 15
    }
}
let EleveB = {
    Classe: "Terminale B"
}

console.log(ObjetA.Matiere.math) // me renvoie 10
console.log(ObjetB.Matiere.math) // me fait une erreur

console.log(EleveB?.Matiere?.math) // me renvoie undefined
console.log(EleveB?.Matiere?.math ?? "Absent") // me renvoie Absent

console.log(EleveA?.Matiere?.math ?? "Absent") // me renvoie 10
```

### Suppresion de propriété dans un objet
Il est possible de supprimer une seul propriété dans un objet en utilisant `delete`
Exemple: 
```js
let Eleve = {
    nom: 'Doe',
    prenom: 'John',
    age: 24,
    profession: 'Developer',
    birthDate: '05/06/1978'
}
delete(Eleve.birthDate)
// Je supprime birthDate dans Eleve
```

### Vérifier si un propriété existe
On peut vérifier si une propriété d'un objet existe avec la fonction `hasOwnProperty`
Exemple: 
```js
let Eleve = {
    nom: 'Doe',
    prenom: 'John',
    age: 24,
    profession: 'Developer',
    birthDate: '05/06/1978'
}
if (Eleve.hasOwnProperty('age')) {
    console.log("La propriété 'age' existe.")
} else {
    console.log("La propriété 'age' n'existe pas.")
}
```

### Méthode Chaining
Le chaining est utilisé pour executé plusieurs fonction a la fois
Exemple: 
```js
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
Ladder.up().up().down().down().up().show()
```


# Les Classes 
Les classes sont introduites en JavaScript pour permettre une structure plus organisée du code et faciliter l’utilisation de concepts
On peut définir une class en JS avec le mot clé `class` suivi du nom de la class et des parenthèses qui contiennent les attributs ou les méthode
