<template>
  <div>
    <Presentation />
  </div>
  <div :class="congratulations">
    <h2>Destaque:</h2>
    <p>Planejando destaque</p>
  </div>
</template>

<script>
import Presentation from '@/components/HomePage/PresentationGearingUp.vue'

export default {
  components: {
    Presentation,
  },
  data() {
    return{
      showForm: true,
      testandoEssaPoha: '',
      congratulations: 'congratulations'
    }
  }
}
</script>

<style scoped>
.congratulations{
  font-family: "Share Tech Mono", sans-serif;
  color: aqua;
  background: -webkit-linear-gradient(
    90deg,
    rgba(188, 251, 255, 1) 47%,
    rgba(24, 237, 242, 1) 100%
  );
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  font-size: 24px;
}
</style>