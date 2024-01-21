<!DOCTYPE html>
<html>
<head>
    <title>Vérification de Palindrome</title>
    <style>
        #form-container {
            text-align: center;
            margin-top: 50px;
        }

        #resultat {
            color: green;
            font-weight: bold;
        }

        #resultat.non-palindrome {
            color: red;
        }
    </style>
</head>
<body>
    <div id="form-container">
        <input type="text" id="inputPalindrome" placeholder="Entrez un texte">
        <button onclick="verifierPalindrome()">Vérifier</button>
        <p id="resultat"></p>
    </div>
    <script>
        function verifierPalindrome() {
            var texte = document.getElementById('inputPalindrome').value;
            var texteInverse = texte.split('').reverse().join('');

            if (texte === texteInverse) {
                document.getElementById('resultat').textContent = "L'entrée est un palindrome";
                document.getElementById('resultat').className = '';
            } else {
                document.getElementById('resultat').textContent = "L'entrée n'est pas un palindrome";
                document.getElementById('resultat').className = 'non-palindrome';
            }
        }
    </script>
</body>
</html>
