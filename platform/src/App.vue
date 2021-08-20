<template>
  <div id="nav">
    <router-view />
  </div>
</template>

<style lang="sass">
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&family=Roboto:wght@100;300;400;700;900&display=swap')

@import url('https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900')
.app
  height: 100%
  overflow-y: hidden
  width: 100%

*,body,html
  -moz-osx-font-smoothing: grayscale
  -webkit-font-smoothing: antialiased

*
  font-family: 'Roboto', sans-serif

html, body
  margin: 0
  padding: 0

html
  height: 100%
  width: 100%

body
  animation-delay: 0.1s
  animation-duration: 0.1s
  animation-iteration-count: 1
  animation-name: fontfix
  color: #0F3849
  font-size: 14px
  height: 100%
  -animation-timing-function: linear
  width: 100%
  overflow: hidden
</style>
