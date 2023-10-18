<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice 3D</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="calculator">
        <div class="display">
            <input type="text" id="result" value="0" readonly>
        </div>
        <div class="buttons">
            <!-- Boutons de la calculatrice -->
            <button class="function">sin</button>
            <button class="function">cos</button>
            <button class="function">tan</button>
            <button class="function">ln</button>
            <button class="function">log</button>
            <button class="function">√</button>
            <button class="function">^</button>
            <button class="number">7</button>
            <button class="number">8</button>
            <button class="number">9</button>
            <button class="operator">/</button>
            <button class="number">4</button>
            <button class="number">5</button>
            <button class="number">6</button>
            <button class="operator">*</button>
            <button class="number">1</button>
            <button class="number">2</button>
            <button class="number">3</button>
            <button class="operator">+</button>
            <button class="number">0</button>
            <button class="number">.</button>
            <button class="operator">=</button>
            <button class="operator">-</button>
            <button class="clear">AC</button>
            <button class="constants">π</button>
        </div>
    </div>
    <script>
        // Récupérer l'affichage et les boutons
        const display = document.getElementById('result');
        const buttons = document.querySelector('.buttons');

        // Gérer les clics sur les boutons
        buttons.addEventListener('click', function(event) {
    if (event.target.tagName === 'BUTTON') {
        const buttonValue = event.target.textContent;
        if (buttonValue === '=') {
            try {
                // Évaluer l'expression et mettre à jour l'affichage
                const result = eval(display.value);
                display.value = result;
            } catch (error) {
                display.value = 'Erreur';
            }
        } else if (buttonValue === 'AC') {
            // Effacer l'affichage
            display.value = '0';
        } else if (buttonValue === 'sin') {
            // Calculer le sin
            const value = parseFloat(display.value);
            display.value = Math.sin(value);
        } else if (buttonValue === 'cos') {
            // Calculer le cos
            const value = parseFloat(display.value);
            display.value = Math.cos(value);
        } else if (buttonValue === 'tan') {
            // Calculer le tan
            const value = parseFloat(display.value);
            display.value = Math.tan(value);
        } else if (buttonValue === 'ln') {
            // Calculer le ln (logarithme naturel)
            const value = parseFloat(display.value);
            display.value = Math.log(value);
        } else if (buttonValue === 'log') {
            // Calculer le log (logarithme base 10)
            const value = parseFloat(display.value);
            display.value = Math.log10(value);
        } else if (buttonValue === '√') {
            // Calculer la racine carrée
            const value = parseFloat(display.value);
            display.value = Math.sqrt(value);
        } else if (buttonValue === '^') {
            // Calculer la puissance (exposant)
            display.value += '^';
        } else {
            // Ajouter la valeur du bouton à l'affichage
            if (display.value === '0' || display.value === 'Erreur') {
                display.value = buttonValue;
            } else {
                display.value += buttonValue;
            }
        }
    }
});

    </script>
</body>
</html>
