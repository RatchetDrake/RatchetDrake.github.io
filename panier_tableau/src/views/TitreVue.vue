    <!-- 
Créez et utilisez un composant simple qui permet d'ajouter <h1>Grand titre</h1> à la page.
Utilisez une propriété valeur du composant pour spécifier le texte à afficher dans le h1. 
L'utiliser au moment de l'appel du composant.
À partir de l'exercice précédent, prévoir un champ de saisie de type texte pour pouvoir 
spécifier le titre à fournir comme propriété du composant. 
-->
<template>
    <div id="container">
      <router-link to="/" class="home-link">Retourner à l'accueil</router-link>
      <input type="text" v-model="titre" placeholder="Entrez le titre ici" class="input-title">
      <grand-titre :valeur="titre"></grand-titre>
    </div>
  </template>
  
  <script>
  // Importez le composant GrandTitre
  import GrandTitre from '../components/GrandTitre.vue'
  
  export default {
    components: {
      GrandTitre
    },
    data() {
      return {
        titre: '' // La valeur initiale du titre, modifiable par l'utilisateur
      };
    }
  }
  </script>
  
  <style scoped>
  #container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
  }
  
  .home-link {
    margin-bottom: 20px;
    color: #4CAF50;
    text-decoration: none;
    font-size: 16px;
    transition: color 0.3s ease;
  }
  
  .home-link:hover {
    color: #087f23;
  }
  
  .input-title {
    margin-bottom: 20px;
    padding: 10px;
    font-size: 16px;
    width: 300px;
    border: 2px solid #ccc;
    border-radius: 4px;
  }
  
  grand-titre {
    font-size: 28px;
    color: #333;
  }
  </style>
  