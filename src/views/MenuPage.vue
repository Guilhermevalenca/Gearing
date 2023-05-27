<template>
  <div>
    <button @click="test()">testar</button>
    {{ testandoEssaPoha }}
  </div>
  <div>
    {{ this.$store.state.user }}
  </div>
</template>

<script>
import axios from 'axios'

export default{
  inject: ['goBack'],
  data() {
    return{
      testandoEssaPoha: ''
    }
  },
    methods: {
    test() {
      axios.post('http://localhost:8000',{
        email: this.$store.state.user.email
      })
      .then(response=> {
        if(response.data){
          console.log('conseguiu');
        }else{
          console.log('você é incompetente para um karalho')
        }
        console.log(this.$store.state.user)
      })
    }
  }
}
</script>