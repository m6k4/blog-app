<template>
   <div class="CustomButton">
      <el-button class="CustomButton"
         :disabled="disabled || isLoading"
         @click.stop="handleClick"
      >
         <i v-if="isLoading" class="fa fa-spinner fa-spin CustomButton__icon" aria-hidden="true" />
         <slot v-else/>
      </el-button>
   </div>
</template>

<script src="./component.js"></script>
<style src="./style.sass" lang="sass" scoped></style>
