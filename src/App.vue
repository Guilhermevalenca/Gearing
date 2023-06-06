<template>

<header>
  <nav class="navigation-option" v-if="this.$route.path != '/'">
    <router-link to="/menu">Pagina inicial</router-link> | 
    <RouterLink to="/schedule">cronograma</RouterLink> |
    <RouterLink to="/userData">Seus dados</RouterLink> | 
    <RouterLink to="/learningStyles">Quiz Estilos de Aprendizagem</RouterLink>|
    <RouterLink @click="this.$logoutUser()" to="/">Sair da conta</RouterLink>
  </nav>
</header>

<section>
  <router-view/>
</section>

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
