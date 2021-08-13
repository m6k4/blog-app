<template>
  <div class="about">
    <h1>This is an about page</h1>
    <button @click="login"> Zaloguj </button>
    <button @click="checkSession"> Sprawdz sesje </button>
    <button @click="logout"> Wyloguj </button>
  </div>
</template>

<script>
// @ is an alias to /src
export default {
  name: 'Home',

  methods: {
    async login() {
      const params = {
        phone_number: 555666777,
        password: 'Test123',
      };
      await this.$store.dispatch('authorization/loginToPlatform', params);
    },
    async checkSession() {
      this.$store.dispatch('authorization/checkIfUserSessionExists');
    },
    async logout() {
      this.$store.dispatch('authorization/logoutFromPlatform');
    },
  },
};
</script>
