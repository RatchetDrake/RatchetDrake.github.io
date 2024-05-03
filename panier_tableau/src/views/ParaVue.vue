<template>
    <div>
        <router-link to="/"><br>Retourner à l'accueil<br></router-link>
        <ul>
            <li>Boutons radio: <br>
                Rouge <input type="radio" v-model="couleur" name="color" value="red"> <br>
                Bleu  <input type="radio" v-model="couleur" name="color" value="blue">
            </li>
            <li>Cases à cocher: <br>
                Voulez-vous afficher le paragraphe ? <input type="checkbox" v-model="show">
            </li>
            <li>
                Choix de la police: <br>
                <select v-model="fontFamily">
                    <option>Cursive</option>
                    <option>Serif</option>
                    <option>Sans-Serif</option>
                    <option>Monospace</option>
                    <option>Fantasy</option>
                </select>
            </li>
        </ul>
        <p v-show="show" :style="{color: couleur, fontFamily: fontFamily}">
            Paragraphe à afficher
        </p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            couleur: 'chartreuse', // Couleur initiale du texte
            show: false, // Contrôle l'affichage du paragraphe
            fontFamily: 'Cursive' // Police initiale
        }
    },
}
</script>
