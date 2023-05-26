<template>
    <nav class="menu">
        <router-link to="/menu">Home</router-link> |
        <RouterLink to="/cronogram">cronograma</RouterLink> |
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
  data() {
    return{
      testandoEssaPoha: ''
    }
  },
    methods: {
    test() {
      axios.post('http://localhost:8000',{
        email: 'guilherm3vrp@gmail.com'
      })
      .then(response=> {
        if(response.data){
          console.log('conseguiu');
        }else{
          console.log('você é incompetente para um karalho')
        }
      })
    }
  }
}
</script>