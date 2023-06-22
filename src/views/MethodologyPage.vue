<template>
    <div>
        <h1>Bem vindo(a) às Metodologias!</h1>
        <Methodology />
    </div>
</template>
  
  <script>
import Methodology from '@/components/MethodologyPage/Description.vue';

export default {
    components: {Methodology},
    data() {
      return {
        methods: {
            pomodoro: false
        }
      }
    },
    methods: {
  
    }
};
</script>
  