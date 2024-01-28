// Créez une fonction qui remplace toutes les voyelles d’une chaîne par un caractère spécifié.

// Exemple : 

// replaceVoyel("voyelle", "$") ➞ "v$y$ll$"

// replaceVoyel("boulevard", "?") ➞ "b??l?v?rd"

// replaceVoyel("bouche", "@") ➞ "b@@ch@"


function replaceVoyel(str, remplacer) {
    return str.replace(/[aeoiuAEOIU]/g, remplacer)
}

console.log(replaceVoyel("voyelle", "$"));
console.log(replaceVoyel("boulevard", "?"));
console.log(replaceVoyel("bouche", "@"));