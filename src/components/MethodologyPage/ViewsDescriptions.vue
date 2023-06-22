<template>
  <section>
    <button @click="() => {methods.pomodoro = !methods.pomodoro}">Pomodoro</button>
    <div v-if="methods.pomodoro">
      O Método Pomodoro é um método de gerenciamento de tempo <br> baseado em períodos de 25 minutos (pomodoros) de estudo ou trabalho focado, interrompidos por intervalos de 5 minutos. <br> Após quatro intervalos de estudo consecutivos, são geralmente feitos intervalos mais longos, que podem variar de 15 a 30 minutos.
    </div>
    <button @click="() => {methods.mapamental = !methods.mapamental}">Mapa Mental</button>
    <div v-if="methods.mapamental">
      Consiste em criar resumos cheios de símbolos, cores, setas e frases de efeito com o objetivo de organizar o conteúdo e facilitar associações entre as informações destacadas. Esse material é muito indicado para pessoas que têm facilidade de aprender de forma visual.

    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      methods: {
          pomodoro: false,
      }
    }
  }
}
</script>
