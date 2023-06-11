<template>
<h1>GEARING</h1>
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

<section v-if="mountPage">
  <router-view/>
</section>

</template>

<script>
import axios from 'axios';
import Swal from 'sweetalert2';

export default{
  name: 'App',
  data() {
    return {
      mountPage: false,
      tryingConnection: () => {
        Swal.fire({
          title: 'conectando-se ao servidor',
          showConfirmButton: false,
          allowOutsideClick: false,
          willOpen: () => {
            Swal.showLoading();
          },
          willClose: () => {
            Swal.hideLoading();
          }
        })
      }
    }
  },
  methods: {
    establishingConnection() {
      axios.get('http://localhost:8000')
      .then(response => {
        if(response.data === "OK"){
          this.mountPage = true
          Swal.close();
        }
      })
      .catch( () => {
        Swal.fire({
          title: 'erro',
          text: 'Não foi possivel conectar-se ao servidor',
          confirmButtonText: 'tenta novamente',
          allowOutsideClick: false,
          showConfirmButton: true
        })
        .then(result => {
          if(result.isConfirmed){
            this.tryingConnection()
            this.establishingConnection();
          }
        })
      })
    }
  },
  beforeMount() {
    this.tryingConnection()
    this.establishingConnection()
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
