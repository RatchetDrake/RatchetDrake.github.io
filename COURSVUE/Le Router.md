# Le routeur VueJS (VueRouter)

En VueJS il exsite une extension qui ce nomme router il sert à faire le lien entre toute les pages de notre projet.

Pour chaque page que on créer on doit la lié à une route dans `index.js` dans le dossier router.

## Fichier `index.js` du Router par défaut 
```js
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [

]

const router = new VueRouter({
  routes
})

export default router
```

On peut ajouter des routes en utilisant l'objet `routes`. Pour cela il est nécessaire de définir une propriété `path`, 
une propriété `name`, et la propriété `component`.

`path`: path est l'alias du chemin des pages, par exemple la page principal le path est `/`
`name`: C'est me nom de la page , c'est un identifiant unique pour cette page. On ne peut pas avoir deux fois le même nom de page. Par convention il est en minuscule et sans espace. Exemple : (accueil)
`component`: Le fichier ou ce trouve la page elle meme que on a import au préalable avec `import Component from './components/Component.vue'`

## Rajout de route

On ajoute une nouvelle route pour la page "Accueil" :
```js
import Vue from 'vue'
import VueRouter from 'vue-router'

import Accueil from '@/views/Accueil.vue' // Importation de la vue associée à cette page
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'accueil',
    component: Accueil
  }
]

const router = new VueRouter({
  routes
})

export default router
```
Ici pour accéder à ma page accueil dans mon URL de page je devrai juste mettre un slash 

## Router View 

La balise router view est indispensable pour pouvoir afficher nos différente page, elle permet d'afficher les composants Vue qui sont liés aux différentes routes défini. 
La balise ce met généralement dans le fichier App.vue

Exemple: 
```js
<template>
  <div id="app">
    <router-view/>
  </div>
</template>
```

## Router Link
La balise router link permet de navigation entre les différentes route créer auparavant. Elle est utiliser pour afficher des liens vers d'autres pages. 

Exemple: 
```js
<template>
  <div id="app">
    <nav> 
      <!-- On utilise l'attribut to qui correspond au path de la route -->
      <router-link to="/">Accueil</router-link>
    </nav>
    <router-view/>
  </div>
</template>
```