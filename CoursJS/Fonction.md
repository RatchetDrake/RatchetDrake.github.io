[Retour](https://github.com/TamakiYagami/Cours/tree/main/CoursJS)

# Création de Fonction
Une fonction est une partie de code nommée qui sert à être executer quand on en a besoin et pouvoir être réutiliser plusieurs fois

Chaque fonction peux avoir 1 ou plusieurs paramètre qui sans mettent entre les parenthèses 
Un paramètre est local à la fonction ne pourra pas être utilisé en dehors de celle ci il est défini à l'appel de la fonction

## function <name> () {}
Une fonction nommé peux être executer en l'appelant
Elle peux être défini comme suit : 
```js
function maFonction() {
    alert ("Bonjour !");
}
```

## var <Variable> = function () {}
Une fonction anonyme ne peut pas être appelée avant qu’elle n’ait été défini
mais elle peut être stockée dans une variable pour être utilisée par la suite
Défini comme suit : 
```js
var MaFonction = function () {
    alert('Bonjour !');
}
```

## () => {}
Les fonctions fléché on un syntaxe courte qui permet de créer des fonctions plus simples. Les parenthèses
doivent être omises si la fonction contient uniquement une expression à renvoyer.
```js
(a) => {
    return a + 1;
}
```

## function () {}()
On peut appeler immédiatement une fonction anonyme après sa déclaration, sans lui
donner le nom. Elle sera alors connue sous son nom généré automatiquement.
```js
function () {
    alert('Bonjour !');
}()
```
## Les fonction Asynchrone
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

# Appel d'une fonction
La plupart du temps, vous appelez une fonction avec ses paramètres entre parenthèses
si cette dernière est prévue pour recevoir ces paramètres.
## Appel de `MaFonction` sans argument 
```js
function MaFonction() {
    return 'Salut'
}
console.log(MaFonction()) // Ici j'appel la fonction MaFonction sans paramètre et elle me renvoie son code executer 
// Me renvoie 'Salut'
```

## Appel de `MaFonction2` avec l'argument `'Bonjour'`
```js
function MaFonction2(texte) {
    return texte
}
console.log(MaFonction2('Bonjour')) // Ici j'appel MaFonction2 avec un paramètre et elle me renvoie son code executer
// Me renvoie 'Bonjour'
```

### Les Promesses
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