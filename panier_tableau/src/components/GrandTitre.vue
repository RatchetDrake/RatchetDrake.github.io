<template>
    <h1>{{ valeur }}</h1>
  </template>
  
  <script>
  export default {
    props: {
      valeur: {
        type: String,
        default: 'Titre par défaut'
      }
    }
  }
  </script>
  