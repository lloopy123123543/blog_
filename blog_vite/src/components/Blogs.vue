<script>
import axios from 'axios'
export default {
  name: 'blogs',
  data() {
    return {
      blogs_name: [],
      blog_name: '',
      text: '',
      articles: []

    }
  },
  methods: {
    blogs() {
      axios({
        method: 'get',
        url: 'http://localhost:8000/api/blogs/show/blogs',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        },

      })
        .then(res => {

          this.blogs_name = res.data
        })

      axios({
        method: 'get',
        url: 'http://localhost:8000/api/articles/show/article',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        },

      })
        .then(res => {
          console.log(res.data)
          this.articles = res.data
        })


    },
    create_blog() {
      axios({
        method: 'post',
        url: 'http://localhost:8000/api/blogs/create/blog',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        data: {
          blog_name: this.blog_name,
          text: this.text
        }
      })
        .then(res => {
          console.log(res.data)
          this.blogs_name = res.data
        })

        axios({
        method: 'get',
        url: 'http://localhost:8000/api/blogs/show/blogs',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        },

      })
        .then(res => {

          this.blogs_name = res.data
        })




    },

    show_articles() {
      axios({
        method: 'get',
        url: 'http://localhost:8000/api/articles/show/articles',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        },

      })
        .then(res => {
          console.log(res.data)
          this.articles = res.data
        })
    }

  }

}

</script>

<template>
  <button class="big" @click="blogs">Обновить</button>
  <div class="popup_open">
    <input v-model="blog_name" type="text" placeholder="Title">
    <input v-model="text" type="text" placeholder="Text">
    <div class="buttons">
      <button @click="create_blog">Добавить</button>
      <button>Отмена</button>
    </div>
  </div>
  <div class="div">
    <div v-for="blog in blogs_name" :key="blog.id">
      {{ blog.blog_name }}
    </div>
    <div v-for="article in articles" :key="article.id">
      {{ article.text }}
    </div>
  </div>
</template>

<style scoped>
.div {
  width: 100%;
  height: 50px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #45B985;
  border-top: 5px solid white;
}

.popup_open {

  width: 100%;
  padding: 20px 0px 20px 0px;
  background-color: #45B985;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.buttons {
  width: 100%;
  display: flex;
  gap: 10px;
  justify-content: center;
  align-items: center;
}

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

.big {
  width: 100%;
  border: none;
  border-radius: 0px;
  background: #687FF9;
  font-size: 40px;
  color: white;
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

.nav {
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

input {
  width: 70%;
  border-radius: 10px;
  border: none;
  padding: 10px
}

textarea:focus,
input:focus {
  outline: none;
}

.col:hover {
  color: #45B985;
  cursor: pointer;
}

button {
  border: none;
  border-radius: 20px;
  padding: 10px 20px 10px 20px;
  cursor: pointer;
}

button:hover {}</style>
