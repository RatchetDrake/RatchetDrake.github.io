<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monkey Face CSS</title>
<style>
  .monkey-face {
    width: 200px;
    height: 200px;
    background-color: #808080;
    border-radius: 100px;
    position: relative;
    margin: 50px auto;
    overflow: hidden;
  }

  .ear {
    width: 70px;
    height: 100px;
    background-color: #808080;
    border-radius: 50px 50px 0 0;
    position: absolute;
    top: 50px;
  }

  .ear.left {
    left: -30px;
    transform: rotate(-30deg);
  }

  .ear.right {
    right: -30px;
    transform: rotate(30deg);
  }

  .eye {
    width: 40px;
    height: 40px;
    background-color: white;
    border-radius: 20px;
    position: absolute;
    top: 70px;
  }

  .eye::after {
    content: '';
    width: 20px;
    height: 20px;
    background-color: black;
    border-radius: 10px;
    position: absolute;
    top: 10px;
    left: 10px;
  }

  .eye.left {
    left: 50px;
  }

  .eye.right {
    right: 50px;
  }

  .nose {
    width: 40px;
    height: 20px;
    background-color: #e0a07e;
    border-radius: 20px;
    position: absolute;
    top: 140px;
    left: 50%;
    transform: translateX(-50%);
  }

  .mouth {
    width: 80px;
    height: 50px;
    background-color: #a0a0a0;
    border-radius: 40px;
    position: absolute;
    top: 160px;
    left: 50%;
    transform: translateX(-50%);
  }

  .mouth::after {
    content: '';
    width: 60px;
    height: 30px;
    background-color: #6abf40;
    border-radius: 30px;
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
  }

  body {
    background-color: #6abf40;
  }
</style>
</head>
<body>

<div class="monkey-face">
  <div class="ear left"></div>
  <div class="ear right"></div>
  <div class="eye left"></div>
  <div class="eye right"></div>
  <div class="nose"></div>
  <div class="mouth"></div>
</div>

</body>
</html>
