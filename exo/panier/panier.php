<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfert de fruits</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            text-align: center;
        }
        select, .quantity {
            padding: 10px;
            margin: 20px;
            width: 200px;
        }
        button {
            padding: 10px 20px;
            margin: 20px;
            cursor: pointer;
        }
        .description {
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="description">Sélectionnez un fruit de la liste A pour l'ajouter à la liste B (votre panier).</div>

<select id="listeA" multiple>
    <!-- Vos options ici... -->
    <option value="pomme">Pomme</option>
    <option value="banane">Banane</option>
    <option value="orange">Orange</option>
    <option value="kiwi">Kiwi</option>
    <option value="lemon">citron</option>
    <option value="fig">Figue</option>
    <option value="pastèque">pastèque</option>
    <option value="nèfle">nèfle</option>
    <option value="orange">Orange</option> 
    <option value="mango">Mangue</option>
    <option value="cherry">Cerise</option>
    <option value="grape">Raisin</option>
    <option value="lime">franboise</option>
    <option value="coconut">noix-de-coco</option>
    <option value="peach">Pêche</option>
    <option value="pineapple">annanas</option>
    <option value="mirrable">mirabelle</option>
    <option value="fraise">Fraise</option>
    <option value="fraise">groseille</option>
    <option value="tomate">tomate</option>
</select>

<button id="ajouter">Ajouter au panier</button>

<br>

<div class="description">Sélectionnez un fruit de la liste B (votre panier) pour le retirer ou modifier la quantité.</div>

<select id="listeB" multiple></select>
<input type="number" id="quantity" class="quantity" min="1" value="1">
<button id="supprimer">Retirer du panier</button>
<button id="modifier">Modifier quantité</button>
<button id="payer">Payer</button>

<script>
$(document).ready(function() {
    // Désactive les boutons au démarrage
    $('#ajouter').prop('disabled', true);
    $('#supprimer').prop('disabled', true);
    $('#modifier').prop('disabled', true);

    // Activer/Désactiver le bouton 'Ajouter' en fonction de la sélection dans la liste A
    $('#listeA').change(function() {
        $('#ajouter').prop('disabled', !$(this).val());
    });

    // Activer/Désactiver les boutons 'Supprimer' et 'Modifier' en fonction de la sélection dans la liste B
    $('#listeB').change(function() {
        const isItemSelected = Boolean($(this).val());
        $('#supprimer').prop('disabled', !isItemSelected);
        $('#modifier').prop('disabled', !isItemSelected);
    });

 // Lorsque le bouton 'Ajouter' est cliqué
$('#ajouter').click(function() {
    const selectedOption = $('#listeA option:selected').clone(); // Clonons l'option pour ne pas modifier la liste d'origine
    const fruitWithDefaultQuantity = `${selectedOption.text()} x 1`;
    selectedOption.text(fruitWithDefaultQuantity);
    $('#listeB').append(selectedOption);
    $('#ajouter').prop('disabled', true); // Désactiver le bouton après le transfert
});

    // Lorsque le bouton 'Supprimer' est cliqué
    $('#supprimer').click(function() {
        const selectedOption = $('#listeB option:selected');
        $('#listeA').append(selectedOption);
    });

    // Lorsque le bouton 'Modifier' est cliqué
    $('#modifier').click(function() {
        // Avant d'appliquer la modification, vérifiez que la quantité n'est pas vide, sinon définissez-la sur 1
        if (!$('#quantity').val()) {
            $('#quantity').val(1);
        }
        
        const selectedOption = $('#listeB option:selected');
        selectedOption.text(selectedOption.text().split(' x ')[0] + ' x ' + $('#quantity').val());
    });

    // Lorsque le bouton 'Payer' est cliqué
    $('#payer').click(function() {
        const fruits = [];
        $('#listeB option').each(function() {
            const fruitInfo = $(this).text().split(' x ');
            fruits.push({ fruit: fruitInfo[0], quantity: fruitInfo[1] });
        });
        fruits.forEach(function(item) {
            $.post("ajoutPanier.php", { fruit: item.fruit, quantity: item.quantity }, function(data) {
                alert(data);
            });
        });
    });
});
</script>

</body>
</html>
