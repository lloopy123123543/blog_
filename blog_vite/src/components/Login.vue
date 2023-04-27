<script setup>

import { ref } from 'vue'

defineProps({
  msg: String,
})

const count = ref(0)
</script>

<template>
  <div class="container">

  </div>

</template>

<style scoped>
.container{
  min-width: 320px;
  max-width: 1920px;
  width: 100%;
  background-color: royalblue;
  height: auto;
}
.header{
  width: 100%;
  height: 40px;
  background-color: green;
  height: auto;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.logo{
  font-size: 30px;
  width: 30%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.cols{
  width: 70%;
  height: auto;
  display: flex;
  justify-content: space-evenly;
}
</style>
