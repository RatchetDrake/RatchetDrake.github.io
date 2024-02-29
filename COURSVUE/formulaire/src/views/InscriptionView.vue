<template>
  <div class="home">
    <h1>Inscription pour #MachinChose</h1>
    <form>
      <section class="Erreur" id='erreur' v-show="Erreurs.length > 0">
        <span>Corriger les erreurs suivantes : </span>
        <ul>
          <li v-for="(valeur, index) in Erreurs" :key="index">
            {{ valeur }}
          </li>
        </ul>
      </section>

      <h4>Qui êtes vous ?</h4>

      <div>
        <fieldset>
          <label for="prenom">Prénom*</label><br>
          <input type="text" id="prenom" v-bind:disabled='AfficherRecap' v-model="Utilisateur.FirstName">
        </fieldset>

        <fieldset>
          <label for="nom">Nom*</label><br>
          <input type="text" name="nom" id="nom" :disabled='AfficherRecap' v-model="Utilisateur.LastName">
        </fieldset>
      </div>

      <fieldset>
        <label for="email">Email Adress*</label><br>
        <input type="email" name="email" id="email" :disabled='AfficherRecap' v-model="Utilisateur.Email">
      </fieldset>

      <fieldset>
        <label for="sexe">Sexe</label><br>
        <input type="radio" name="sexe" value="monsieur" :disabled='AfficherRecap' v-model="Utilisateur.Sexe">
        <label for="male">Je suis un homme</label>
        <input type="radio" name="sexe" value="madame" :disabled='AfficherRecap' v-model="Utilisateur.Sexe">
        <label for="female">Je suis une femme</label>
      </fieldset>

      <fieldset>
        <label for="institution">Institution*</label><br>
        <input type="text" name="institution" id="institution" :disabled='AfficherRecap' v-model="Utilisateur.Institution">
      </fieldset>

      <div>
        <fieldset>
          <label for="adresse">Adresse*</label><br>
          <input type="text" name="adresse" id="adresse" :disabled='AfficherRecap' v-model="Utilisateur.Adresse">
        </fieldset>

        <fieldset>
          <label for="pays">Pays*</label><br>
          <input type="text" name="pays" id="pays" :disabled='AfficherRecap' v-model="Utilisateur.Pays">
        </fieldset>
      </div>

      <div>
        <fieldset>
          <label for="codepostal">Code Postal*</label><br>
          <input type="text" name="codepostal" id="codepostal" :disabled='AfficherRecap' v-model="Utilisateur.CodePostal">
        </fieldset>

        <fieldset>
          <label for="ville">Ville*</label><br>
          <input type="text" name="ville" id="ville" :disabled='AfficherRecap' v-model="Utilisateur.Ville">
        </fieldset>
      </div>

      <div>
        <fieldset>
          <label for="pageWebPerso">Page Web Personnalisé</label><br>
          <input type="text" name="pageWebPerso" id="pageWebPerso" :disabled='AfficherRecap' v-model="Utilisateur.PageWebPerso">
        </fieldset>

        <fieldset>
          <label for="pageWebInsti">Page Web institution</label><br>
          <input type="text" name="pageWebInsti" id="pageWebInsti" :disabled='AfficherRecap' v-model="Utilisateur.PageWebInsti">
        </fieldset>
      </div>

      <hr>

      <fieldset>
        <h2>Quelle inscription souhaitez-vous ?</h2>
        <input type="radio" name="inscription" value="Étudiant 150 EUR" :disabled='AfficherRecap' v-model="Utilisateur.InscriptionSouhaite">
        <label for="etudiant">Étudiant (150 eur)</label><br />
        <input type="radio" name="inscription" value="Académique 200 EUR" :disabled='AfficherRecap' v-model="Utilisateur.InscriptionSouhaite">
        <label for="academique">Académique (200 eur)</label><br />
        <input type="radio" name="inscription" value="Entreprise 300 EUR" :disabled='AfficherRecap' v-model="Utilisateur.InscriptionSouhaite">
        <label for="entreprise">Entreprise (300 eur)</label><br />
      </fieldset>

      <hr>

      <fieldset>
        <h2>Quelle hébergement souhaitez-vous ?</h2>
        <input type="radio" name="hebergement" value="Avec réservation 150 EUR" :disabled='AfficherRecap' v-model="Utilisateur.Hebergement">
        <label for="etudiant">Avec réservation (150 eur)</label><br />
        <input type="radio" name="hebergement" value="Sans réservation 0 EUR" :disabled='AfficherRecap' v-model="Utilisateur.Hebergement">
        <label for="etudiant">Sans réservation (0 eur)</label>
      </fieldset>

      <hr>

      <button type="button" @click="ButtonSubmit(true)" :disabled='AfficherRecap'>Pré-valider</button>

      <div class="recapitulatif" v-show="AfficherRecap">
        <span>Récapitulatif de l'inscription</span>
        <section>
          <p>
            Bonjour {{ Utilisateur.Sexe }} {{ Utilisateur.FirstName }} {{ Utilisateur.LastName }}, vous avez procédé à une inscription pour la conférence. 
            <br><br>
            Le détail de votre enregistrement est le suivant : 
            <br>

            <ul>
              <li> {{ Utilisateur.InscriptionSouhaite }} </li>
              <li> {{ Utilisateur.Hebergement }} </li>
            </ul>

            Le montant total est de {{ MontantTotal() }} EUR.
            <br><br>

            Un email vous sera envoyé prochainement à cette adresse {{ Utilisateur.Email }}  pour la mise en paiement de votre inscription. <br>
            Merci de consulter votre messagerie et de procéder au règlement de votre inscription.
            <br><br>

            En vous remerciant de votre inscription, à très bientôt à la conférence.<br> 
          </p>
          <div>
            <button type="button">Confirmer</button>
            <button type="button" @click="ButtonSubmit(false)">Modifier les données</button>
          </div>
        </section>
      </div>

    </form>
  </div>
