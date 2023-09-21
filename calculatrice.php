<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
    <link rel="stylesheet" href="./calculatrice.css">
</head>




<body>
    <div class="calculator">
        <form method="post">
        <input type="text" name="expression" id="expression" readonly maxlength="5">

            <br>
            <button type="submit" name="btn" value="1">1</button>
            <button type="submit" name="btn" value="2">2</button>
            <button type="submit" name="btn" value="3">3</button>
            <button type="submit" name="delete" value="true" >Decliner</button>
            <br>
            <button type="submit" name="btn" value="4">4</button>
            <button type="submit" name="btn" value="5">5</button>
            <button type="submit" name="btn" value="6">6</button>
            <button type="submit" name="clear" value="true">Effacer</button>
            <br>
            <button type="submit" name="btn" value="7">7</button>
            <button type="submit" name="btn" value="8">8</button>
            <button type="submit" name="btn" value="9">9</button>
            <button type="submit" name="calculate" value="true">Entrez</button>
            <br>
            <button type="submit" name="btn" value="-">-</button>
            <button type="submit" name="btn" value="0">0</button>
            <button type="submit" name="btn" value="+">+</button>
            <button class="vide" type="submit" name="calculate" value="true">Entrez</button>



            <br>


            <br>
        </form>
    </div>
</body>
<script>
    function limitExpressionLength() {
        var expression = document.getElementById("expression").value;
        var expressionLength = expression.replace(/\*/g, '').length;  // Compte seulement les chiffres
        // Limite la longueur de l'expression à 5 caractères
        if (expressionLength > 5) {
            document.getElementById("expression").value = expression.substring(0, 5); // Tronquer l'expression à 5 caractères
        }
    }

    // Appeler la fonction lorsqu'il y a un changement dans l'input
    document.getElementById("expression").addEventListener("input", limitExpressionLength);
</script>


</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['btn'])) {
        $expression = $_POST['expression'] . '*';
        echo '<script>document.getElementById("expression").value = "' . $expression . '";</script>';
    } elseif (isset($_POST['calculate'])) {
        $expression = $_POST['expression'];
        // Remplacez les chiffres par des étoiles
        $expression = preg_replace('/\d/', '*', $expression);
        echo '<script>document.getElementById("expression").value = "' . $expression . '";</script>';
    } elseif (isset($_POST['clear'])) {
        echo '<script>document.getElementById("expression").value = "";</script>';
    }
}
?>