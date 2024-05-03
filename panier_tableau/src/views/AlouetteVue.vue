<template>
    <div>
      <p>{{ fullText }}</p>
      <p>Que lui plumer ? <input type="text" v-model="inputText" @keyup.enter="addText"><button @click="addText">OK</button></p>
      
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        originalText: 'Alouette, gentille alouette, alouette, je te plumerai. Je te plumerai, ',
        inputText: '', // Le texte que l'utilisateur entre
        fullText: 'Alouette, gentille alouette, alouette, je te plumerai. Je te plumerai, ' // Le texte complet qui s'affiche
      };
    },
    methods: {
      addText() {
        this.fullText += this.inputText + ' '; // Ajoute le texte entré à la suite du texte existant
        this.inputText = ''; // Réinitialise le champ de saisie
      }
    }
  }
  </script>
  