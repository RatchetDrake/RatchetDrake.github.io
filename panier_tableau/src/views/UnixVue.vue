<template>
    <div> <router-link to="/"><br>Retourner à l'accueil<br></router-link>

      <label>Code: <input type="number" v-model="code" min="0" max="7"></label><br>
  
      <label>Read <input type="checkbox" v-model="permissions.read"></label>
      <label>Write <input type="checkbox" v-model="permissions.write"></label>
      <label>Execute <input type="checkbox" v-model="permissions.execute"></label>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        code: 0,
        permissions: {
          read: false,
          write: false,
          execute: false
        }
      };
    },
    watch: {
      code(newVal) {
        // Update the checkboxes based on the code value
        this.permissions.read = (newVal & 4) !== 0;
        this.permissions.write = (newVal & 2) !== 0;
        this.permissions.execute = (newVal & 1) !== 0;
      },
      permissions: {
        deep: true,
        handler() {
          // Update the code based on checkboxes
          this.code = 0;
          if (this.permissions.read) this.code += 4;
          if (this.permissions.write) this.code += 2;
          if (this.permissions.execute) this.code += 1;
        }
      }
    }
  }
  </script>
  