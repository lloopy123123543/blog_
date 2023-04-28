<script>
import axios from 'axios';
export default {
  name: 'login',
  data() {
    return {
      email: '',
      password: ''
    }
  },
  methods: {
    log_in() {




      axios({
        method: 'post',
        url: 'http://localhost:8000/api/users/login',
        data: {
          email: this.email,
          password: this.password
        }
      })
      .then(res => {
        const token = res.data.data.token;
        localStorage.setItem('token', token);

      })

    }
  }
}


</script>

<template>
  <div class="container">
    <div class="block">
      <div class="nav">
        <div class="col">Login</div>
        <div class="col">Register</div>
        <div class="col"></div>
      </div>
      <div class="main_block">
        <div class="title">Login</div>
      </div>
      <input v-model="email" type="text" placeholder="email">
      <input v-model="password" type="text" placeholder="Password">
      <button @click=log_in()>Войти</button>

    </div>
  </div>
</template>

<style scoped>
.container {
  min-width: 320px;
  max-width: 1920px;
  width: 100%;
  background-color: royalblue;
  height: auto;
  display: flex;
  justify-content: center;
  align-items: center;
}

.block {
  width: 100%;
  max-width: 400px;
  min-width: 320px;
  min-height: 50vh;
  background-color: rgb(0, 139, 30);
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.nav {
  display: flex;
  width: 100%;
  height: auto;
  justify-content: end;
  gap: 10px;
}
</style>
