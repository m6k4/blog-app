<template>
  <header class="
    h-25
    p-25
    flex
    justify-between
    items-center
  bg-white
    shadow-md"
  >
    <img class="object-contain h-20"
      src="../../assets/images/graphql-logo.png" />
  </header>
</template>

<script>
export default {
  name: 'TheHeader',

  data() {
    return {};
  },

  methods: {
    async logout() {
      await this.$store.dispatch('authorization/logoutFromPlatform');
      this.$router.push({ name: 'Login' });
    },
  },
};
</script>
