<!DOCTYPE html>
<html>
<head>
    <title>Tirage au sort de noms</title>
    <style>
        * {
            margin: 10px;
        }
        table, tr, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }
        th {
            background-color: rgb(19, 119, 181);
            color: white;
        }
        input, table {
            padding: 10px;
            border-radius: 10px;
        }
        span {
            color: blue;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Tirage au sort de noms</h1>
    <input type="text" id="name" placeholder="Saisir le nom">
    <button onclick="AddName()">Ajouter un nom</button>
    <button onclick="Paul()">Tirage au sort</button>

    <table id="table">
        <tr>
            <th>Noms</th>
        </tr>
    </table>

    <p>La personne qui est gagnante est : <span id="winner"></span></p>

    <script>
        let TableauName = [];

        function AddName() {
            let InputName = document.getElementById('name');
            if (InputName.value.trim() !== "") {
                TableauName.push(InputName.value.trim());

                let TableHTML = document.getElementById('table');
                let Tr = document.createElement('tr');
                let Td = document.createElement('td');

                Tr.onclick = function() {
                    if (confirm("Voulez-vous supprimer ce nom ?")) {
                        const nameToRemove = Td.textContent;
                        TableauName.splice(TableauName.indexOf(nameToRemove), 1);
                        TableHTML.removeChild(this);
                    }
                }

                Td.textContent = InputName.value.trim();
                Tr.appendChild(Td);

                TableHTML.appendChild(Tr);
                InputName.value = "";
            }
        }

        function Paul() {
            if (TableauName.length === 0) {
                alert("Vous n'avez pas ajouté de nom");
            } else {
                let randomIndex = Math.floor(Math.random() * TableauName.length);
                let Gagnant = TableauName[randomIndex];

                let WinnerSpan = document.getElementById('winner');
                WinnerSpan.textContent = Gagnant;
            }
        }

        document.getElementById('name').addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                if (this.value.trim() !== "") {
                    AddName();
                }
            }
        });
    </script>
</body>
</html>
