<template>
  <div>
    <Presentation />
  </div>
  
  <div v-show="showForm">
    <FormLogin />
  </div>

  <div v-show="!showForm">
    <FormCreate />
  </div>
  <div>
    <button @click="() => showForm = !showForm" v-show="showForm">Criar conta</button>
    <button @click="() => showForm = !showForm" v-show="!showForm">Login</button>
  </div>
</template>

<script>
import Presentation from '@/components/MenuView/PresentationGearingUp.vue'
import  FormLogin from '@/components/MenuView/FormLogin.vue'
import FormCreate from '@/components/MenuView/FormCreate.vue'

export default {
  components: {
    Presentation,
    FormLogin,
    FormCreate
  },
  data() {
    return{
      showForm: true,
    }
  }
}
</script>
