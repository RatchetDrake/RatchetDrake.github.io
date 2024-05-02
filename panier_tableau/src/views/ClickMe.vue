<template>
    <div>
      <!-- Bouton qui change de titre au clic -->
      <button @click="changeTitle">{{ title }}</button>
      
      <!-- Lien pour retourner à l'accueil -->
      <router-link to="/"><br>Retourner à l'accueil<br></router-link>
  
      <!-- Champ de saisie lié à la propriété 'nombre' -->
      <input type="number" v-model.number="nombre" />
  
      <!-- Paragraphe pour afficher la valeur en temps réel -->
      <p>Le nombre est : {{ nombre }}</p>
  
      <!-- Section des boutons radio pour la couleur -->
      <h2>Boutons radio :</h2>
      <label>
        <input type="radio" value="red" v-model="selectedColor"> Rouge
      </label>
      <label>
        <input type="radio" value="blue" v-model="selectedColor"> Bleu
      </label>
  
      <!-- Case à cocher pour l'affichage du paragraphe -->
      <h2>Cases à cocher :</h2>
      <label>
        <input type="checkbox" v-model="showParagraph"> Voulez-vous afficher le paragraphe?
      </label>
  
      <!-- Paragraphe conditionnel avec style dynamique -->
      <p v-if="showParagraph" :style="{ color: selectedColor }">
        Paragraphe à afficher
      </p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        title: 'Cliquez moi!', // Initialisation du titre du bouton
        nombre: 4, // Initialisation de la propriété 'nombre'
        selectedColor: 'blue', // Couleur sélectionnée par défaut
        showParagraph: true // Affichage du paragraphe par défaut
      };
    },
    methods: {
      changeTitle() {
        // Changement du titre du bouton après le clic
        this.title = 'Cliqué!';
      }
    }
  }
  </script>
  