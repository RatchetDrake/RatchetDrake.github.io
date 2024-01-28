/* 
Créez un objet calculator avec trois méthodes :

read() demande deux valeurs (avec prompt) et les enregistre en tant que propriétés 
d’objet avec les noms a et b respectivement.

sum() renvoie la somme des valeurs sauvegardées. (avec alert)

mul() multiplie les valeurs sauvegardées et renvoie le résultat. (avec alert)
*/


let calculator = {
    read: function() {
        // Ici ca deviens des int/float qui sont obligé à etre possitif
        this.a = +prompt('a?', 0)
        this.b = +prompt('b?', 0)
        
        // ou 

        // Ici ca deveins des float 
        this.a = parseFloat(prompt('a?', 0))
        this.b = parseFloat(prompt('b?', 0))
    },
    sum: function() {
        alert("La somme est " + (this.a + this.b))
    },
    mul: function() {
        alert("Le produit est " + (this.a * this.b))
    }
}

calculator.read();

calculator.sum()
calculator.mul()
