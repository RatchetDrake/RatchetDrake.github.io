// Créez une fonction nommée aprec qui :

//     prend une note sur 20 en argument
//     renvoie Hideux si la note est entre 0 et 7 exclus
//     renvoie Moche si la note entre 7 et 10 exclus
//     renvoie Nice si la note entre 10 et 15 exclus
//     renvoie GG si la note entre 15 et 20 inclus
//     renvoie BUG si la note n'est pas correcte

function PhrasePrefaite(nombre, singulier) {
    return `Aujourd'hui j'ai sauvé ${nombre} animaux ${singulier}`
    'j\'ai'
}

// On souhaite stocker les positions d"une série de 20 objets mobiles 
//(mobs) dans un jeu vidéo. Pour cela on va créer 2 tableaux :

//     posX qui contient la série des abscisses des objets
//     posY qui contient la série des ordonnées des objets

// Créez une fonction initXY :

//     qui prend en 1er argument l'abscisse du 1er objet
//     qui prend en 2ème argument l'ordonnée du 1er objet
//     qui calcule les abscisses et ordonnés des objects de la série 
//sachant qu'il doivent être espacés de 40 pixels (+40) les uns des autres 
//en abscisse et de 30 pixels (+30) en ordonnée


function initXY(firstX, firstY) {
    const posX = [];
    const posY = [];
    posX.push(firstX);
    posY.push(firstY);
  
    for (let i = 1; i < 20; i++) {
      // Calcul des nouvelles positions en fonction des écarts spécifiés
      const newX = posX[i - 1] + 40;
      const newY = posY[i - 1] + 30;
  
      posX.push(newX);
      posY.push(newY);
    }
  
    return { posX, posY };
  }
  
  // Exemple d'utilisation :
  const positions = initXY(100, 200);
  console.log(positions.posX); // Affiche les abscisses
  console.log(positions.posY); // Affiche les ordonnées
  