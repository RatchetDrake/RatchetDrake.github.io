# -B let, var 

Création de variable qui peuvent être modifié

# -B const 

Création de variable qui ne peuvent pas être modifié JAMAIS 
complètement Statique

# -B Type de Variables 

- INTEGER : nombre réel/ nombre Entier
- FLOAT : Nombre Imaginaire / Nombre à Virgule 
- STRING : Texte (chaîne de caractère)
- ARRAY : Variable de type Tableau
- BOOL : Vrai ou Faux
- NULL : Valeur NULL qui n'est pas un type de variable mais on le considère comme parce qu'il est null

# -B Concaténation

Concaténation sert ajouter/additioner certain élément a une chaîne de caractère 
par exemple : 

Je suis développeur + de site web
```js
var phrase = "Je suis développeur"
phrase = phrase + " de site web"
```
J'ai + 10 + nombre de stagiaire
```js
var NombreStagiaire = ""
var nombre = 10
NombreStagiaire = "J'ai " + nombre + " nombres de stagiaire"
NombreStagiaire = `J'ai ${nombre} nombres de stagiaire`
```
Les deux fonctionnes pareil 

# -B Les conditions 

if / else if / else / switch
Si / Sinon si/ sinon/ multi condition

```js
if (UarrAlive?()) {
    YES
} else if () {
    MAYBE
} else {
    NO
}
```
Un else if ne ce met jamais après un else sinon tu meurt et ton script aussi (ps: c'est moi qui te tue)

```js
switch(UAreAlive?()) {
    case 'Yes':
        console.log('Oui')
        break; // Faire attention a ne pas oublié le break car si on le met pas tout explose et l'action suivante ce sera jouer même si elle ne correspond pas 
    case 'No':
        console.log('Non')
        break;
    case 'MAYBE':
        console.log("Je ne sais pas")
        break;
    default:
        console.log("Je n'existe pas")
        break;
}
```

## -B Opérateurs

== égalité il ne vérifie pas le type de la variable

=== strictement égale il vérifie le type de la variable

si on a deux variables 
```js
var nombreString = "10" Le type est STRING
var nombreInt = 10 Le type est INTEGER
if (nombreString == nombreInt) {
    //il passe ici puisque les deux variable sont entre guillemet les même
}
if (nombreString === nombreInt) {
    //il ne passe pas ici puisque les variable n'ont pas le même type
}
```
< / <= inférieur / inférieur ou égal

\> / >= supérieur / supérieur ou égal

### -B != Different de 
### -B !== Strictement différent de 
```js
var nombreInt = 10 Le type est INTEGER
if (nombreInt != 11) {
    il passe bien ici
}
```

### -B && Et puis 
```js
var nombreInt = 10 Le type est INTEGER
if (NombreInt != 11 && NombreInt != 9) {
    Il va passer ici car il est différent de 11 et de 9
    Les deux valeurs doivent être correct
}
```
### -B || Ou
```js
var nombreInt = 10 Le type est INTEGER
if (NombreInt != 11 || NombreInt != 10) {
    Il va passer ici car il est différent de 11 et de 10
    C'est soit une variable sois l'autre
}
```

### -B ! Inverse la variable
```js
var Beau = true

if (!Beau) {
    Beau est false(moche) et ne passe donc pas 
}
```
### -B Les Calculs
```js 
var Calcul = 10

Calcul = Calcul - 5
Calcul -= 5

Calcul = Calcul + 5
Calcul += 5

Calcul = Calcul / 5 
Calcul /= 5

