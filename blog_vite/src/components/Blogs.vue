<script>
import axios from 'axios'
export default {
  name: 'blogs',
  data() {
    return {
      blogs_name: [],
      blog_name:'',
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
    create_blog(){
      axios({
        method: 'post',
        url: 'http://localhost:8000/api/blogs/create/blog',
        headers: {
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
        },
        data:{
          blog_name: this.blog_name,
          text: this.text
        }
      })
        .then(res => {
          console.log(res.data)
          this.blogs_name = res.data
        })
    },
    show_articles(){
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
  <button @click="blogs">Обновить</button>
  <div class="div">
    <div v-for="blog in blogs_name" :key="blog.id">
      {{ blog.blog_name }}
  </div>
  <div v-for="article in articles" :key="article.id">
      {{ article.text }}
  </div>
  </div>
    <div class="popup_open">
        <input v-model="blog_name" type="text" placeholder="Title">
        <input v-model="text" type="text" placeholder="Text">
        <div class="buttons">
          <button  @click="create_blog">Добавить</button>
          <button>Отмена</button>
        </div>
      </div>
</template>

<style scoped>
.popup_open{
  position: absolute;
  width: 320px;
  padding: 20px;
  background-color: aquamarine;
}
</style>
