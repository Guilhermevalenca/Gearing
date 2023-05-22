<template>
  <nav class="menu">
    <router-link to="/">Home</router-link>
    <div v-for="rota in rotas" :key="rota">
      <router-link :to="rota">{{ rota }}</router-link>
    </div>
    <router-link to="/about">About</router-link>
  </nav>
  <router-view/>
</template>

<script>
export default{
  name: 'App',
  data() {
    return {
      rotas: ['servicos','menu','helloWord','rapariga','essasCoisas']
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
