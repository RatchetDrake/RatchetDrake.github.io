# Les composants

Les composants en VueJS sont des morceaux de code reutilisable qui peuvent être utilisés partout dans votre application. le composant est autonome. Il peut contenir lui-même d'autres composants, et ainsi construire une arborescence de composants.
Un composant est une pièce unique de votre application qui peut-être utilisée partout dans votre application. Il peut contenir ses propres données, méthodes, cycles de vie, style.

On peux considéré un composant comme une fonction ou on peu lui rajouter des paramètres.

Dans un composant on y retrouve du HTML , du JavaScript et du CSS 
```js
<template>
    <div class="conteneur">
        <h5>Coucou</h5>
    </div>
</template>

<script>
export default {
    name: "Nom De Mon Composant"
}
</script>

<style scoped>
    h5 {
        color: red
    }
</style>
```
## Le template 

Le template contient tout le code HTML du composant, il obligé de contenir un conteneur pour y mettre plusieurs élément

## Le script

Le script contient le code JavaScript du composant il a obligatoirement un `export default` qui va contenir l'objet représentant notre composant.

- `name`: Nom du composant, obligatoire pour que Vue puisse identifier ce composant
- `components`: Objet qui permet de définir d'autres composants que va etre utiliser dans le composant actuel
- `props`: Propriétés transmises au composant (définies dans l'appelant)
- `data`: Fonction retournant un objet contenant les données utilisées par le composant (Définition des variables du composant)
- `methods`: méthodes à exécuter dans le composants (Les différentes fonction du composant)
- `computed`: Calculées en temps réel si les données observées changent
- `watch`:  Observe une propriété et effectue une action lorsque cette propriété change
- `mounted`: Appelée après la création du DOM  
- `created`: La propriété created est appelée juste après la création de l’instance du composant. Elle peut être utile pour effectuer certaines actions une fois que le composant a été créer
- `beforeDestroy`:  appelée avant la destruction du composant

```js
<script>
export default {
    name: "Nom De Mon Composant",
    components: {
        LeComposantQueJutilise
    },
    props: {
        message: {
            default: 'Valeur par défaut',
            type: String // message est de type chaîne de caractères
        }
    },
    data() {
        return {
            icon: "icon.png"
        }
    },
    methods: {
        MaFonction() {
            console.log('Je suis une fonction')
        }
    },
    computed: {
        TimeDisplay() {
            console.log('Je suis une fonction aussi')
        }
    },
    watch: {
        NewMessage() {
            console.log('Encore moi une fonction')
        } 
    },
    mounted() {
        console.log("Je suis appelé après avoir chargé l'HTML")
    },
    created() {
        console.log('Je suis appelé lors de la création du composant')
    },
    beforeDestroy() {
        console.log("Je suis appelé juste avant que le composant ne soit détruit")
    }
}
</script>
```
## Le style 

Va contenir tout le CSS du composant actuel. 
Dans ca balise on peux lui donner quelque attribut :  

`lang`: pour définir la langue que on utilise donc `scss` ou `sass` ou meme `css`
`scoped`: qui va dire au CSS qui ne sort pas du composant