</template>

<script>

export default {
  name: 'InscriptionView',
  data() {
    return {
      AfficherRecap: false,
      Erreurs: [
      ],
      
      Utilisateur: {
        FirstName: '',
        LastName: '',
        Email: '',
        Sexe: '',
        Institution: '',
        Adresse: '',
        Pays: '',
        CodePostal: '',
        Ville: '',
        PageWebPerso: '',
        PageWebInsti: '',
        InscriptionSouhaite: '',
        Hebergement: ''
      }
    }
  },
  methods: {
    ButtonSubmit(Value) {
      if (Value == true) {
        // Validation des champs obligatoires
        this.GestionErreur();

        if (this.Erreurs.length == 0) {
          this.AfficherRecap = Value; 
        } else {
          window.scrollTo(0, 0)
        }
      } else {
        this.AfficherRecap = Value; 
      }
    },
    GestionErreur() {
      this.Erreurs = []
      
      for (const valeur in this.Utilisateur) {
        const element = this.Utilisateur[valeur];
        if (element.length == 0) {
          this.Erreurs.push(`Il y a des champs vide`)
          break;
        }
      }

      // if (this.FirstName.length == 0) {
      //   this.Erreurs.push('Prénom obligatoire');
      // }
      // if (this.LastName.length == 0) {
      //   this.Erreurs.push('Nom de famille obligatoire')
      // }
      // if (this.Email.length == 0) {
      //   this.Erreurs.push('Email obligatoire')
      // }
      // if (this.Sexe.length == 0) {
      //   this.Erreurs.push("Sexe manquant")
      // }
      // if (this.Institution.length == 0) {
      //   this.Erreurs.push('Nom de l\'institution obligatoire')
      // }
      // if (this.Adresse.length == 0) {
      //   this.Erreurs.push('Adresse obligatoire')
      // }
      // if (this.Pays.length == 0) {
      //   this.Erreurs.push('Pays obligatoire')
      // }
      // if (this.CodePostal.length == 0) {
      //   this.Erreurs.push('Code postale obligatoire')
      // }
      // if (this.Ville.length == 0) {
      //   this.Erreurs.push('Ville obligatoire')
      // }
      // if (this.InscriptionSouhaite.length == 0) {
      //   this.Erreurs.push('Formule d\'inscription obligatoire')
      // }
      // if (this.Hebergement.length == 0) {
      //   this.Erreurs.push('Moyen d\'hébergement obligatoire')
      // }
    },
    MontantTotal() {      
      if (this.Utilisateur.InscriptionSouhaite.length > 0) {
        let PrixInscription = this.Utilisateur.InscriptionSouhaite.match(/\d+/)[0]
        let PrixHebergement = this.Utilisateur.Hebergement.match(/\d+/)[0]

        return parseInt(PrixInscription) + parseInt(PrixHebergement)
      }
      return 0
    }
  }
}
</script>

<style scoped lang="scss">
h1 {
  text-align: center;
}
form {
  width: 50%;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  padding: 0 55px;
  box-sizing: border-box;

  .Erreur {
    border: 1px solid gray;
    width: 100%;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    span {
      width: 100%;
      padding: 10px;
      border-bottom: 1px solid gray;

      background-color: lightgray;
    }
  }
  hr {
    color: gray;
    width: 100%;
    font-size: 0.1em;
  }
  h4 {
    width:100%;
  }
  fieldset {
    width: 100%; 
    margin: 15px 0;

    border:none;
    input[type='text'], input[type='email'] {
      width: 100%;
      margin: 7px 0;
      border-radius: 7px;
      border: 1px solid gray;
      padding: 7px
    }
    input[type="radio"] {
      padding: 49px;
      margin: 15px;
      accent-color: #587af4;
    }
    #female {
      margin-left: 55px;
    }
    
  }
  button {
    cursor: pointer;
    padding: 10px;
    border-radius: 5px;
    border: none;
    background-color: #007aff;
    color: white;
    margin: 25px 5px;
  }
  div {
    width: 100%;
    display: flex;
    fieldset {
      width: 50%;
    }
  }
  .recapitulatif {
    border: 1px solid gray;
    overflow: hidden;
    margin-top: 15px;
    width: 100%;
    height: 410px;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    span {
      width: 100%;
      padding: 15px;
      border-bottom: 1px solid gray;
      background-color: lightgray;
    }
    section {
      padding: 15px;
      display: flex;
      flex-direction: column;
    }
    button {
      margin-top: 5px;
    }
  }


}
</style>