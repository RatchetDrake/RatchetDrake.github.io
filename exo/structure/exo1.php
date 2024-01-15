<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Maquette de Site Web</title>
<style>
  body {
    display: flex;
    flex-direction: column;
    height: 100vh;
    margin: 0;
  }
  header, footer, nav, article, aside, section {
    text-align: center; /* Centre le texte pour tous les éléments */
  }
  header, footer {
    background-color: #ffd700;
    padding: 1rem;
    margin: 10px;
  }
  nav {
    background-color: #add8e6;
    padding: 0.5rem;
    margin-bottom: 10px;
  }
  main {
    flex: 1;
    display: flex;
    padding: 1rem;
   
  }
  article {
    background-color: #ffa07a;
    flex: 3; /* L'article prend trois parts de l'espace disponible */
    margin-right: 1rem; /* Ajout d'une marge à droite pour séparer de l'aside */
  }
  aside {
    background-color: #40e0d0;
    flex: 1; /* L'aside prend une part de l'espace disponible */
  }
  section {
    background-color: #f08080;
    margin: 10px;
  }
  footer {
    margin-top: 10px;

    background-color: #dda0dd;
  }
  .div{
    background-color: #40e0d0;
    padding: 10px;
  }
</style>
</head>
<body>
<header>
  <h1>Header</h1>
  <nav>
  <p>Navigation</p>
</nav>
</header>

<main>
  <article>
    <h2>main</h2>
    <div class="div"><h2>article</h2>
    <section>
      <h2>Section 1</h2>
      <p>Contenu de la section 1</p>
    </section>
    <section>
      <h2>Section 2</h2>
      <p>Contenu de la section 2</p>
    </section></div>
  </article>
  <aside>
    <h2>Aside</h2>
    <p>Contenu supplémentaire</p>
  </aside>
</main>
<footer>
  <p>Footer</p>
</footer>
</body>
</html>
