<template>
    <div>
        <router-link to="/" class="home-link">Retourner à l'accueil</router-link>
      <button v-if="!fieldsShown" @click="showFields">Nouveau terme</button>
      
      <div v-if="fieldsShown">
        <label>Terme: <input type="text" v-model="term" /></label><br>
        <label>Définition: <input type="text" v-model="definition" /></label><br>
        <button @click="addTerm">OK</button>
      </div>
  
      <div v-for="item in terms" :key="item.id">
        <p>Premier champ : {{ item.term }}</p>
        <p>Autre premier champ : {{ item.definition }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        term: '',
        definition: '',
        fieldsShown: false,
        terms: [],
        nextId: 0
      };
    },
    methods: {
      showFields() {
        this.fieldsShown = true;
      },
      addTerm() {
        this.terms.push({ id: this.nextId++, term: this.term, definition: this.definition });
        this.term = '';
        this.definition = '';
        this.fieldsShown = false;
      }
    }
  }
  </script>
  <style scoped>
  button {
    margin: 5px;
    padding: 10px;
  }
  
  input[type="text"] {
    margin: 5px;
    padding: 5px;
  }
  
  div {
    margin-top: 20px;
  }
  </style>
  