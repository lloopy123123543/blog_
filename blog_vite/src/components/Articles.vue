<script>
import axios from 'axios';

export default{
  name: 'articles',
  data() {
    return {
      articles: []
    }
  },
  methods: {
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
          this.blogs_name = res.data
        })
    }
  }
}

</script>

<template>




  <p>
    Check out

  </p>

</template>

<style scoped>

</style>
