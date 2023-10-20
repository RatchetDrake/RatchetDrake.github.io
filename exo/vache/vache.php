<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La vache Bleue par Gelett Burgess</title>
    <script src="../../script.js/jquery-3.7.1.min.js"></script>
    <style>
    .color-word {
        font-weight: bold; /* Vous pouvez ajouter d'autres styles ici si nécessaire */
    }
</style>
</head>
<body>

<h1>La vache Bleue par Gelett Burgess</h1>
<p id="poeme">Je n'ai jamais vu une vache Bleue, Je n'espère jamais voir un ; Mais je peux vous dire, de toute façon, Je verrais plutôt qu'être un !</p>

<label>Changer la couleur de la vache : </label>
<input type="text" id="couleurVache" placeholder="Ex: Pourpre">
<button id="changerCouleur">Changer !</button>

<script>
$(document).ready(function() {

$("#changerCouleur").click(function() {
    const nouvelleCouleur = $("#couleurVache").val().toLowerCase();

    // Liste des couleurs de l'arc-en-ciel
    const couleursArcEnCiel = ["rouge", "orange", "jaune", "vert", "bleu", "indigo", "violet"];

    // Si la nouvelle couleur est dans la liste des couleurs de l'arc-en-ciel, appliquez cette couleur au texte
    if (couleursArcEnCiel.includes(nouvelleCouleur)) {
        const replacement = `<span style="color:${nouvelleCouleur}">${nouvelleCouleur}</span>`;

        // Expression régulière pour remplacer toutes les occurrences de "Bleue" (insensible à la casse)
        const regex = /Bleue/gi;

        // Changement dans le poème
        const contenuPoeme = $("#poeme").text().replace(regex, replacement);
        $("#poeme").html(contenuPoeme);

        // Changement dans le titre
        const contenuTitre = $("h1").text().replace(regex, replacement);
        $("h1").html(contenuTitre);
    }
});

});
</script>

</body>
</html>
