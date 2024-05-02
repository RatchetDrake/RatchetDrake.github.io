# Les V fonction 

Ce sont des fonctions qui sont utile dans l'HTML

## v-if 
Le v-if sert à faire une condition en HTML . Si la condition est remplie, le contenu de cette balise va être afficher
Exemple :
```js
<template>
    <div>
        <p  v-if="Julien == gay">Si Julien est gay je suis afficher</p>
    </div>
</template>
```

## v-else 
Le v-else est la condition  inverse de v-if. Si le v-if n'est pas valide, alors on affiche le v-else.
Exemple :
```js
<template>
    <div>
        <p  v-if="Julien == gay">Si Julien est gay je suis afficher</p>
        <p v-else>Comment ca il est pas gay ?</p>
    </div>
</template>
```

## v-else-if 
Le v-else-if sont les condition multiple pour une même variable.
Exemple :
```js
<template>
    <div>
        <p v-if="Julien == gay">Si Julien est gay je suis afficher</p>
        <p v-else-if="Julien == trans">Si Julien est trans je suis afficher</p>        
        <p v-else-if="Julien == xenomorphe">Si Julien est xenomorphe je suis afficher</p>
        <p v-else>Rien de tout ca ?</p>
    </div>
</template>
```

## v-show 
Le v-show est comme le v-if si la valeur est vrai  alors l'élément est visible sinon non.
Exemple :
```js
<template>
    <div>
        <p  v-show="Julien == gay">Si Julien est gay je suis afficher</p>
    </div>
</template>
```

## v-show VS v-if
La différence entre v-show et v-if c'est que v-if si la condition est fausse initialement elle n'apparaitera jamais sur la page alors que le v-show ne fait aucune différence meme si la condition est fausse de base il affichera quand elle passe vraie

## v-for 
Le v-for est une boucle for comme on avais vu en JavaScript sauf que celle si fonctionne en HTML

### v-for avec une plage
On peux faire tourner la boucle un certain nombre de fois
Dans le cas de l'exemple la boucle tourne 100 fois
Exemple : 
```js
<template>
    <div>
        <article v-for="value in 100" :key=value> 
            <p>{{ value }}</p>
        </article>
    </div>
</template>
```

### v-for avec une objet
On peux faire une boucle grace à un objet (JSON)
Exemple : 
```js
<template>
    <div>
        <article v-for="(value, index) in obj" :key=index> 
            <p>{{ value.name }} à {{ value.age }} ans</p>
        </article>
    </div>
</template>
<sciprt>
    export default {
        data() {
            return {
                obj: [
                    {
                        name: 'John Doe',
                        age: 18
                    }, 
                    {
                        name: 'Jane Smith',
                        age: 25
                    },
                    {
                        name: 'Alice Johnson',
                        age: 30
                    }
                ]
            }
        }
    }
</script>
```

## v-model 
Le v-model sert à lié une variable vue au contenu d'un élément HTML. 
Cela signifie que si le contenu change dans la variable de vue, change aussi le contenu du champ et vice versa.
```js
<template>
    <div>
        <input v-model="Valeur"> 
    </div>
</template>

<script>
    export default {
        data() {
            return {
                Valeur: ''
            }
        }
    }
</script>
```

## v-on 
Le v-on sert à faire une écoute d'un événement sur un élément HTML. Il est utilisé pour attacher des méthodes aux événements natifs de l'élément comme click ou mouseover.
Le v-on à un raccourci qui est @ il peux etre utiliser de la meme manière.
```js
<template>
    <div>
        <button v-on:click="ClickMe()"></button>
        <button @click="ClickMe()"></button>
        {/*  Les deux lignes ci dessus font exactement la même chose */}
    </div>
</template>
```

## v-bind
Le v-bind permet de liez dynamiquement un ou plusieurs attribut d'élément HTML à une expression JavaScript
Le v-bind à un raccourci qui est : il peux etre utiliser de la meme manière
```js
<template>
    <div>
        <img alt="Vue logo" v-bind:src="img" />
        <img alt="Vue logo" :src="img" />
        {/*  Les deux lignes ci dessus font exactement la même chose */}
    </div>
</template>
<sciprt>
    export default {
        data() {
            return {
                img: 'logo.png'
            }
        }
    }
</script>
```
