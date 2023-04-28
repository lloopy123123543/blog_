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
        <div class="sus">
          <div class="col">Login</div>
        <div class="col">Register</div>
        </div>
      </div>
      <div class="main_block">
        <div class="title">Login</div>
        <input v-model="email" type="text" placeholder="email">
      <input v-model="password" type="text" placeholder="Password">
      <button @click=log_in()>Войти</button>
      </div>

    </div>
  </div>
</template>

<style scoped>
.container {
  min-width: 320px;
  max-width: 1920px;
  width: 100%;
  background: linear-gradient(45deg, #45B985, #687FF9);
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
  display: flex;
  height: 100vh;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}
.main_block {
  background-color: #45B985;
  display: flex;
  flex-direction: column;
  height: 30%;
  width: 100%;
  justify-content: center;
  align-items: center;
  gap: 10px;
  border-radius: 10px 0px 10px 10px
}

.nav{
  width: 100%;
  display: flex;
  justify-content: end;
}
.sus {
  display: flex;
  width: 28%;
  height: auto;
  justify-content: end;
  gap: 10px;
  background-color: white;
  padding: 5px;
  border-radius: 10px 10px 0px 0px;
  border: 4px solid #45B985;
  
}
input{
  width: 70%;
  border-radius: 10px;
  border: none;
  padding:10px
}
textarea:focus, input:focus{
    outline: none;
}
.col:hover{
  color: #45B985;
  cursor: pointer;
}
button{
  border: none;
  border-radius: 20px;
  padding: 10px 20px 10px 20px;
  cursor: pointer;
}
button:hover{
  border: 3px solid rgb(10, 10, 10);
  padding: 7px 17px 7px 17px;
}
</style>
