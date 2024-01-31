[Retour](https://github.com/TamakiYagami/Cours/tree/main/CoursJS)

# Document HTML

Pour pouvoir modifié des éléments en HTML on possède un DOM (Document Object Model) (Modèle d'objet de document) qui contient toute les
informations de la page internet et cella nous permet de pouvoir tout modifier comme on le souhaite
Pour pouvoir utiliser le DOM tout est stocker dans une variable qui ce nomme :
## document
Exemple : 
```js
console.log(document.body) // Me renvoie l'élément body de ma page qui est stocker dans le DOM
```

### getElementById
Permet de récupérer un élément HTML en utilisant son id. En récupérant l'élément il est possible de la modifier comme on le souhaite
Exemple : 
```js
let monDiv = document.getElementById("monId") // Récupère l’élément en utiliser l'id monId et le stocke dans la variable monDiv
```
#### innerHTML / textContent
Les deux permettent de modifier le texte contenu dans les balises sélectionner
Il faut faire attention si on met le textContent et que on met une balise HTML elle sera prise en texte et pas en balise alors
que le innerHTML prendera la balise

Exemple :
```js
let MonP = document.getElementById("monId")
MonP.innerHTML = "Ceci est un test" 
// ou
MonP.textContent = "Ceci est un test"
```

#### style
Permet de modifier le style de l'élément sélectionner
Toute les modifications de style possible en JS (https://www.w3schools.com/jsref/dom_obj_style.asp)
Exemple :
```js
let MonP = document.getElementById("monId")
MonP.style.fontSize = "10em" // J'agrandi la taille du texte
```

#### addEventListener
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

### getElementsByClassName 
Cela me permettra de sélectionner plusieurs éléments en utilisant leur class. ATTENTION CETTE FONCTION RENVOIE UN TABLEAU D'ELEMENT
Exemple : 
```js
let MonP = document.getElementsByClassName("paragraphe") // Récupère tout les éléments qui possède la class paragraphe
``` 

### getElementsByTagName
Permet de récupérer plusieurs éléments en utilisant leur balise. ATTENTION CETTE FONCTION RENVOIE UN TABLEAU D'ELEMENT
Exemple : 
```js
let MonSpan = document.getElementsByTagName("span") // Récupère toute les balise span
``` 