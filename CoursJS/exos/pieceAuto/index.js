// Recréer le fichier PieceAuto.json en objet js  

function Piece(id, nom, prix, categorie, image, description, disponible) {
    this.Id = id;
    this.Nom = nom;
    this.Prix = prix;
    this.Categorie = categorie;
    this.Image = image;
    this.Description = description;
    this.Disponible = disponible;
}


let AmpouleLED = new Piece(
    1, 
    'Ampoule LED',
    60,
    "Optiques",
    'img/ampoule_led.png',
    "Distance d'éclairage : 100 mètres",
    true
);

console.log(AmpouleLED)
