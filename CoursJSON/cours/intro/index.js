let PV = 100
let Player = []
let text = async function() { // Va etre appelé quand le joueur ce connecte
    await fetch("data.json")
        .then(response => response.json())
        .then(json => Player = json);
    PV = Player[0].pv
    console.log(PV)
}()
