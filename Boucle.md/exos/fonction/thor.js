// Votre programme doit permettre à Thor de rejoindre l'éclair de puissance.

var inputs = readline().split(' ');
const PositionEclairX = parseInt(inputs[0]);
const PositionEclairY = parseInt(inputs[1]);
const PositionInitialThorX = parseInt(inputs[2]); 
const PositionInitialThorY = parseInt(inputs[3]); 

var PosThorX = PositionInitialThorX
var PosThorY = PositionInitialThorY

while (true) {
    const PasRestant = parseInt(readline());
    var Dir = ''

    if (PosThorY < PositionEclairY) {
        PosThorY++
        Dir += 'S'
    } else if (PosThorY > PositionEclairY) {
        PosThorY--
        Dir += 'N'
    }
    if (PosThorX < PositionEclairX) {
        PosThorX++
        Dir += 'E'
    } else if (PosThorX > PositionEclairX) {
        PosThorX--
        Dir += 'W'
    } 
    
    console.log(Dir)

}