Calcul = Calcul * 5
Calcul *= 5 
```
Chaque double ligne revient à la même chose

### -B Modulo

Le modulo sert à récupérer le reste d'une division euclidienne 

Exemple : 

    7 % 2 = 1 Car on a bien un reste
    8 % 3 = 2 Car on a bien un autre reste
    340 % 5 = 0 Car on a pas de reste


# -B Les boucles

for /   while    /  do while /   foreach       / for in  /    for of 
pour   tandis que    fait puis    pour chaque    pour dans     pour de 
                    tandis que      element

### -B For
```js
for (
    [Variable Incrémentant (point de départ)]; 
    [Condition (Jusqu'ou il va aller)]; 
    [Expression Incrémentant (De combien on va avancer)])

for (       
    var i=0;              
    i<10;                
    i=i+0.1) {
    console.log(`Bonjour ${i} fois`)
}
```
### -B While
```js
while (true) { // Tant qu'il est vrai la boucle continue
    // Si je suis faux je ne tourne jamais
    console.log('Je tourne')
}
```
### -B Do While
```js
do {
    // Je m'execute une fois
} while (true) // Puis tant que je suis vrai je continue
```
### -B For in
```js
let tab = [1, 2, 3, 4, 5, 6]

// Mon for ici va récupérer les index de mon tableau tab
for (const index in tab) {
}
```
Exemple : 
```js
//         0  1  2  3  4  5
let tab = [1, 2, 3, 4, 5, 6]
//               age        prenom          nom
let tab_assoc = {age: 10, prenom: "Alfred", nom: "ok"}

for (let index in tab_assoc) {
    console.log("Voici l'index du tableau : " + index)
    console.log("Voici la valeur de mon tableau : " + tab_assoc[index])
}
```
### -B For of 
Exemple : 
```js
//         0  1  2  3  4  5
let tab = [1, 2, 3, 4, 5, 6]

// Pour les tableau associatif ca ne fonctionne pas !

for (let valeur of tab) {
    console.log('Voici les valeurs du tableau :' + valeur)
}
```

### -B ForEach
```js
// Index   0  1  2  3  4  5 
let tab = [1, 2, 3, 4, 5, 6]

// Pour les tableau associatif ca ne fonctionne pas !

tab.forEach((valeur, index) => {
    console.log(valeur, index)
})
```


# -B Les Tableaux

Le nom qu'on leur porte est Array

## -B Tableau Indexé
Un tableau indexé est un tableau qui a ces propre index fixe qui sont des nombre de 0 a infiniment selon la taille du tableau
Exemple d'un tableau indexé : 
```js
//Les index    0 1  2     3               4
let tableau = [1,0,504,74545746, 45465465456465465456]
```

## -B Tableau Associatif
Un tableau associatif est un tableau qui a besoin d'avoir des index définis par l'utilisateur
Exemple d'un tableau associatif :
```js
// Les index défini    prenom               nom             
let tableauAssocie = {
    "prenom" : "Pierre", 
    "nom" : "GrandJean"
}
```

# -B Fonctions pour les Tableau
```js
var TableauExemple = [1, 2, 3, 4, 'a', 'b', 'c', 'abc']
```

## -B push()
Ajoute une ou plusieurs valeurs à la fin d'un tableau

Exemple : 
```js
TableauExemple.push(8); // Je rajoute le nombre 8 à la fin du tableau
TableauExemple.push('coucou') // Je rajoute la string coucou à la fin du tableau
TableauExemple.push('d', 'e', 'f', 'g') // Je rajoute les string d e f g à la fin du tableau dans l'ordre que j'ai donne
```

## -B unshift()
Ajoute une ou plusieurs valeurs au début d'un tableau

Exemple : 
```js
TableauExemple.unshift(8); // Je rajoute le nombre 8 au début du tableau
TableauExemple.unshift('coucou') // Je rajoute la string coucou au début du tableau
TableauExemple.unshift('d', 'e', 'f', 'g') // Je rajoute les string d e f g au début du tableau dans l'ordre que j'ai donne
```

## -B shift()
Supprime le premier élément d'un tableau

Exemple : 
```js
TableauExemple.shift()
// En considérant que le premier element du tableau est 1 en faisais la ligne du dessus le 1 est supprimé du tableau
```

## -B pop()
Supprime le dernier élément d'un tableau

Exemple : 
```js
TableauExemple.pop()
// En considérant que le dernier element du tableau est abc en faisais la ligne du dessus abc est supprimé du tableau 
```

## -B sort()
Permet de trier un tableau

Exemple : 
```js
TableauExemple.sort((chiffreActuel, chiffreSuivant) => chiffreActuel - chiffreSuivant)
// Mon tableau va ce trier en sorte que le chiffre le plus petit soit en premier et les plus grand en dernier
// Le sort n'est utilisé que pour les tableaux de nombre
```

## -B reverse()
Permet de retourner un tableau le dernier deviens le premier et le premier deviens le dernier

Exemple : 
```js
TableauExemple.reverse()
// Notre tableau deviens
// ['abc', 'c', 'b', 'a', 4, 3, 2, 1]
```

## -B join()
Permet d'améliorer l'affiche d'un tableau

Exemple : 
```js
TableauExemple.join('')
// affiche 1234abcabc
```

## -B concat()
Permet de fusionner deux tableaux en un seul en allant à la fin du tableau 

Exemple : 
```js
let tableau = ["z", 'y', 'x', 10, 11, 12]
TableauExemple.concat(tableau)
// [1, 2, 3, 4, 'a', 'b', 'c', 'abc', "z", 'y', 'x', 10, 11, 12]
```

## -B slice()
Permet de récupérer une partie du tableau

Exemple : 
```js
TableauExemple.slice(2, 5)
// [4, 'a', 'b']
```

## -B indexOf()
Permet de récupérer un élément bien précis dans un tableau

Exemple : 
```js
TableauExemple.indexOf('c')
// Renvoie 6
```

## -B filter()
Permet de filtrer un tableau, renvoi uniquement les éléments demander

Exemple : 
```js
TableauExemple.filter(Number.isInteger) //  Me renvoie que les chiffres entier
TableauExemple.filter((valeur) => valeur > 10) // Me renvoie tout les chiffre au dessus de 10
```

## -B map()
Permet de transformer chaque éléments d'un tableau en une autre chose

Exemple : 
```js

```

## -B includes 
Renvoie vrai si il trouve l'argument demander dans le tableau ou chaîne de caractère sinon il renvoie faux si il ne trouve pas 
Exemple : 
```js
var Texte = "J'ai manger un kiwi et maintenant il est absent"
console.log(Texte.includes('et')) // Me renvoie true
console.log(Texte.includes('mangue')) // Me renvoie false
```

## -B find
Retourne la lettre si il l'a trouve dans un tableau ou une chaîne de caractère sinon il retourne undefined
Exemple :
```js
var Texte = "J'ai manger un kiwi et maintenant il est absent"
var TableauTexte = Texte.split('')
console.log(TableauTexte.find((Lettre => Lettre == 'et'))) // Me renvoie 'et'
console.log(TableauTexte.find('mangue')) // Me renvoie undefined
```

# -B Fonction JavaScript

## -B toFixed 
Sert à mettre ou retirer des chiffres après la virgule
Exemple : 
```js
var nombre = 5
console.log(nombre.toFixed(2)) // Me retourne 5.00 dans la console
console.log(nombre.toFixed(10)) // Me retourne 5.0000000000 dans la console
```

## -B split
Découpe une chaîne de caractère avec un séparateur bien précis et la transforme en tableau
Exemple : 
```js
var Texte = "Bonjour, je suis de bonne humeur"
console.log(Texte.split(' ')) // Découpe à chaque occurrence du caractère de l'espace
// Renvoie donc ['Bonjour,', 'je', 'suis', 'de', 'bonne', 'humeur']
```

## -B [... <Variable>] Opérateur spread
Converti une chaîne de caractère en tableau a chaque occurrence 
```js
var Texte = "Bonjour, je suis de bonne humeur"
console.log([...Texte]) // Transforme la variable Texte en tableau
// ['B', 'o', 'n', 'j', 'o', 'u', 'r', ',', ' ', 'j', 'e', ' ', 's', 'u', 'i', 's', ' ', 'd', 'e', ' ', 'b', 'o', 'n', 'n',
// 'e', ' ', 'h', 'u', 'm', 'e', 'u', 'r']
```

## -B replace
Remplace tout ce qui correspond a une expression régulière par une chaîne de caractère donnée
Exemple : 
```js
var Texte = 'A mon temps perdu je suis un hacker'
console.log(Texte.replace('a', '@')) // Change toute les occurrences de la lettre a et la remplace par @ 
// Me renvoie 'A mon temps perdu je suis un h@cker'
```

## -B parseFloat
Convertit une chaîne de caractères en nombre décimal (à virgule)
Exemple : 
```js
var NombreText = '14.74587'
console.log(parseFloat(NombreText)) // Convertit le texte en flottant 
// Me renvoie 14.74587
```
## -B Number 
Convertit une variable en entier 
```js
var NombreText = '1445454'
console.log(Number(NombreText)) // Convertit le texte en nombre entier
// Renvoie 1445454
```
## -B parseInt
Convertit une chaîne de caractères en entier 
Exemple : 
```js
var NombreText = '14.74587'
console.log(parseInt(NombreText)) // Convertit le texte en nombre entier
// Renvoie 14
```

## -B toString
Transforme un nombre en chaîne de caractère
Exemple : 
```js
var Nombre = 14584654654
console.log(Nombre.toString()) // Me renvoie '14584654654'
```

## -B slice
Extrait une portion d’une chaîne et/ou d’un tableau. Retourne
la sous-chaîne ou le sous-tableau demandé
Exemple : 
```js
var Texte = 'Je suis un Alien qui mange des haribo'
console.log(Texte.slice(11, 17)) // Me renvoie 'Alien'
```

## -B indexOf
Retourne l'index de la première occurrence dans la chaîne qui correspond au paramètre donnée
Exemple : 
```js
var Texte = "J'ai manger un kiwi et maintenant il est absent"
console.log(Texte.indexOf('absent')) // Me renvoie 20
```

# -B Variable JavaScript 

## -B Infinity
Infinity contient le plus grand nombre imaginable et possible 
Exemple : 
```js
var High = Infinity
```

## -B typeof 
La fonction `typeof` permet de savoir quel type de variable on a utilisé
Exemple :
```js
var Nombre = 10155
var Float = 12.145
var Texte = 'ABCDEFG'
var Bool = false
console.log(typeof Nombre) // Renvoie NUMBER puisque Nombre est un entier
console.log(typeof Texte) // Renvoie STRING puisque Texte est une chaîne de caractère 
console.log(typeof Float) // Renvoie FLOAT puisque Float est un nombre flottant
console.log(typeof Bool) // Renvoie BOOLEAN puisque Bool est un true ou false
if (typeof Nombre == "Number") {
    console.log("C'est un nombre")
}
```

# -B Création de Fonction
Une fonction est une partie de code nommée qui sert à être executer quand on en a besoin et pouvoir être réutiliser plusieurs fois

Chaque fonction peux avoir 1 ou plusieurs paramètre qui sans mettent entre les parenthèses 
Un paramètre est local à la fonction ne pourra pas être utilisé en dehors de celle ci il est défini à l'appel de la fonction

## -B function <name> () {}
Une fonction nommé peux être executer en l'appelant
Elle peux être défini comme suit : 
```js
function maFonction() {
    alert ("Bonjour !");
}
```

## -B var <Variable> = function () {}
Une fonction anonyme ne peut pas être appelée avant qu’elle n’ait été défini
mais elle peut être stockée dans une variable pour être utilisée par la suite
Défini comme suit : 
```js
var MaFonction = function () {
    alert('Bonjour !');
}
```

## -B () => {}
Les fonctions fléché on un syntaxe courte qui permet de créer des fonctions plus simples. Les parenthèses
doivent être omises si la fonction contient uniquement une expression à renvoyer.
```js
(a) => {
    return a + 1;
}
```

## -B function () {}()
On peut appeler immédiatement une fonction anonyme après sa déclaration, sans lui
donner le nom. Elle sera alors connue sous son nom généré automatiquement.
```js
function () {
    alert('Bonjour !');
}()
```
## -B Les fonction Asynchrone
Une fonction Asynchrone est une fonction __précédée__ par le mot clés `async` et donc elle pourra contenir le mot clés `await`. Le mot clés `await` permet de faire attendre un code le temps qu'une autre s'exécute.
Utiliser pour les fonction qui utilise le système de promesse

Exemple : 
```js
// Je veux attendre d'avoir fini un caclul avant de l'afficher
let Caclul = 0
async function calculator(valeur1, valeur2) {
    let Promesse = await new Promise((resolve, reject) => {
        if (typeof valeur1 != 'number' || typeof valeur2 != 'number') {
            reject("Veuillez saisir des nombres");
        }

        resolve(valeur1 + valeur2)
    }).then((response) => { Caclul = response})
    console.log(Caclul)
}

calculator(10, 10)
```
### -B Les Promesses
Un promesse et entre guillement une condition, elle représente un intérmédiaire proxy vers une valeur 
Elle peux avoir trois valeur : 

- Opération en cours (non terminée) / Quand 
- Opération terminée avec succès (promesse résolue)
- Opération terminée ou stopé avec un échec (promesse rejetée)

On peux créer nos propre promesse ou manipuler des promesses déjà utilisé 
Pour créer une promesse il y a la methode `new Promise`

Exemple: 
```js
// Je créer ma promesse pour savoir si 10+10 est égale à 20
let maPromesse = new Promise((resolve, reject) => {
    // Tache Asynchrone à réaliser
    if (10 + 10 == 20) {
        resolve("La somme est correct");
    } else {
        reject("La somme n'est pas correct");
    }

})
```

# -B Appel d'une fonction
La plupart du temps, vous appelez une fonction avec ses paramètres entre parenthèses
si cette dernière est prévue pour recevoir ces paramètres.
## -B Appel de `MaFonction` sans argument 
```js
function MaFonction() {
    return 'Salut'
}
console.log(MaFonction()) // Ici j'appel la fonction MaFonction sans paramètre et elle me renvoie son code executer 
// Me renvoie 'Salut'
```

## -B Appel de `MaFonction2` avec l'argument `'Bonjour'`
```js
function MaFonction2(texte) {
    return texte
}
console.log(MaFonction2('Bonjour')) // Ici j'appel MaFonction2 avec un paramètre et elle me renvoie son code executer
// Me renvoie 'Bonjour'
```

# -B Document HTML

Pour pouvoir modifié des éléments en HTML on possède un DOM (Document Object Model) (Modèle d'objet de document) qui contient toute les
informations de la page internet et cella nous permet de pouvoir tout modifier comme on le souhaite
Pour pouvoir utiliser le DOM tout est stocker dans une variable qui ce nomme :
## -B document
Exemple : 
```js
console.log(document.body) // Me renvoie l'élément body de ma page qui est stocker dans le DOM
```

### -B getElementById
Permet de récupérer un élément HTML en utilisant son id. En récupérant l'élément il est possible de la modifier comme on le souhaite
Exemple : 
```js
let monDiv = document.getElementById("monId") // Récupère l’élément en utiliser l'id monId et le stocke dans la variable monDiv
```
#### -B innerHTML / textContent
Les deux permettent de modifier le texte contenu dans les balises sélectionner
Exemple :
```js
let MonP = document.getElementById("monId")
MonP.innerHTML = "Ceci est un test" 
// ou
MonP.textContent = "Ceci est un test"
```

#### -B style
Permet de modifier le style de l'élément sélectionner
Toute les modifications de style possible en JS (https://www.w3schools.com/jsref/dom_obj_style.asp)
Exemple :
```js
let MonP = document.getElementById("monId")
MonP.style.fontSize = "10em" // J'agrandi la taille du texte
```

#### -B addEventListener
C'est une fonction qui permet de créer une écoute d’événement bien précis
Elle prend 2 arguments : L'événement que vous voulez écouter et La
fonction à exécuter lorsque cet événement se déclenche
Liste des événement possible (https://www.w3schools.com/jsref/dom_obj_event.asp)
Exemple :
```js
let MonBouton = document.getElementById("monId")
// Je veux ajouter une écoute quand je clique sur le bouton
MonBouton.addEventListener('click', function() {
    console.log("J'ai cliqué !")
})
```

### -B getElementsByClassName 
Cela me permettra de sélectionner plusieurs éléments en utilisant leur class. ATTENTION CETTE FONCTION RENVOIE UN TABLEAU D'ELEMENT
Exemple : 
```js
let MonP = document.getElementsByClassName("paragraphe") // Récupère tout les éléments qui possède la class paragraphe
``` 

### -B getElementsByTagName
Permet de récupérer plusieurs éléments en utilisant leur balise. ATTENTION CETTE FONCTION RENVOIE UN TABLEAU D'ELEMENT
Exemple : 
```js
let MonSpan = document.getElementsByTagName("span") // Récupère toute les balise span
``` 

# -B Orienté Objet
La programmation orienté objet en JS permet de classé de façon propre son code et de pouvoir le réutilisé comme on le veux à la demande 
Une classe est une énorme boite
Un objet est une petite boite

- Les objets sont des instances de classes, ces classes définissent un ensemble de propriétés
(attributs) et méthodes (fonctions).
- Une classe peut être considérée comme une blueprint pour créer plusieurs objets.
- Les objets ont accès aux propriétés et méthodes définies dans leur classe
parente. Elles peuvent également avoir leurs propres propriétés et méthodes.

## -B Création simple d'un objet
Un objet est créé avec l'instruction `new Object()`
```js
var MaBoite = new Object;
// Mon objet est créer mais vide
```
### -B Création de variable dans mon objet
```js
var MaBoite = new Object;
MaBoite.MaVariable = "Ok mec"
// J'ai créer une Variable qui ce nomme MaVariable dans mon objet et elle contient la chaîne de caractère
// Ok mec
```
### -B Création d'une fonction dans mon objet
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
### -B Appelé une fonction qui ce trouve dans mon objet
```js
MaBoite.MaFonction()
// J’appelle la fonction MaFonction qui ce trouve dans MaBoite
```

## -B Création d'un littéral objet 
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

## -B Utilisation des fonction comme objet
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

### -B Le this 
On l'a légèrement vu il veux dire ceci donc dans notre cas il veux dire dans cette fonction 
le but du this est de dire au variable que je vais mettre juste après lui séparer d'un point 
est de dire je vais créer une variable dans cette fonction elle y sera local mais pourra être réutilisé 
dans des objets distinct

### -B Interdire la modification de certaine propriété 
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

### -B Système d'héritage
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

### -B Objet Conditionnelle 
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

### -B Suppresion de propriété dans un objet
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

### -B Vérifier si un propriété existe
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

### -B Méthode Chaining
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


