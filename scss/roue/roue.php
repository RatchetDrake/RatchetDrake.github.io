<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roue de la Fortune</title>
    <link rel="stylesheet" href="roue.css">
</head>
<body>
    <div class="wheel">
        <div class="wheel-container">
            <div class="wheel-item">1</div>
            <div class="wheel-item">2</div>
            <div class="wheel-item">3</div>
            <div class="wheel-item">4</div>
            <div class="wheel-item">5</div>
            <div class="wheel-item">6</div>
            <div class="wheel-item">7</div>
            <div class="wheel-item">8</div>
            <div class="wheel-item">9</div>
            <div class="wheel-item">10</div>
            <div class="center-circle"></div>
        </div>
        <button id="spin-btn">Tourner</button>
    </div>

    <script>
        const wheel = document.querySelector(".wheel-container");
        const spinBtn = document.getElementById("spin-btn");
        let spinning = false;

        spinBtn.addEventListener("click", () => {
            if (!spinning) {
                const randomDegree = Math.floor(Math.random() * 360);
                const rotation = 3600 + randomDegree;
                wheel.style.transition = "transform 4s ease-out";
                wheel.style.transform = `rotate(${rotation}deg)`;

                // Vous pouvez ajouter du code pour gérer la sélection du chiffre ici

                spinning = true;
                setTimeout(() => {
                    spinning = false;
                }, 4000);
            }
        });
    </script>
</body>
</html>
