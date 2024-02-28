<template>
  <div class="registration-form">
    <h1>Inscription pour #MaConf2020</h1>
    <form @submit.prevent="submitForm">
      
      <!-- Personal Information -->
      <section>
        <h2>Qui êtes vous ?</h2>
        <div class="haut">
          <div class="test">
            <label for="firstName">Prénom*</label>
            <input type="text" id="firstName" v-model="form.firstName" required :disabled="submitted">
          </div>
          <div class="test">
            <label for="lastName">Nom*</label>
            <input type="text" id="lastName" v-model="form.lastName" required :disabled="submitted">
          </div>
        </div>

        <div class="mail">
          <label for="email">Email address*</label>
          <input type="email" id="email" v-model="form.email" required :disabled="submitted">
        </div>

        <label class="label">Sexe</label>
        <div class="sexe">
          <div>
            <input type="radio" id="mae" value="M." v-model="form.gender" :disabled="submitted">
            <label for="male">Je suis un homme</label>
          </div>
          <div>
            <input type="radio" id="female" value="Mme." v-model="form.gender" :disabled="submitted">
            <label for="female">Je suis une femme</label>
          </div>
        </div>
        
        <div class="mail">
          <label for="institution">Institution*</label>
          <input type="text" id="institution" v-model="form.institution" required :disabled="submitted">
        </div>
        
        <div class="haut">
          <div class="test">
            <label class="label" for="address">Adresse*</label>
            <input type="text" id="address" v-model="form.address" required :disabled="submitted">
          </div>
          <div class="test">
            <label class="label" for="country">Pays*</label>
            <input type="text" id="country" v-model="form.country" required :disabled="submitted">
          </div>
        </div>
        
        <div class="haut">
          <div class="test">
            <label class="label" for="postalCode">Code postal*</label>
            <input type="text" id="postalCode" v-model="form.postalCode" required :disabled="submitted">
          </div>
          <div class="test">
            <label class="label" for="city">Ville*</label>
            <input type="text" id="city" v-model="form.city" required :disabled="submitted">
          </div>
        </div>
        
        <div class="haut">
          <div class="test">
            <label class="label" for="personalWebPage">Page web personnelle</label>
            <input type="url" id="personalWebPage" v-model="form.personalWebPage" :disabled="submitted">
          </div>
          <div class="test">
            <label class="label" for="institutionWebPage">Page web institution</label>
            <input type="url" id="institutionWebPage" v-model="form.institutionWebPage" :disabled="submitted">
          </div>
        </div>
      </section>

       <!-- Registration Type -->
       <section class="section">
        <h2>Quelle inscription souhaitez-vous ?</h2>
        <div>
          <input type="radio" id="student" value="Etudiant" v-model="form.registrationType" :disabled="submitted">
          <label for="student">Étudiant (150 EUR)</label>
        </div>
        <div>
          <input type="radio" id="academic" value="Académique" v-model="form.registrationType" :disabled="submitted">
          <label for="academic">Académique (200 EUR)</label>
        </div>
        <div>
          <input type="radio" id="enterprise" value="Enterprise" v-model="form.registrationType" :disabled="submitted">
          <label for="enterprise">Entreprise (300 EUR)</label>
        </div>
      </section>

      <!-- Accommodation -->
      <section class="section">
        <h2>Quel hébergement souhaitez-vous ?</h2>
        <div>
          <input type="radio" id="withReservation" value="Avec réservation" v-model="form.accommodation" :disabled="submitted">
          <label for="withReservation">Avec réservation (150 EUR)</label>
        </div>
        <div>
          <input type="radio" id="withoutReservation" value="Sans réservation" v-model="form.accommodation" :disabled="submitted">
          <label for="withoutReservation">Sans réservation (0 EUR)</label>
        </div>
      </section>

      <!-- Submission Button -->
      <div class="divbouton">
        <button class="bouton" type="submit" :disabled="submitted">Pré-valider</button>
      </div>
      
    </form>

    <!-- Recap Section -->
    <div v-if="submitted" class="recap">
      <div class="recapitulatif">
        <span>Récapitulatif de l'inscription</span>
        <section>
          <p>
            Bonjour {{ form.gender }} {{ form.firstName }} {{ form.lastName }}, vous avez procédé à une inscription pour la conférence. <br>
            Le détail de votre enregistrement est le suivant : <br>
            <ul>
              <li>{{ form.registrationType }}</li>
              <li>{{ form.accommodation }}</li>
            </ul>
            Le montant total est de {{ calculateTotalAmount() }} EUR.<br>
            Un email vous sera envoyé prochainement à cette adresse {{ form.email }} pour la mise en paiement de votre inscription. <br>
            Merci de consulter votre messagerie et de procéder au règlement de votre inscription.<br>
            En vous remerciant de votre inscription, à très bientôt à la conférence.<br> 
          </p>
          <div>
            <button type="button">Confirmer</button>
            <button type="button">Modifier les données</button>
          </div>
        </section>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: {
        firstName: 'Mickeal',
        lastName: 'BARON',
        email: 'baron@ensma.fr',
        gender: 'M.', // Par défaut, on peut mettre 'male' ou 'female' ou laisser vide
        institution: 'ISAE-ENSMA',
        address: 'Téléport 2 -1 avenue Clément Ader, BP 40109',
        country: 'France', // On peut pré-remplir avec 'France' si c'est le pays par défaut
        city: 'Futuroscope Chasseneuil',
        postalCode: '86961',
        personalWebPage: 'https://mickeal-baron.fr',
        institutionWebPage: 'https://wwwlias-lab.fr.members/michealbaron',
        registrationType: 'Académique', // 'student', 'academic', ou 'enterprise'
        accommodation: 'Avec réservation' // 'withReservation' ou 'withoutReservation'
      },
      submitted: false
    };
  },
  methods: {
    submitForm() {
      this.submitted = true;
      // Ici, vous pourriez également ajouter la logique pour envoyer les données du formulaire à un serveur
    },
    calculateTotalAmount() {
      let registrationFee = 0;
      let accommodationFee = 0;

      // Calcul du montant d'inscription en fonction du type d'inscription sélectionné
      switch (this.form.registrationType) {
        case 'Etudiant':
          registrationFee = 150;
          break;
        case 'Académique':
          registrationFee = 200;
          break;
        case 'Enterprise':
          registrationFee = 300;
          break;
      }

      // Calcul du montant d'hébergement en fonction de l'option sélectionnée
      if (this.form.accommodation === 'Avec réservation') {
        accommodationFee = 150;
      }

      // Calcul du montant total
      return registrationFee + accommodationFee;
    }
  }
}
</script>



