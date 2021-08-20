<template>
  <div id="platform"
       class="PlatformView view"
  >
    <TheHeader />
    <div class="PlatformView__pages">
      <div class="PlatformView__content">
        <router-view />
      </div>
      <CopyrightSection />
    </div>
  </div>
</template>

<script>
import TheHeader from '../components/Platform/TheHeader.vue';
import CopyrightSection from '../components/Platform/CopyrightSection.vue';

export default {
  name: 'Platform',
  components: {
    TheHeader,
    CopyrightSection,
  },
};
</script>

<style lang="sass" scoped>
.PlatformView
  width: 100%
  height: 100vh
  background: #F6F6F6

  &__pages
    width: 100%
    height: 100%

  &__content
    height: 80%
    display: flex
    justify-content: center
    align-items: center

</style>
