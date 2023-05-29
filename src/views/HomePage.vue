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
    this.$checkAuthentication();
  }
}
</script>
