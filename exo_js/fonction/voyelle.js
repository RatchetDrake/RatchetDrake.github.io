// Créez une fonction qui remplace toutes les voyelles d’une chaîne par un caractère spécifié.

// Exemple : 

// replaceVoyel("voyelle", "$") ➞ "v$$$ll$"

// replaceVoyel("boulevard", "?") ➞ "b??l?v?rd"

// replaceVoyel("bouche", "@") ➞ "b@@ch@"


function replaceVoyel(str, c) {
    // Utilisez une expression régulière pour rechercher toutes les voyelles (en insensible à la casse)
    const regex = /[aeiou]/gi;
    // Utilisez la méthode replace() pour effectuer le remplacement
    const result = str.replace(regex, c);
    return result;
  }
  
  console.log(replaceVoyel("voyelle", "$"));    // "v$y$ll$"
  console.log(replaceVoyel("boulevard", "?"));  // "b??l?v?rd"
  console.log(replaceVoyel("bouche", "@"));     // "b@@ch@"
  