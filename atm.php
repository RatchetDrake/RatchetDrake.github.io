<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ATM</title>
    <link rel="stylesheet" href="atm.css">
    </head>
<body>
    <section>
        <form action="" method="post">
            <span class="num" id="texte">
                <span id=invisible></span>
                <input type="text" id='affiche' readonly>
            </span>
            <div class="num">1</div>
            <div class="num">2</div>
            <div class="num">3</div>            
            <div class="num" id="reject">Decliner<p class="red"></p></div>
            <div class="num">4</div>
            <div class="num">5</div>
            <div class="num">6</div>            
            <div class="num" id="erase">Effacer<p class="yellow"></p></div>
            <div class="num">7</div>
            <div class="num">8</div>
            <div class="num">9</div>            
            <button type="submit" class="num">Entrez<p class="green"></p></button>
            <div class="num"id='calcul-'>-</div>
            <div class="num">0</div>
            <div class="num" id='caclul+'>+</div>
        </form>
    </section>

    <script>
        var button = document.getElementsByClassName('num')

        for (let index = 0; index < button.length; index++) {
            if (button[index].id.length > 0 || button[index].type == 'submit') continue
            button[index].addEventListener('click', function() {
                var input = document.getElementById('affiche')
                var span = document.getElementById('invisible')
                console.log(span.innerHTML)
                if (input.value.length == 4) {
                    input.value = ""
                    return
                }
                span.innerHTML += button[index].innerHTML
                input.value += '*'
            })
        }
        function Stop() {
            document.getElementById('affiche').value = ''
            document.getElementById('invisible').innerHTML = ''
        }
        document.getElementById('reject').addEventListener('click', Stop)
        document.getElementById('erase').addEventListener('click', Stop)

    </script>
</body>
</html>