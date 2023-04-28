<script>
import axios from 'axios'
export default {
  name: 'blogs',
  data() {
    return {
      blogs_name: []

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
          console.log(res.data)
          this.blogs_name = res.data
        })


    }
  }

}

</script>

<template>
  <button @click="blogs">Обновить</button>
  <div v-for="blog in blogs_name" :key="blog.blog_name">

      {{ blog.blog_name }}
  </div>
</template>

<style scoped></style>
