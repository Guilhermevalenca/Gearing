<template>
   <img src="./assets/css/backgrounds/gearingLogo.gif" class="logo">
      <h1 class="gearing">Gearing</h1>
<header>
  <nav class="navigation-option" v-if="this.$route.path != '/'">
    <router-link to="/menu">Página Inicial</router-link> |
    <RouterLink to="/learningStyles">Estilos de Aprendizagem</RouterLink> |
    <RouterLink to="/schedule">Cronograma</RouterLink> |
    <RouterLink to="/forum">Fórum</RouterLink> |
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
          title: 'Conectando-se ao servidor',
          showConfirmButton: false,
          allowOutsideClick: false,
          customClass: {
                                popup: 'swal-popup-custom',
                                title: 'swal-title-custom',
                                htmlContainer: 'swal-html-container-custom',
                            },
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
          title: 'Erro',
          text: 'Não foi possível conectar-se ao servidor',
          confirmButtonText: 'Tente novamente',
          allowOutsideClick: false,
          showConfirmButton: true,
          customClass: {
                    popup: 'swal-popup-custom',
                    title: 'swal-title-custom',
                    htmlContainer: 'swal-html-container-custom',
                            }
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

<style scoped>
@import url('https://fonts.cdnfonts.com/css/yielding-timber');
.gearing{
  font-family: 'Yielding Timber',sans-serif; 
  font-style: italic;
  width: 22%;
  text-align: center;
  position: relative;
  margin-inline: auto;
  margin-top: 1vw;
  font-size: 2em;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.logo {
  position: absolute;
  width: 4em;
  margin-left: -8em;
  margin-top: -1.3em;
  margin-bottom: 20px;
}
nav{
  margin-bottom:6em;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
  background-clip: text;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}

</style>
