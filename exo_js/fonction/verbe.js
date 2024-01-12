


// Ecrire une fonction qui vérifie si un verbe est du premier groupe si il y est remplacer les deux dernière lettre par eur
function verbePremierGroupe(verbe) {
    // Vérifier si le verbe se termine par "er"
    if (verbe.endsWith("er")) {
      // Remplacer les deux dernières lettres par "eur"
      const verbeTransforme = verbe.slice(0, -2) + "eur";
      return verbeTransforme;
    } else {
      return "Ce verbe n'est pas du premier groupe.";
    }
  }
  
  // Exemple d'utilisation :
  const verbeExemple = "manger"; // Remplacez ceci par le verbe que vous souhaitez tester
  const resultat = verbePremierGroupe(verbeExemple);
  console.log(resultat);
  