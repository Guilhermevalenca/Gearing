<template>
  <section>
    <h2>Destaques:</h2>
    <div :class="congratulations">
      {{ this.$store.state.user }}
    </div>
  </section>
</template>

<script>

export default{
  data() {
    return{
      congratulations: 'congratulations',
    }
  },
  methods: {
      
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
