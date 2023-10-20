<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice jQuery</title>
    <script src="../../script.js/jquery-3.7.1.min.js"></script>
    <style>
        .boite {
            /* vos styles par défaut pour une boîte */
            width: 100px;
            height: 100px;
            border: 1px solid black;
            display: inline-block;
            margin: 10px;
        }
        @keyframes rainbow {
    0% { background-color: red; }
    14% { background-color: orange; }
    28% { background-color: yellow; }
    42% { background-color: green; }
    57% { background-color: blue; }
    71% { background-color: indigo; }
    85% { background-color: violet; }
    100% { background-color: red; }
}

.active-couleur {
    animation: rainbow 7s linear infinite;
}

        .active-couleur {
            background-color: red; /* ou la couleur de votre choix */
        }

        .active-bords-arrondis {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div id="conteneur">
    <div class="boite"></div>
    <!-- Autres boîtes ici -->
</div>

<button id="activerCouleur">Activer/Désactiver la Couleur</button>
<button id="activerBordsArrondis">Activer/Désactiver les bords arrondis</button>
<button id="ajouterBoite">Ajouter une nouvelle boîte</button>

<script>
    $(document).ready(function() {

        // Activer/Désactiver la couleur
        $("#activerCouleur").click(function() {
            $(".boite").toggleClass("active-couleur");
        });

        // Activer/Désactiver les bords arrondis
        $("#activerBordsArrondis").click(function() {
            $(".boite").toggleClass("active-bords-arrondis");
        });

        // Ajouter une nouvelle boîte
        $("#ajouterBoite").click(function() {
            const nouvelleBoite = $("<div class='boite'></div>");
            $("#conteneur").append(nouvelleBoite);
        });

    });
</script>

</body>
</html>
