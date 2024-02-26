<template>
  <div>
    <section id='slideBar'>
      <button> ok mec</button>
      <div>
          <button onclick="Profil()">Profil</button>
          <button>Paramètres</button>
          <button id="ButtonMode" onclick="ToggleMode()">Mode Nuit</button>
          <button onclick="Deconnexion()">Déconnexion</button>
      </div>
  </section>
    <header>
      <button>mon site internet</button>
      <button onclik="OpenLoginmenu()">Ok mec</button>
    </header>
  <nav>
    <ul>
        <li>Pulls</li>
        <li>Pantalons</li>
        <li>T-Shirts</li>
        <li>Pyjamas</li>
        <li>Parkas</li>
        <li>Vestes</li>
        <li>Cramptés</li>
    </ul>
</nav>
  <div>
    <h2>Tendances Du Moment</h2>
    <div class="swiper">
      <div class="swiper-wrapper">
      </div>
      <div class="swiper-pagination"></div>

      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </div>
  </div>
</template>

<script>
export default {
  name: 'HomeView',
  // Autres propriétés et méthodes de votre composant
}
</script>

<style scoped>
header {
  width: 100%;
  height: 10vh;
  background-color: blue;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 2%;
  box-sizing: border-box;
}
header button:first-child {
  border: none;
  background-color: aliceblue;
  padding: 1%;
  border-radius: 25px;
  font-size: 1.1em;
  cursor: pointer;
}

header button:last-child {
  border: none;
  background-color: aliceblue;
  padding: 0.5% 1%;
  border-radius: 25px;
  font-size: 1.05em;
  cursor: pointer;
}

nav {
  margin-top: 0;
  width: 100%;
  height: 6vh;
  background-color: blue;
}
nav ul {
  margin-top: 0;
  list-style-type: none;
  display: flex;
  justify-content: space-around;
  align-items: center;
  height: 100%;
  color: white;
  max-width: 50%;
}
section {
  background-color: var(--HeaderBackground);
  position: absolute;
  right: -25%;
  transition: right 2s;
  top: 10%;
  height: 280px;
  z-index: 10;
  width: 16%;
  display: flex;    
  flex-direction: column;
  align-items: center;
  padding: 2%;
  border-bottom-left-radius: 20px;
}

section div {
  display: flex;
  flex-direction: column;
  width: 100%;
}

section button {
  cursor: pointer;
  border: none;
  padding: 2% 10%;
  font-size: 1em;
  border-radius: 15px;
  margin: 3%;
}
section div button {
  width: 55%;
  margin: 6% 0 0;
}
section div button:last-child {
  margin-top: 20%;
}
</style>


