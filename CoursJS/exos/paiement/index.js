/*
Exercice : Gestion d'un système de paiement

    Créez une classe Client avec les propriétés suivantes :
        nom (une chaîne de caractères représentant le nom du client)
        solde (un nombre représentant le solde du client en euros)

    Ajoutez une méthode effectuerAchat à la classe Client qui prend en paramètre 
    le montant d'un achat et déduit ce montant du solde du client. Assurez-vous de vérifier 
    si le solde est suffisant avant de procéder à la déduction.




    Créez une classe Article avec les propriétés suivantes :
        nom (une chaîne de caractères représentant le nom de l'article)
        prix (un nombre représentant le prix de l'article en euros)




    Créez une classe Panier avec une propriété articles (un tableau d'articles) et 
    les méthodes suivantes :
        ajouterArticle : Ajoute un article au panier.
        calculerMontantTotal : Calcule et retourne le montant total des articles présents 
        dans le panier.




    Créez une classe SystemePaiement avec une méthode effectuerPaiement qui prend en 
    paramètre un client et un panier. La méthode doit appeler la méthode calculerMontantTotal 
    du panier, puis la méthode effectuerAchat du client en déduisant le montant total du solde du client.

    Créez quelques instances de la classe Client, de la classe Article, de la classe Panier 
    et de la classe SystemePaiement. Ajoutez des articles au panier, affichez le montant 
    total, puis effectuez un paiement en utilisant le système de paiement.
    */

class Client {
    constructor(nom, solde){
        this.nom = nom;
        this.solde = solde;
    }
    addMoney(money) {
        this.solde += Number(document.getElementById('NbArgent').value);
        Change()
    }
    effectuerAchat(montant) {
        if (this.solde >=  montant) {
            this.solde -= montant;
            console.log(`${this.nom} a effectué un achat de ${montant} euros. Nouveau solde : ${this.solde} euros`);
        } else {
            console.log('Solde insuffisante pour effectuer cet achat.')
        }
    }
}

class Article {
    constructor(nom, prix) {
        this.nom = nom;
        this.prix = prix;

        // J'insert une nouvelle option dans mon inventaire
        let Inventaire = document.getElementById('inventaire')
        let option = document.createElement('option')
        option.textContent = `${this.nom} (${this.prix}€)`
        option.value = JSON.stringify(this)
        // Stringify permet de convertir mon objet en string pour le stocker dans mon option et pouvoir le réutiliser plus tard dans le code
        Inventaire.appendChild(option)
    }
}

class Panier {
    constructor() {
        this.articles = [];
    }

    ajouterArticle(article) {
        this.articles.push(article);
    }

    retirerArticle(articleElement) {
        // Je récupère l'index de l'élément sélectionné dans la liste d'options
        let ArticleIndex = (articleTableau) => articleTableau.nom == articleElement.nom
        let TrouverIndex = this.articles.findIndex(ArticleIndex)

        this.articles.splice(TrouverIndex, 1)
        // Je retire l'élément du tableau JS avec l'id trouver grace à findIndex
    }

    calculerMontantTotal() {
        // let somme = 0;
        // this.articles.forEach((article) => {
        //     somme += article.prix;
        // })
        // return somme
        //////

        // function ReduceArticle(total, article) {
        //     return total + article.prix
        // }
        // return this.articles.reduce(ReduceArticle, 0)

        return this.articles.reduce((total, article) => total + article.prix, 0).toFixed(2)
        // Le toFixed sert à ne mettre deux chiffres après la virgule
    }

}

class SystemePaiement {
    static effectuerPaiement(client, panier) {
        const MontantTotal = panier.calculerMontantTotal()
        client.effectuerAchat(MontantTotal)
    }
}


// const client1 = new Client("Alice", 1000);
// const client2 = new Client("Bob", 10000);

// const article1 = new Article("Livre", 20.99);
// const article2 = new Article("Ordinateur portable", 800);
// const article3 = new Article("Armoire", 1000);
// const article4 = new Article("Bureau", 200);

// const panierClient1 = new Panier();
// panierClient1.ajouterArticle(article1);
// panierClient1.ajouterArticle(article2);

// const PanierClient2 = new Panier()
// PanierClient2.ajouterArticle(article1)
// PanierClient2.ajouterArticle(article2)
// PanierClient2.ajouterArticle(article3)
// PanierClient2.ajouterArticle(article4)

// console.log(`Montant total du panier de ${client1.nom} : ${panierClient1.calculerMontantTotal()} euros`);
// console.log(`Montant total du panier de ${client2.nom} : ${PanierClient2.calculerMontantTotal()} euros`);

// SystemePaiement.effectuerPaiement(client1, panierClient1);
// SystemePaiement.effectuerPaiement(client2, PanierClient2);


const client = new Client("Didier", 221);
const panier = new Panier()

