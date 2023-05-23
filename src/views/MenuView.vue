<template>
  <div>
    <PresentationGearingUp />
  </div>
</template>

<script>
import PresentationGearingUp from '@/components/MenuView/PresentationGearingUp.vue'

export default {
  components: {
    PresentationGearingUp
  },
  data() {
    return{
      showPresentation: true
    }
  }
}
</script>
