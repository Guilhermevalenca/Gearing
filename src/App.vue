<template>
   <img src="./assets/css/backgrounds/gearingLogo.gif" class="logo">
      <h1 class="gearing">Gearing</h1>
<header>
  <nav class="navigation-option" v-if="this.$route.path != '/'">
    <router-link to="/menu">Página Inicial</router-link>
    <RouterLink to="/learningStyles">Estilos de Aprendizagem</RouterLink>
    <RouterLink to="/schedule">Cronograma</RouterLink>
    <RouterLink to="/forum">Fórum</RouterLink>
    <RouterLink to="/userData">Seus Dados</RouterLink> 
    <RouterLink @click="this.$logoutUser()" to="/exit">Sair da Conta</RouterLink>
    <div class="animation start-home"></div>
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
  width: 30%;
  text-align: center;
  position: relative;
  margin-inline: auto;
  margin-top: 1vw;
  font-size: 3em;
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
  width: 5em;
  margin-left: -10.5em;
  margin-top: -1.3em;
  margin-bottom: 20px;
}
nav{
  border-style: solid;
  border-color: rgba(100, 2, 223, 1);
  border-width: 1px;
  margin: 0px auto 0;
  position: relative;
  width: 800px;
  height: 30px;
  background-color: black;
  border-radius: 8px;
  font-size: 0;
}
nav a {
  line-height: 30px;
  height: 100%;
  font-size: 12px;
  display: inline-block;
  position:relative;
  z-index: 1;
  text-decoration: none;
  text-transform: uppercase;
  text-align: center;
  color: aliceblue;
  font-weight: bold;
  cursor: pointer;
}
nav .animation {
	position: absolute;
	height: 100%;
	top: 0;
	z-index: 0;
	transition: all .5s ease 0s;
	border-radius: 8px;
}
a:nth-child(1) {
	width: 140px;
}
a:nth-child(2) {
	width: 190px;
}
a:nth-child(3) {
	width: 100px;
}
a:nth-child(4) {
	width: 100px;
}
a:nth-child(5) {
	width: 113.3px;
}
a:nth-child(6){
  width: 140px;
}
nav .start-menu, a:nth-child(1):hover~.animation {
	width: 140px;
	left: 0;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-learningStyles, a:nth-child(2):hover~.animation {
	width: 190px;
	left: 150px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-schedule, a:nth-child(4):hover~.animation {
	width: 113.3px;
	left: 423.3px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-forum, a:nth-child(3):hover~.animation {
	width: 100px;
	left:  338px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-schedule, a:nth-child(4):hover~.animation {
	width: 113.3px;
	left: 433.4px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-userData, a:nth-child(5):hover~.animation {
	width: 123.3px;
	left: 536.7px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}
nav .start-exit, a:nth-child(6):hover~.animation {
	width: 140px;
	left: 660px;
  background: -webkit-linear-gradient(
    318deg,
    rgba(133, 26, 186, 1) 18%,
    rgb(133, 26, 186, 1) 46%,
    rgba(100, 2, 223, 1) 81%
  );
}

</style>
