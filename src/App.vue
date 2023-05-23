<template>
  <nav class="menu">
    <router-link to="/">Home</router-link> |
    <router-link to="/usuarios/10">usuarios</router-link> |
    <router-link to="/servicos">serviços</router-link> |
    <router-link to="/about">About</router-link>
  </nav>
  <router-view/>
</template>

<script>
export default{
  name: 'App',
  data() {
    return {
      
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
