<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/ch.gif">
    <HelloWorld msg="Bonjour à tous les utilisateurs du site !"/>
  </div>
</template>

<script>
// @ is an alias to /src
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'HomeView',
  components: {
    HelloWorld
  }
}
</script>
