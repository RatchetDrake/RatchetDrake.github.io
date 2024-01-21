<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chrono</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      text-align: center;
      margin-top: 50px;
      background-color: #f0f0f0;
    }

    #chrono-container {
      font-size: 3em;
      color: #007bff; /* Couleur bleue */
      display: inline-block;
      position: relative;
    }

    #chrono {
      z-index: 1;
    }

    .label {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      z-index: 0;
      font-size: 0.4em;
      color: #555; /* Couleur grise pour les étiquettes */
    }

    .button-container {
      margin-top: 20px;
    }

    button {
      font-size: 1.5em;
      padding: 10px 20px;
      background-color: #007bff; /* Couleur bleue */
      color: #fff; /* Texte blanc */
      border: none;
      margin: 0 10px;
      cursor: pointer;
    }

    button:hover {
      background-color: #0056b3; /* Couleur bleue plus foncée au survol */
    }
    span{color: black;}
  </style>
</head>
<body>

<div id="chrono-container">
  <div id="chrono">00<span>H</span>00<span>Min</span>00<span>S</span>00<span>Ms</span></div>

</div>
<div class="button-container">
  <button id="startButton">Start</button>
  <button id="stopButton">Stop</button>
  <button id="resetButton">Reset</button>
</div>

<script>
  function pad(value) {
    return value.toString().padStart(2, '0');
  }

  function padMilliseconds(value) {
    return value.toString().padStart(3, '0');
  }

  let startTime;
  let isRunning = false;

  document.getElementById('startButton').addEventListener('click', startChrono);
  document.getElementById('stopButton').addEventListener('click', stopChrono);
  document.getElementById('resetButton').addEventListener('click', resetChrono);

  function startChrono() {
    if (!isRunning) {
      startTime = Date.now();
      isRunning = true;
      updateChrono();
    }
  }

  function stopChrono() {
    if (isRunning) {
      isRunning = false;
    }
  }

  function resetChrono() {
    stopChrono();
    document.getElementById('chrono').innerHTML = '00<span>H</span>00<span>Min</span>00<span>S</span>00<span>Ms</span>';
  }

  function updateChrono() {
    if (isRunning) {
      const currentTime = Date.now();
      const elapsedTime = currentTime - startTime;

      const hours = Math.floor(elapsedTime / 3600000);
      const minutes = Math.floor((elapsedTime % 3600000) / 60000);
      const seconds = Math.floor((elapsedTime % 60000) / 1000);
      const milliseconds = elapsedTime % 1000;

      const formattedTime = `${pad(hours)}<span>H</span>${pad(minutes)}<span>Min</span>${pad(seconds)}<span>S</span>${padMilliseconds(milliseconds)}<span>Ms</span>`;
      document.getElementById('chrono').innerHTML = formattedTime;

      requestAnimationFrame(updateChrono);
    }
  }
</script>

</body>
</html>
