<script setup>
import HelloWorld from './components/HelloWorld.vue'
import Login from './components/Login.vue'


</script>

<template>
  <div>
    <div class="container">
    <div class="header">
      <div class="logo">Logo</div>
      <div class="cols">
        <div class="col">   <router-link to="/">Главная</router-link> </div>
        
        <div class="col">   <router-link to="/blogs">Блоги</router-link> </div>
        <div class="col">sjsjs</div>
        <div class="col">   <router-link to="/login">Login</router-link> </div>
      </div>
    </div>
    <router-view></router-view>
  </div>

  </div>
  
</template>

<style scoped>
.container{
  min-width: 320px;
  max-width: 1920px;
  width: 100%;
  background-color: blanchedalmond;
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
