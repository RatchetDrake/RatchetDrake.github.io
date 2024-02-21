# Premier Cours De VueJS

VueJS est un framework de JavaScript qui est open-source et très populaire. Il est utiliser pour construire interfaces utilisateur et des applications web mono pages.

# Installer VueJS

Pour installer VueJS il suffit d'avoir installer `Node.JS`  et `npm` (Node Package Manager). Pour cela vous pouvez consulter la documentation officielle.

Il faut installer le packet VueJS via npm (Node Package Manager) : 
```bash
npm install -g vue --save
```
Puis aussi installer le CLI (Command Line Interface) de VueJS
```bash
npm install -g @vue/cli
```

# Créer un projet d'application

Pour créer le projet d'application il suffit de faire la commande `vue create <NomDuProjet>`
```bash
vue create premier-cours-de-vuejs
```

# Notre Projet

Après la création de notre projet une arborescence de fichier qui est créer 

`node_modules` : C'est une dossier qui va stocker toute les dépendances de notre projet
Donc tout les modules que on installe en plus dans notre projet se mettraient dedans.

`public` : Le dossier public stocke l’icône de notre projet et le fichier `index.html`
Le fichier `index.html` est le fichier de base du projet que on ne touche jamais sauf pour changer l’icône.

`src` : est le dossier qui va contenir plus de 98% de notre site  internet, c’est là qu’on va écrire nos codes HTML, CSS et JavaScript

`.eslintrc.js` : est le fichier de configuration  d’Eslint, c’est un outil qui permet de vérifier si votre code respecte ou non certaines normes de codage.

`.gitignore` : Est un fichier qui permet de dire à GitHub d'ignorer certain fichier ou dossier

`babel.config.js` : Est un fichier qui permet de configurer babel

`jsconfig.json` : Est un fichier qui permet de  configurer les comportements de JS

`package_lock.json` : Stocke toute les dépendances  exactes de notre projet, ceci évite des conflits entre les versions.

`package.json` : C'est un fichier JSON qui contient des informations tel que : Les modules installer, le nom du projet, la version, les script executable, ...

`vue.config.js` : Est la configuration de vue dans notre projet

# Dans `src` 

On va passer le plus de temps dans ce dossier la 
Dans le dossier `src` on y trouve plusieurs autre fichier/dossier qui vont nous être très utile : 

`assets` : C'est le dossier qui stocke tout les media (image, video, musique, document, ..)

`components` : Stocke tout les composants de la page (Des  parties réutilisables des pages)

`router` : Stocke chaque route des pages 

`views` : Stocke chaque pages

`App.vue` : C'est le fichier principal de notre projet. 
C'est le parent de toutes les autres page

`main.js` : C'est le fichier principal JavaScript de notre projet


