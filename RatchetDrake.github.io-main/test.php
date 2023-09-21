<!DOCTYPE html>
<html>
<head>
    <title>Horloge Interactive</title>
    <script type="text/javascript">
        var heurePersonnalisee = null;
        var tempsRestant = 0;

        function actualiserHeure() {
            var date = new Date();
            var options = {
                timeZone: 'Europe/Paris',
                hour12: false,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            };

            if (tempsRestant > 0) {
                tempsRestant--;
                document.getElementById("heure").innerHTML = heurePersonnalisee;
            } else {
                var heureFrance = date.toLocaleTimeString('fr-FR', options);
                document.getElementById("heure").innerHTML = heureFrance;
            }

            setTimeout(actualiserHeure, 1000); // Actualiser l'heure toutes les 1 seconde
        }

        window.onload = actualiserHeure; // Appeler la fonction au chargement de la page

        function personnaliserHeure() {
            var heures = document.getElementById("heures").value;
            var minutes = document.getElementById("minutes").value;
            var secondes = document.getElementById("secondes").value;

            heurePersonnalisee = heures + ":" + minutes + ":" + secondes;
            tempsRestant = 10; // Changer ici le nombre de secondes que l'heure personnalisée sera affichée

            document.getElementById("heure").innerHTML = heurePersonnalisee;
        }
    </script>
</head>
<body>
    <h1>Horloge Interactive</h1>
    <p>L'heure actuelle en France est : <span id="heure"></span></p>

    <h2>Personnaliser l'heure</h2>
    <form>
        <label for="heures">Heures (0-23):</label>
        <input type="number" id="heures" min="0" max="23">
        <br>
        <label for="minutes">Minutes (0-59):</label>
        <input type="number" id="minutes" min="0" max="59">
        <br>
        <label for="secondes">Secondes (0-59):</label>
        <input type="number" id="secondes" min="0" max="59">
        <br>
        <input type="button" value="Mettre à jour l'heure" onclick="personnaliserHeure()">
    </form>
</body>
</html>
