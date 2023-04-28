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
           <router-link to="/"><div class="col">Главная</div></router-link>
            <router-link to="/blogs"><div class="col">Блоги</div></router-link> 
            <router-link to="/login"><div class="col">Login</div></router-link> 
            
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
  height: auto;
}
.header{
  width: 100%;
  height: 40px;
  background-color: white;
  height: auto;
  display: flex;
  justify-content: space-between;
  border-bottom: 1px solid darkgray;
  align-items: center;
}
a{
  text-decoration: none;
}
a:hover{
  color: #45B985;
}
.col:hover{
  color:#45B985;
}
router-link:hover{
  color: #45B985;
}
.logo{
  font-size: 30px;
  width: 30%;
  display: flex;
  justify-content: center;
  align-items: center;
}
.col{
  text-decoration: none;
  color: black;
}
router-link{
  text-decoration: none;
  color: black;
}
router-view{
  text-decoration: none;
}
link{
  text-decoration: none;
}
.cols{
  width: 70%;
  height: auto;
  display: flex;
  justify-content: space-evenly;
}

</style>
