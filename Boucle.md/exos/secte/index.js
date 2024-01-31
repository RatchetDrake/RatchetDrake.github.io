
/*
Définir un objet 'member' (membre) avec les attributs 'id' (identifiant), 'name' (nom) et 'grade' 
et une méthode/fonction 'toString' personnalisée. Créer un objet 'team' qui contient des membres. Créer 
une instance de 'secte' et y ajouter des membres. 
Afficher les membres de 'secte' en utilisant la fonction 'toString' de 'member'.
*/

function member(id, name, grade) {
    this.idMembre = id
    this.nameMembre = name
    this.gradeMembre = grade

    this.toString = function() {
        return `L'identifiant du membre est ${this.idMembre}, son nom est ${this.nameMembre} et il est gradé au grade ${this.gradeMembre}.`
    }
}

function secte() {
    this.Membres = []
    
    this.add = function(nouveauMembre) {
        this.Membres.push(nouveauMembre)
    }

    this.SelectMembre = function(index) {
        return this.Membres[index]
    }

    this.toString = function() {
        return this.Membres.join('\n')
    }
}

let SecteDéveloppeur = new secte()

let elodie = new member(1, "Elodie", 'naine')
let Mohammed = new member(2, "Mohammed", 'bonbarbier')
console.log(elodie.toString())

SecteDéveloppeur.add(elodie)
SecteDéveloppeur.add(Mohammed)
SecteDéveloppeur.add(new member(3, 'Dédé', 'Chargé du PMU'))

console.log(SecteDéveloppeur.toString())
console.log("------------------------------------------------------")

	
let EleveA = {
    Classe: "Terminale A", 
    Matiere: {
        science: 15
    }
}
let EleveB = {
    Classe: "Terminale B"
}

console.log(EleveA?.Matiere?.math ?? "Absent")
console.log(EleveB?.Matiere?.math ?? "Absent")

function AddMembre() {
    let InputName = document.getElementById('name')
    let InputGrade = document.getElementById('grade')

    SecteDéveloppeur.add(
        new member(
            SecteDéveloppeur.Membres.length + 1, 
            InputName.value, 
            InputGrade.value
        )
    )

    console.log(SecteDéveloppeur.toString())
    console.log("------------------------------------------------------")

    const tableauHTML = document.getElementsByTagName('table')[0]

    const TR = document.createElement('tr')
    const TDid = document.createElement('td')
    const TDname = document.createElement('td')
    const TDgrade = document.createElement('td')

    TDid.textContent = SecteDéveloppeur.Membres.length 
    TDname.textContent = InputName.value
    TDgrade.textContent = InputGrade.value

    TR.appendChild(TDid)
    TR.appendChild(TDname)
    TR.appendChild(TDgrade)

    tableauHTML.appendChild(TR)
}

document.addEventListener('DOMContentLoaded', function() { // J'attend que la page sois chargé avant d'exécuter le code 
    const tableauHTML = document.getElementsByTagName('table')[0]

    for (let i = 0; i < SecteDéveloppeur.Membres.length; i++) { // La boucle tourne le nombre de membre qu'il y a
        const Membre = SecteDéveloppeur.SelectMembre(i); // Je sélectionne un membre 

        ////////////// Je créer la ligne et les données du tableau //////////
        const TR = document.createElement('tr')
        const TDid = document.createElement('td')
        const TDname = document.createElement('td')
        const TDgrade = document.createElement('td')
        ///////////////////////////////////////////////////////////////////

        ///////////// Je défini le texte afficher ////////
        TDid.textContent = Membre.idMembre
        TDname.textContent = Membre.nameMembre
        TDgrade.textContent = Membre.gradeMembre
        ///////////////////////////////////////////////

        // Je dit aux TD qu'ils sont enfants de TR
        TR.appendChild(TDid)
        TR.appendChild(TDname)
        TR.appendChild(TDgrade)

        // Je dit au TR qu'il est enfant de tableauHTML
        tableauHTML.appendChild(TR)
        
    }
})