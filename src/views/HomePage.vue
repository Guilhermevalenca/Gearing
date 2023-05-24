<template>
  <div>
    <Presentation />
  </div>
  <div>
    <AccessForm />
  </div>
</template>

<script>
import Presentation from '@/components/homePage/PresentationGearingUp.vue'
import AccessForm from '@/components/homePage/AccessForm.vue'
import axios from 'axios'

export default {
  components: {
    Presentation,
    AccessForm,
  },
  data() {
    return{
      showForm: true,
      testandoEssaPoha: ''
    }
  },
  beforeCreate() {
    axios.post('http://localhost:8000',{
      
    })
    .then(response => {
      if(response.data){
        this.$router.push('/menu')
      }
    })
  }
}
</script>
