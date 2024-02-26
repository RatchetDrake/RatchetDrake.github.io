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
            <input type="text" id="firstName" v-model="form.firstName" required>
          </div>
          <div class="test">
            <label for="lastName">Nom*</label>
            <input type="text" id="lastName" v-model="form.lastName" required>
          </div>
        </div>

        <div class="mail">
          <label for="email">Email address*</label>
          <input type="email" id="email" v-model="form.email" required>
        </div>

        <label class="label">Sexe</label>
        <div class="sexe">

          <div>
            <input type="radio" id="male" value="male" v-model="form.gender">
            <label for="male">Je suis un homme</label>
          </div>
          <div>
            <input type="radio" id="female" value="female" v-model="form.gender">
            <label for="female">Je suis une femme</label>
          </div>
        </div>
        <div class="mail">
          <label for="institution">Institution*</label>
          <input type="text" id="institution" v-model="form.institution" required>
        </div>
        <div class="haut">
          <div class="test">
            <label class="label" for="address">Adresse*</label>
            <input type="text" id="address" v-model="form.address" required>
          </div>
          <div class="test">
            <label class="label" for="country">Pays*</label>
            <input type="text" id="country" v-model="form.country" required>
          </div>
        </div>
        <div class="haut">
          <div class="test">
            <label class="label" for="postalCode">Code postal*</label>
            <input type="text" id="postalCode" v-model="form.postalCode" required>
          </div>
          <div class="test">
            <label class="label" for="city">Ville*</label>
            <input type="text" id="city" v-model="form.city" required>
          </div>
        </div>
        <div class="haut">
          <div class="test">
            <label class="label" for="personalWebPage">Page web personnelle</label>
            <input type="url" id="personalWebPage" v-model="form.personalWebPage">
          </div>
          <div class="test">
            <label class="label" for="institutionWebPage">Page web institution</label>
            <input type="url" id="institutionWebPage" v-model="form.institutionWebPage">
          </div>
        </div>
      </section>

      <!-- Registration Type -->
      <section class="section">
        <h2>Quelle inscription souhaitez-vous ?</h2>
        <div>
          <input type="radio" id="student" value="student" v-model="form.registrationType">
          <label for="student">Étudiant (150 EUR)</label>
        </div>
        <div>
          <input type="radio" id="academic" value="academic" v-model="form.registrationType">
          <label for="academic">Académique (200 EUR)</label>
        </div>
        <div>
          <input type="radio" id="enterprise" value="enterprise" v-model="form.registrationType">
          <label for="enterprise">Entreprise (300 EUR)</label>
        </div>
      </section>

      <!-- Accommodation -->
      <section class="section">
        <h2>Quel hébergement souhaitez-vous ?</h2>
        <div>
          <input type="radio" id="withReservation" value="withReservation" v-model="form.accommodation">
          <label for="withReservation">Avec réservation (150 EUR)</label>
        </div>
        <div>
          <input type="radio" id="withoutReservation" value="withoutReservation" v-model="form.accommodation">
          <label for="withoutReservation">Sans réservation (0 EUR)</label>
        </div>
      </section>
<div class="divbouton">
      <button class="bouton" type="submit">Pré-valider</button>
    </div>
    </form>
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
        gender: 'male', // Par défaut, on peut mettre 'male' ou 'female' ou laisser vide
        institution: 'ISAE-ENSMA',
        address: 'Téléport 2 -1 avenue Clément Ader, BP 40109',
        country: 'France', // On peut pré-remplir avec 'France' si c'est le pays par défaut
        city: 'Futuroscope Chasseneuil',
        postalCode: '86961',
        personalWebPage: 'https://mickeal-baron.fr',
        institutionWebPage: 'https://wwwlias-lab.fr.members/michealbaron',
        registrationType: '', // 'student', 'academic', ou 'enterprise'
        accommodation: '' // 'withReservation' ou 'withoutReservation'
      }
    }
  },
  methods: {
    submitForm() {
      // Traitement des données du formulaire
      // Vous pouvez ici valider les données ou les envoyer à un serveur
      console.log('Formulaire soumis:', this.form);

      // Exemple d'envoi des données avec axios (à installer séparément)
      // axios.post('URL_DU_SERVEUR', this.form)
      //   .then(response => {
      //     // Gérer la</div>
      //   .catch(error => {
      //     // Gérer les erreurs
      //   });
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
</style>
