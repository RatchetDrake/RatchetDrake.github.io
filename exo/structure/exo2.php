<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Modèle de boîte CSS</title>
<style>
  .box {
    margin: 40px;
    border: 25px solid green; /* La bordure est représentée en vert */
    padding: 20px;
    background: purple; /* Le contenu a un fond violet */
    width: 300px;
    height: 150px;
    box-sizing: border-box;
    position: relative;
    font-family: Arial, sans-serif;
  }

  .content {
    color: white;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }

  /* Positionnement des labels pour les différentes parties de la boîte */
  .label {
    position: absolute;
    color: white;
    background: black;
    padding: 2px 5px;
    font-size: 14px;
  }

  .margin-label {
    top: -40px;
    left: 50%;
    transform: translateX(-50%);
    background: yellow;
  }

  .border-label {
    top: 10px;
    left: -85px;
    background: yellow;
  }

  .padding-label {
    top: 10px;
    right: -100px;
    background: yellow;
  }

  .width-label {
    bottom: -40px;
    left: 50%;
    transform: translateX(-50%);
    background: yellow;
  }

  .height-label {
    top: 50%;
    right: -60px;
    transform: translateY(-50%);
    background: yellow;
  }
  .label-border-label{
    background-color: black;
  }
</style>
</head>
<body>

<div class="box">
  <div class="content">CONTENU</div>
  <!-- Labels pour chaque partie de la boîte -->
  <div class="label margin-label">margin</div>
  <div class="label border-label">border</div>
  <div class="label padding-label">padding</div>
  <div class="label width-label">width</div>
  <div class="label height-label">height</div>
</div>

</body>
</html>
