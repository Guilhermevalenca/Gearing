<template>

<header>
  <nav class="navigation-option" v-if="this.$route.path != '/'">
    <router-link to="/menu">Pagina Inicial</router-link> |
    <RouterLink to="/learningStyles">Quiz Estilos de Aprendizagem</RouterLink> |
    <RouterLink to="/schedule">Cronograma</RouterLink> |
    <RouterLink to="/forum">Forum</RouterLink> |
    <RouterLink to="/userData">Seus Dados</RouterLink> | 
    <RouterLink @click="this.$logoutUser()" to="/">Sair da Conta</RouterLink>
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
body {
    background-image: url("/public/backgrounds/gearingBackground.jpeg");
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100vh;
    margin: 0;
  }
</style>
