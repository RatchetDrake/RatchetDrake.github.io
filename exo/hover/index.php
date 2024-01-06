<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="conteneur">
  <article id="article">
    <div class="contenuCache">
      <h2>Titre de l'article</h2>
      <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum reiciendis est eligendi vitae officia nesciunt aut dolor dolorum in iusto</p>
      <button onclick="fermerArticle()">Read More</button>
    </div>
  </article>
</div>

<script>
function fermerArticle() {
  var article = document.getElementById('article');
  article.dispatchEvent(new Event('mouseout')); // Simule un mouseout sur l'article
}


</script>
</body>
</html>