
/*
Avec deux chaînes, créez une fonction qui renvoie le nombre total de caractères uniques de la chaîne concaténée.

uniqueChr("attention", "intention") ➞ 6  
// "attentionintention" a 6 caractères uniques:
// "a", "t", "e", "n", "i", "o"

uniqueChr("plus", "tous") ➞ 6 

uniqueChr("bis", "lis") ➞ 4


*/


function uniqueChr(s1, s2) {
    // Concaténer les deux chaînes
    const concatenatedString = s1 + s2;
    
    // Utiliser un ensemble (Set) pour stocker les caractères uniques
    const uniqueChars = new Set(concatenatedString);
    
    // Retourner le nombre de caractères uniques en convertissant l'ensemble en tableau et en utilisant la propriété length
    return Array.from(uniqueChars).length;
  }
  
  console.log(uniqueChr("attention", "intention")); // ➞ 6
  console.log(uniqueChr("plus", "tous")); // ➞ 6
  console.log(uniqueChr("bis", "lis")); // ➞ 4
  