document.addEventListener('DOMContentLoaded', function() {
    let Inventaire  = document.getElementById('inventaire')
    // Je sélectionne mes 2 listes HTML
    let Panier      = document.getElementById('panier')

    let ButtonAdd   = document.getElementById('ajouter')
    let ButtonSupp  = document.getElementById('supprimer')
    let ButtonBuy   = document.getElementById('buy')
    // Je sélectionne mes 3 bouton HTML

    Change()
    // Je  mets à jour le solde et la somme totale dans l'interface
    
    // Ajout de nouvelles articles a l'inventaire
    const Livre     = new Article("Livre", 20.99)
    const Ordi      = new Article("Ordinateur portable", 800)
    const Armoire   = new Article("Armoire", 1000)
    const Bureau    = new Article("Bureau", 200)
    const Ananas    = new Article('Ananas', 5)
    const Banane    = new Article('Banane', 5)
    const Citron    = new Article('Citron', 5)
    const Fraise    = new Article('Fraise', 5)
    const Orange    = new Article('Orange', 5)
    const Pomme     = new Article('Pomme', 5)
    const Raisin    = new Article('Raisin', 5)
    const Tomate    = new Article('Tomate', 5)
    const Kiwi      = new Article('Kiwi', 5)
    const Figue     = new Article('Figue', 5)
    const Pasteque  = new Article('Pasteque', 5)
    const Nefle     = new Article('Nefle', 5)
    const Mangue    = new Article('Mange', 5)
    const Cerise    = new Article('Cerise', 5)
    const Framboise = new Article('Framboise', 5)   
    const Coco      = new Article('Coco', 5)
    const Peche     = new Article('Peche', 5)
    const Mirabelle = new Article('Mirabelle', 5)
    const Groseille = new Article('Groseille', 5)

    
    // Écoute d’événement Bouton Ajouter au Panier
    ButtonAdd.addEventListener('click', function() {
        // querySelectorAll  permet de sélectionner plusieurs éléments HTML qui ont un attribut CSS identique
        // En l’occurrence ici l’attribut option:checked
        let OptionCliked = document.querySelectorAll('#inventaire option:checked') 
        // Le querySelectAll me renvoie un tableau qui liste toute les option:checked meme si il en trouve une seul
        // Donc je parcours le tableau avec un foreach       
        OptionCliked.forEach((ElementHTML) => {
            if (ElementHTML !== null){
                Panier.appendChild(ElementHTML)
                let ValeurObjet = JSON.parse(ElementHTML.value)
                // Mon JSON.parse converti ma chaîne de caractère précédemment  enregistrée par mon JSON.stringify en Objet Javascript
                panier.ajouterArticle(ValeurObjet)
                Change()
            }
        })
        
    })

    // Écoute d’événement Bouton Supprimer du Panier
    ButtonSupp.addEventListener('click', function() {
        // Exactement la meme chose que le bouton  ajouter mais on retire les articles du Panier et non pas de l'inventaire
        let OptionCliked = document.querySelectorAll('#panier option:checked')
        OptionCliked.forEach((ElementHTML) => {
            if (ElementHTML !== null){
                Inventaire.appendChild(ElementHTML)
                let ValeurObjet = JSON.parse(ElementHTML.value)
                panier.retirerArticle(ValeurObjet)
                Change()
            }
        })
        
    })

    // Écoute d’événement Bouton Acheter le Panier
    ButtonBuy.addEventListener('click', function() {
        // On vérifie si le solde est suffisamment élevé pour acheter
        let Total = panier.calculerMontantTotal()
        if (Total >  client.solde) {
            Change()
            // J'affiche une erreur parce que le solde n'est pas suffisant
            document.querySelector('#error').textContent = `Erreur : Désolé, votre solde est insuffisante (${client.solde.toFixed(2)} €). Veuillez recharger votre carte.`
        } else {
            // j’achète tout le panier avec la carte du client 
            SystemePaiement.effectuerPaiement(client, panier)
            Change()
            // J'actualise l'affichage 
            document.querySelector('#error').textContent = `Merci, de votre achat et à bientot`
            // J'affiche un message de réussite d'achat
        }
    })
})


function Change() {
    let Inventaire  = document.getElementById('inventaire')
    let Panier      = document.getElementById('panier')

    let ButtonAdd   = document.getElementById('ajouter')
    let ButtonSupp  = document.getElementById('supprimer')
    let ButtonBuy   = document.getElementById('buy')

    // J'active et désactive en fonction des éléments sélectionnés dans les listes

    ButtonAdd.disabled  = !Inventaire.value
    ButtonSupp.disabled = !Panier.value
    ButtonBuy.disabled  = !(Panier.children.length > 0)
    // Panier.children.length dit combien d'enfant possède Panier (Les enfants de panier son les différentes option)

    let Wallet          = document.querySelector('#wallet span')
    Wallet.textContent  = client.solde.toFixed(2)
    let Total           = document.querySelector('#total span')
    Total.textContent   = panier.calculerMontantTotal()
    //  Je mets à jour l'affichage du solde et du montant total
}

function CreateArticle() {
    let InputNom    = document.getElementById('nom')
    let InputPrix   = document.getElementById('prix')
    // Je récupère mes input HTML

    const NewArticle = new Article(InputNom.value, parseFloat(InputPrix.value))
    // Je créer l'article

    // Je remet à zero les input
    InputNom.value = ''
    InputPrix.value = ''

}