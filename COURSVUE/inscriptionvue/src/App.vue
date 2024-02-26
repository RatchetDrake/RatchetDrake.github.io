<template>
  <div id="app">
    <nav>
      <router-link to="/"></router-link> 
      <router-link to="/about"></router-link>
    </nav>
    <router-view/>
  </div>
</template>

<style lang="scss">


nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
