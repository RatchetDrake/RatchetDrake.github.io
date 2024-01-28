let PieceAuto;

let test = async function() {
    // L'async permet de désynchroniser la fonction par rapport au reste du code
    await fetch('./pieceAuto.json')
    // Await permet d'attendre que la fonction qui le suit soit terminée
        .then((response) => {
            return response.json();
        })
        .then((json) => {
            PieceAuto = json;
            displayPieceAuto();
        });
}();

function displayPieceAuto() {
    const pieceAutoList = document.getElementById('pieceAutoList');
    PieceAuto.forEach((piece) => {
        const listItem = document.createElement('li');
        listItem.textContent = `Nom: ${piece.nom}, Prix: ${piece.prix} €, Catégorie: ${piece.categorie}`;
        pieceAutoList.appendChild(listItem);
    });
}
