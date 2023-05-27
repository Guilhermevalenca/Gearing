<template>
  <nav class="menu" v-if="this.$store.state.user.email">
        <router-link to="/menu">Home</router-link> |
        <RouterLink to="/cronogram">cronograma</RouterLink> |
        <RouterLink to="/">Sair da conta</RouterLink>
    </nav>
  <router-view/>
</template>

<script>
export default{
  name: 'App',
  data() {
    return {
      checking: this.$store.state.user.email
    }
  },
  watch: {
    checking() {
      if(!this.checking){
        this.$router.push('/')
      }
    }
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
