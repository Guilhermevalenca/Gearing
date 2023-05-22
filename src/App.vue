<template>
  <div>
    <BaseAlert v-if="showAlert" variant="success" @close="onClose()">
      Seu formulario foi enviado com sucesso
    </BaseAlert>
  </div>
</template>
<script>
import BaseAlert from './components/testArea/BaseAlert.vue';


export default {
  name: 'App',
  components: { BaseAlert },
  data() {
    return{
      showAlert: true
    }
  },
  beforeCreate() {},
  created() {},
  beforeMount() {},
  mounted() {},
  watch: {},
  computed: {},
  methods: {
    onClose() {
      this.showAlert = false
      console.log('on close')
    }
  }
}
</script>

