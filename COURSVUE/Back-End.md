# Back-End 

Pour pouvoir faire une inscription de donnée dans une base donnée MySQL (phpmyadmin), il faut créer une application tiérce qui va interagir avec la base. 
Cette application tièrce est une API (Application Programming Interface)

<img src="https://www.altexsoft.com/media/2019/06/1.png">

L'API va faire office de lien entre la base de données et l'application Web, permettant ainsi d'interagir avec celle-ci.

# Initialisation de L'API

Pour faire une API on va utiliser NodeJS,
Avec NodeJS  nous allons utiliser le module `express` qui va permettre de créer le serveur sur le port que l'on souhaite, Le module `cors` qui est une extension de `express` et le module `mysql2` qui va permettre de faire les requetes SQL.

## En premier 
On doit initialisé notre projet API, donc on créer une dossier pour celui-ci. Exemple: FormulaireAPI

Puis on initialise le package.json en utilisant la commande `npm init`
###  Le Package.Json
Le fichier package.json contient des  informations sur votre projet comme son nom, sa version , les dépendances qu'il a besoin, ect.
On va devoir aller lui rajouter le type de JS qu'on va utiliser
```json
{
  "name": "formulaireapi",
  "version": "1.0.0",
  "description": "",
  "type": "module", // Cette ligne à mettrez à jour avec le type de JS
  "main": "index.js",
  "scripts": {
    "test": "echo \"Error: no test specified\" && exit 1"
  },
  "author": "",
  "license": "ISC",
  "dependencies": {}
}
- Module : Qui sert à utiliser la méthode import
- CommonJS : Qui sert à utiliselr la méthode require

```

Ensuite, il nous faut installer `express`, `cors` et `mysql2`

## Arboresence des dossiers
Généralement dans une API on divise tout les fichier pour pouvoir gérer les moindres erreurs possible. Voici l'arboresence : 

- `config` : Ceci est un dossier qui va contenir la connexion à notre base de donnée MySQL.
- `controllers` : Ceci est un dossier qui contiendra les controllers correspondants aux routes.
- `models` : Ceci est un dossier qui contiendra les models correspondants aux tables de notre base de données.
- `routes` : Ceci est un dossier qui va contenir toute les routes.
- `index.js` : Ce fichier est le fichier principal de L'API.

## `Index.js`

Dans le fichier `index.js` je vais avoir tout le paramètrage de express.

```js
import express from 'express';
import cors from 'cors'
import Router from './routes/routes.js';
// J'importe toute mes dépendances donc j'ai besoin et aussi mon router qu'il faut que je lie à mon serveur expres
const Server = express() // J'initialise l'application Express

Server.use(express.json()) // Pour parser les données envoyées par les clients au format JSON
Server.use(cors()) // Je permets aux requêtes cross domaine de se faire sans restriction
Server.use(Router) // Je lie mon router a l'application Express

Server.listen(5000, () => { console.log('Démarrer')})
// Je lui donne le port d'écoute et lui dit de console.log quand il écoute le port
```

## `routes`
Dans mon dossier routes je vais créer un fichier routes.js qui va contenir mes différantes routes de l'API


```js
import express from 'express'

const router = express.router() // J'initialise le routeur d'express

// Les routes GET
router.get('GetElement/:id', function)
// Les routes Get permette de récupérer des éléments

// Les routes POST 
router.post('SetElement', function)
// Les routes POST permette de créer des éléments

// Les routes PUT
router.put('UpdateElement/:id', function)
// Les routes PUT permette de modifier des éléments

// Les routes DELETE
router.delete('DeleteElement/:id', function)
// Les routes Delete permet de supprimer des éléments

export default router
```
GET, POST, PUT, DELETE sont des protocoles HTTP pour interagir avec une API.

Dans les différentes route que j'ai créer j'ai mis `function`  pour indiquer qu'il faudra compléter ces fonctions avec du code JavaScript ces fonction doivent provenir du controllers
```js
import express from 'express'
const router = express.router() // J'initialise le routeur d'express

import { GetEl } from '../controllers/elementsController.js' // j'importe la fonction correspondante à ma route dans le controller
// Les routes GET
router.get('GetElement/:id', GetEl)
// Les routes Get permette de récupérer des éléments

export default router
```

La fonction `GetEl()` est définie dans un autre fichier et elle prend en paramètre req (requête) et res (réponse).

## `controllers`

Dans les controllers sont mis les fonctions qui sont appelé directement par les routes. Elles vont gérer les erreurs.
Exemple fichier  `elements.js` qui contient les méthodes associées aux routes :

```js
import Elements from '../models/Elements' // j'importe mon model "Elements" que je nomme "Elements"

// Devant la fonction j'insere l'export puisque la fonction GetEl est utilisée dans un autre fichier
export function GetEl(reponse, requete) {
  // J'appele la fonction GetAllElement de mon modéle
  const Donnée = Elements.GetAllElement()
  // Et je renvoie les données dans la requete
  requete.json(Donnée)
}
```
Pour chaque fonction qui va etre utiliser par les routes il faut mettre export devant la fonction sinon elle ne sera pas accessible.

## `Models`

Dans le dossier models sont mis toute les fonctions vont faire les requete vers le serveur MySQL.
Exemple  du fichier `Elements.js`:
```js
import db from '../config/database.js' // J'importe la connexion à ma base donnée comme dans PHP 

export async function GetAllElement(){
  return await db.query("SELECT * FROM Elements")
}
```
Ici j'utilise async et await il me sont utile pour attendre que ma requête soit fini avant de continuer. Cela évite les problèmes

## `config` 

Dans le dossier config on va mettre toutes les informations pour se connecter a la BDD :

Exemple du fichier `database.js` : 
```js
import mysql from 'mysql2'

const db = mysql.createPool({
  hostname: 'localhost',
  user: '',
  password: '',
  database: ''
  port: 3306 // Différe sur MacOS (8889)
})

export default db;
```

# Le Cheminement 

L'API fonctionne dans le sens : 

Requête externe -> La routes séléctionné -> Le controllers de la route (fonction) -> Le modéle qui est appelé dans le controllers -> La requete SQL 

