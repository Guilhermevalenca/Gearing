<template>
    <nav class="menu">
        <router-link to="/menu">Home</router-link> |
        <RouterLink to="/">Sair da conta</RouterLink>
    </nav>

  <div>
    <button @click="test()">testar</button>
    {{ testandoEssaPoha }}
  </div>
</template>

<script>
import axios from 'axios'

export default{
    methods: {
    test() {
      axios.get('http://localhost:8000')
      .then(response=> {
        console.log(response.data);
      })
    }
  },
  beforeCreate() {
    axios.get('http://localhost:8000')
    .then(response => {
      if(!response.data){
        this.$router.push('/')
      }
    })
  }
}
</script>