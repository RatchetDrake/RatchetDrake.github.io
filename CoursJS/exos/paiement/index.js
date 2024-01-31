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
        }
    }
    
    class Panier {
        constructor() {
            this.articles = [];
        }
    
        ajouterArticle(article) {
            this.articles.push(article);
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
    
            return this.articles.reduce((total, article) => total + article.prix, 0)
        }
    
    }
    
    class SystemePaiement {
        static effectuerPaiement(client, panier) {
            const MontantTotal = panier.calculerMontantTotal()
            client.effectuerAchat(MontantTotal)
        }
    }
    
    
    const client1 = new Client("Alice", 1000);
    const client2 = new Client("Bob", 10000);
    
    const article1 = new Article("Livre", 20.99);
    const article2 = new Article("Ordinateur portable", 800);
    const article3 = new Article("Armoire", 1000);
    const article4 = new Article("Bureau", 200);
    
    const panierClient1 = new Panier();
    panierClient1.ajouterArticle(article1);
    panierClient1.ajouterArticle(article2);
    
    const PanierClient2 = new Panier()
    PanierClient2.ajouterArticle(article1)
    PanierClient2.ajouterArticle(article2)
    PanierClient2.ajouterArticle(article3)
    PanierClient2.ajouterArticle(article4)
    
    console.log(`Montant total du panier de ${client1.nom} : ${panierClient1.calculerMontantTotal()} euros`);
    console.log(`Montant total du panier de ${client2.nom} : ${PanierClient2.calculerMontantTotal()} euros`);
    
    SystemePaiement.effectuerPaiement(client1, panierClient1);
    SystemePaiement.effectuerPaiement(client2, PanierClient2);