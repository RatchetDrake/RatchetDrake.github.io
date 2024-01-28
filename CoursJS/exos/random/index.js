/*
Écrire un script composé des fonctions suivante :

Une fonction qui remplit un tableau par des noms saisis par l'utilisateur  via une boite de dialogue , 
cette fonction sera appelée au  clic sur un bouton nommé "Ajouter nom".
    
Une fonction qui renvoie au hasard le nom gagnant et qui sera lancée lorsque l'utilisateur 
clique sur le  bouton "tirage au sort" .
*/
document.addEventListener('DOMContentLoaded', function() {
    let TableauName = []
    function AddName() {
        let InputName = document.getElementById('name')    
        TableauName.push(InputName.value)

        let TableHTML = document.getElementById('table')

        let Tr = document.createElement('tr')
        let Td = document.createElement('td')

        Tr.onclick = function() {
            if (confirm("Voulez-vous supprimer ce nom ?")){
                TableauName.splice( TableauName.indexOf(Td.innerHTML), 1)
                TableHTML.removeChild(this)
            }
        }

        Td.textContent = InputName.value
        Tr.appendChild(Td)

        TableHTML.appendChild(Tr)
        InputName.value = ""

    }

    function Paul()/*Mirabelle*/ {
        if (TableauName.length == 0){
            alert("Vous n'avez pas ajouté de nom")
        } else {
            let randomIndex = Math.floor(Math.random() * TableauName.length);
            let Gagnant = TableauName[randomIndex]

            let WinnerSpan = document.getElementById('winner')
            WinnerSpan.textContent = Gagnant
        }
    }


    document.getElementById('name').addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
        event.preventDefault();
        if (this.value.length > 0) AddName()
        }
    })
})