<template>
    <section>    
      <button @click="() => {methods.pomodoro = !methods.pomodoro}">Pomodoro</button>
      <div v-if="methods.pomodoro">
        faz tal coisa
      </div>
    {{ methods }}
    </section>
</template>
  
<script>
export default {
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
  