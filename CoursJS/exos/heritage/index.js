// Créer une classe CompteBancaire qui a l'attribut balance et une méthode getBalance qui donne la solde actuel

// Créer une classe EnregistrementCompte qui est étendu de CompteBancaire avec les attributs balance et interet
// Avec une méthode addInteret qui rajoute des interet

// Créer une classe VerifieCompte qui est étendu de EnregistrementCompte et prend les attributs balance, interet, frais
// Avec une méthode withdraw qui va retirer un certain montant Puis créer deux instance de la classe VerifieCompte du compte 

// Puis créer deux instance de la classe VerifieCompte


class CompteBancaire {
    constructor(balance) {
      this.balance = balance;
    }
  
    getBalance() {
      return this.balance;
    }
  }
  
  class EnregistrementCompte extends CompteBancaire {
    constructor(balance, interet) {
      super(balance);
      this.interet = interet;
    }
  
    addInteret() {
      this.balance += this.interet;
    }
  }
  
  class VerifieCompte extends EnregistrementCompte {
    constructor(balance, interet, frais) {
      super(balance, interet);
      this.frais = frais;
    }
  
    withdraw(amount) {
      if (amount <= this.balance) {
        this.balance -= amount;
        this.balance -= this.frais;
        return true; // Le retrait a réussi
      } else {
        return false; // Solde insuffisant pour le retrait
      }
    }
  }
  
  const Compte1 = new VerifieCompte(100, 10, 2);
  const Compte2 = new VerifieCompte(50, 4, 5);
  
  console.log("Solde initial du Compte1 : " + Compte1.getBalance());
  console.log("Solde initial du Compte2 : " + Compte2.getBalance());
  
  Compte1.addInteret();
  Compte2.addInteret();
  
  console.log("Solde du Compte1 après ajout d'intérêt : " + Compte1.getBalance());
  console.log("Solde du Compte2 après ajout d'intérêt : " + Compte2.getBalance());
  
  const montantRetire = 20;
  
  if (Compte1.withdraw(montantRetire)) {
    console.log(`Retrait de ${montantRetire} du Compte1 réussi.`);
  } else {
    console.log(`Retrait de ${montantRetire} du Compte1 échoué (solde insuffisant).`);
  }
  
  if (Compte2.withdraw(montantRetire)) {
    console.log(`Retrait de ${montantRetire} du Compte2 réussi.`);
  } else {
    console.log(`Retrait de ${montantRetire} du Compte2 échoué (solde insuffisant).`);
  }
  
  console.log("Solde final du Compte1 : " + Compte1.getBalance());
  console.log("Solde final du Compte2 : " + Compte2.getBalance());
  