<style scoped>
.haut {
  display: flex;
  width: 95%;
  margin-left: 1%;
  justify-content: space-around;

}

.test {

  width: 100%;

}

.label {
  margin-left: 1%;
}

.mail {
  width: 100%;
  margin-left: 1%;
}

.sexe {
  display: flex;
  margin-left: 1%;
}

.registration-form {
  font-family: 'Arial', sans-serif;
  background-color: #fff;
  max-width: 60em;
  margin: 20px auto;
  padding: 20px;
  border: 1px solid #ddd;
  border-radius: 4px;


}

.registration-form h1,
.registration-form h2 {
  color: #333;
}

.registration-form h1 {
  font-size: 24px;
  text-align: center;
  margin-bottom: 80px;
}

.registration-form h2 {
  font-size: 20px;
  margin-top: 20px;
  margin-bottom: 10px;
  margin-left: 1%;
}

.registration-form label {
  display: block;
  margin-bottom: 5px;
  color: #666;
}

.section {
  border-top: 1px solid gray;
  width: 92.5%;
  margin-left: 1%;
}
.divbouton{
  border-top : 1px solid gray;
  width: 92.5%;
  margin-left: 1%;
}
.bouton{
  margin-top: 20px;
  width: 100px;
  height: 30px;
  border-radius: 10px;
  background-color: blue;
}

.registration-form input[type="text"],
.registration-form input[type="email"],
.registration-form input[type="url"],
.registration-form input[type="radio"],
.registration-form select {
  display: block;
  width: 90%;
  padding: 10px;
  margin-bottom: 15px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

.registration-form input[type="radio"] {
  display: inline-block;
  width: auto;
  margin-right: 10px;
  margin-top: 0;
  padding: 0;
  border: none;
}

.registration-form button {

  color: white;
  font-weight: bold;
  cursor: pointer;
  border: none;
  transition: background-color 0.3s ease;
}

.registration-form button:hover {
  background-color: #4cae4c;
}

/* Styling for radio buttons and their labels */
.registration-form input[type="radio"]+label {
  display: inline-block;
  margin-right: 20px;
  cursor: pointer;
  font-weight: normal;
  color: #333;
}

/* Adjust the alignment of radio buttons with their labels */
.registration-form input[type="radio"] {

  margin-top: -1px;
}

/* Style adjustments for small screens */
@media (max-width: 768px) {
  .registration-form {
    width: 90%;
    padding: 15px;
  }
}
 /* Griser les inputs quand le formulaire est soumis */
 input:disabled, 
 button:disabled,
 select:disabled,
 radio:disabled {
   background-color: #ececec;
   cursor: not-allowed;
 }

 /* Style pour la fenêtre récapitulative */
 .recap {
   margin-top: 20px;
   padding: 10px;
   border: 1px solid #ddd;
   border-radius: 4px;
   background-color: #f9f9f9;
 }
 .error-message {
  color: red;
  font-size: 14px;
}
</style>
