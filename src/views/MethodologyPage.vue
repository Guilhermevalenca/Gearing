<template>
    <section>
      <h1>{{ metodologia }}</h1>
      <button @click="() => {methods.pomodoro = !methods.pomodoro}">Pomodoro</button>
      <div v-if="methods.pomodoro">
        faz tal coisa
      </div>
    </section>
  </template>
  
  <script>
  export default {
    data() {
      return {
        metodologia: 'Bem vindo(a) às Metodologias!',
        methods: {
            pomodoro: false
        }
      };
    },
    methods: {
      changeMessage() {
        this.message = 'Nova mensagem!';
      }
    }
  };
  </script>
  