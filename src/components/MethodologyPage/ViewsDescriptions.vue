<template>
    <section>
      <button @click="() => {methodology.pomodoro = !methodology.pomodoro}">Pomodoro</button>
      <div v-if="methodology.pomodoro">
        faz tal coisa
      </div>
    </section>
</template>
  
<script>
export default {
  data() {
    return {
      methodology: {
          pomodoro: false
      }
    }
  }
}
</script>
  