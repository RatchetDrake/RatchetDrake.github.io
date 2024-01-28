
const Longitude = parseFloat(readline().replace(',', '.'));
const Latitude = parseFloat(readline().replace(',', '.'));
const Nombre = parseInt(readline());
// J'ai défini ma variable en Infinity c'est à dire qu'elle prend 
// le nombre le plus au possible 
var distance = Infinity
var Texte = ''

for (let i = 0; i < Nombre; i++) {
    const Defibrilateur = readline().split(';');
    // Le split découpe ma chaine de caractère à chaque endroit ou elle trouve un ; et la transforme donc
    // en tableau (array)

    var LongitudeDefib = parseFloat(Defibrilateur[4].replace(',', '.'))
    var LatitudeDefib = parseFloat(Defibrilateur[5].replace(',', '.'))
    // replace comme je l'ai mis au dessus remplace toute les , par des .

    var x = (LongitudeDefib - Longitude) * Math.cos((Latitude + LatitudeDefib) / 2)
    var y = LatitudeDefib - Latitude
    var d = Math.sqrt( x*x + Math.pow(y, 2)) * 6371
    // Math.pow met un exposant un nombre 
    // Math.sqrt fait une racine carré 
    
    if (d < distance) {
        distance = d
        Texte = Defibrilateur[1]
    }

}
console.log(Texte)
